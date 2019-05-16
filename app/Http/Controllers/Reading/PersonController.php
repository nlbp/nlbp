<?php

namespace App\Http\Controllers\Reading;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Reading\ReadingPerson;
use App\Reading\ReadingStatus;
use App\Mail\reading\support;
use App\Mail\reading\detail;
use App\Mail\reading\TeamStatus;
use App\Mail\reading\PersonStatus;
use App\Books\BookDetails;
use App\Books\Book;

class PersonController extends Controller
{
    
    public function __construct()
    {
//        $this->middleware('auth');
    }
    
    /**
     * 
     * @param Carbon $date
     * @return Ambigous <\Illuminate\View\View, \Illuminate\Contracts\View\Factory>
     */
    public function index(Carbon $date)
    {
        $person = ReadingPerson::with('status')
        ->orderBy('created_at', 'desc')
        ->get();
        
        return view('reading.person.index', [
            'person' => $person,
            'date' => $date,
        ]);
    }
    
    /**
     * 
     * @return Ambigous <\Illuminate\View\View, \Illuminate\Contracts\View\Factory>
     */
    public function create()
    {
        return view('reading.person.checkbook');
    }
    
    public function checkBook(Request $request)
    {
        $request->flash();
        $this->validate($request, [
            'booktitle' => 'required',
        ]);
        
        $booktitle = $request->input('booktitle');
                
                                $book = Book::with('detail')
                                ->join('book_details', 'abook', '=', 'book_details.bid')
                                ->where([
                                    ['btitle', 'LIKE', $booktitle],
                                    ['btype', '<>', 0],
                                    ['btype', '<>', 1],
                                    ['btype', '<>', 4],
                                    ['btype', '<>', 5],
                                    ['btype', '<>', 6],
                                    ['btype', '<>', 7],
                                    ['btype', '<>', 8],
                                    ['btype', '<>', 9],
                                    ['btype', '<>', 10],
                                    ])
                                    ->orderBy('btitle', 'asc')
                                    ->paginate(25);
                                
        $person = ReadingPerson::where('book_title', 'LIKE', $booktitle)
        ->get();
        
        $samebook = Book::with('detail')
                                ->join('book_details', 'abook', '=', 'book_details.bid')
                                ->where([
                                    ['btitle', 'LIKE', '%'.$booktitle.'%'],
                                    ['btype', '<>', 0],
                                    ['btype', '<>', 1],
                                    ['btype', '<>', 4],
                                    ['btype', '<>', 5],
                                    ['btype', '<>', 6],
                                    ['btype', '<>', 7],
                                    ['btype', '<>', 8],
                                    ['btype', '<>', 9],
                                    ['btype', '<>', 10],
                                    ])
                                    ->orderBy('btitle', 'asc')
                                    ->paginate(25);
        
        $sameperson = ReadingPerson::where('book_title', 'LIKE', '%'.$booktitle.'%')
        ->get();
                
        if($book->count() == 0) {
            $book = null;
                        if($samebook->count() == 0) {
                $samebook = null;
            } 
        } else {
                $samebook = null;
        }
        
        if($person->count() == 0) {
            $person = null;
            if($sameperson->count() == 0) {
                $sameperson = null;
            }
        } else {
            $sameperson = null;
        }
                        
        return view('reading.person.results', [
            'book' => $book,
            'person' => $person,
            'booktitle' => $booktitle,
            'samebook' => $samebook,
            'sameperson' => $sameperson,
        ]);
    }
    
    /**
     * 
     * @param Request $request
     * @param Carbon $carbon
     * @return Ambigous <\Illuminate\View\View, \Illuminate\Contracts\View\Factory>
     */
    public function confirm(Request $request, Carbon $carbon)
    {
        $request->flash();
        $now = $carbon->now();
        $connect = url('http://www.tab2read.com/Page_Mobile/Login.ashx?username=0837721691&password=1414&appname=tabapp');
        $getToken = json_decode(file_get_contents($connect), true);
        $token = urlencode($getToken['token']);
        $getData = url('http://www.tab2read.com/Page_Mobile/Browse.ashx?type=publisher&token='.$token);
        $data = json_decode(file_get_contents($getData), true);
        $publisher = $data['catalog'];
        
        return view('reading.person.confirm', [
            'publisher' => $publisher,
        ]);
    }
    
    /**
     * 
     * @param Request $request
     */
    public function store(Request $request)
    {
        $request->flash();
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|regex:/[0-9]{9}/',
            'bookimage' => 'nullable|image',
            'bookauthor' => 'required',
            'bookpublish' => 'required',
                    ]);
        
        $email = [
            'admin' => 'parmote_tab@hotmail.com',
//            'staff1' => 'p-t07@hotmail.com',
//            'staff2' => 'subolwat@hotmail.com',
//            'staff3' => 'jp_ntt@hotmail.com',
        ];
        
        $book = ReadingPerson::where('book_title', 'LIKE', $request->booktitle)->get();
        if($book->count() == 1) {
            return view('reading.person.finalcheck', [
                'book' => $book,
            ]);
        }
        
        $reading = new ReadingPerson();
        $reading->firstname = $request->firstname;
        $reading->lastname = $request->lastname;
        $reading->email = $request->email;
        $reading->phone = $request->phone;
        if($request->bookimage) {
            $bookimage = $request->file('bookimage')->store('reading/bookimage', 'public');
        $reading->book_image = $bookimage;
        }
        $reading->book_title = $request->booktitle;
        $reading->book_author = $request->bookauthor;
        $reading->book_trans = $request->booktrans;
        if($request->bookpublish == 'addPublisher') {
            $reading->book_publish = $request->addPublisher;
        } else {
            $reading->book_publish = $request->bookpublish;
        }
        $reading->status_id = 1;
        if($request->checkedit == 0) {
        $reading->save();
        Mail::to($reading->email)
        ->send(new support($reading));
        Mail::to($email)
        ->send(new detail($reading));
        return view('reading.person.finish');
        } else {
            return $this->checkBook($request);
        }
    }
    
    /**
     * 
     * @param Request $request
     * @param ReadingPerson $person
     * @param unknown $id
     */
    public function updateStatus(Request $request, ReadingPerson $person, $id)
    {
        $email = [
            'admin' => 'parmote_tab@hotmail.com',
                        'staff1' => 'p-t07@hotmail.com',
//                    'staff2' => 'subolwat@hotmail.com',
//                    'staff3' => 'jp_ntt@hotmail.com',
        ];
        
        $data = $person->findOrFail($id);
        $data->status_id = $request->reading_status;
        $data->save();
        Mail::to($data->email)
        ->send(new PersonStatus($data));
        Mail::to($email)
        ->send(new TeamStatus($data));
        
        return redirect()->action('Reading\PersonController@show', ['id' => $id])->with('status', __('Reading.updatestatus'));
    }
    
    /**
     * 
     * @param Request $request
     * @param ReadingPerson $person
     * @param ReadingStatus $status
     * @param unknown $id
     */
    public function show(Request $request, ReadingPerson $person, ReadingStatus $status, $id)
    {
        $data = $person->findOrFail($id);
        $dataStatus = $status->all();
        return view('reading.person.show', [
            'data' => $data,
            'dataStatus' => $dataStatus,
        ]);
    }
}
