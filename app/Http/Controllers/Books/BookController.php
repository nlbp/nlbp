<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Yajra\Acl\Models\Permission;
use Yajra\Acl\Models\Role;

use App\Books\Book;
use App\Books\BookDetails;
use App\Books\BookMain;
use App\Books\BookType;
use App\Books\BookStatus;
use App\Books\Province;
use App\Http\Controllers\Controller;
use App\User;

class BookController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->can('view.book')) {
        $book = Book::with(['detail', 'detail.main', 'detail.province', 'type', 'status'])
		->join('book_details', 'abook', '=', 'book_details.bid')
		->where([
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
        return view('books.index', [
            'book' => $book,
            'option' => 'booktitle',
        ]);
        } else {
            abort(401, trans('errors.page401'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create.book')) {
        $category = BookMain::all()->where('bmid', '>', 0);
        $type = BookType::all()->where('btid', '>', 0);
        $status = BookStatus::all();
        $province = Province::all();
        $now = Carbon::now()->toDateString();
        $connect = url('http://www.tab2read.com/Page_Mobile/Login.ashx?username=0837721691&password=1414&appname=tabapp');
        $getToken = json_decode(file_get_contents($connect), true);
        $token = urlencode($getToken['token']);
        $getData = url('http://www.tab2read.com/Page_Mobile/Browse.ashx?type=publisher&token='.$token);
        $data = json_decode(file_get_contents($getData), true);
        $publisher = $data['catalog'];
        
         return view('books.create', [
            'category' => $category,
            'type' => $type,
            'status' => $status,
             'province' => $province,
             'now' => $now,
             'publisher' => $publisher,
        ]);
        } else {
            abort(401, trans('errors.page401'));
        }
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now()->toDateTimeString();
        $data = $request->all();

        $this->validate($request, [
            'category' => 'required',
            'type' => 'required',
            'number' => 'required',
            'title' => 'required',
//            'isbn' => 'required',
            'subject' => 'required',
            'readby' => 'required',
            'author' => 'required',
            'province' => 'required',
            'publish' => 'required',
            'typecount' => 'nullable|integer',
            'typeyear' => 'nullable|integer',
            'amount' => 'required|integer',
            'bookhr' => 'required|integer',
            'bookmin' => 'required|integer',
            'product' => 'required',
            'status' => 'required',
        ]);
        
        $detail = new BookDetails();
        $detail->bdatein = $request->datein;
        $detail->bisbn = $request->isbn;
        $detail->bmain = $request->category;
        $detail->btitle = $request->title;
        $detail->bsubject = $request->subject;
        $detail->bword = $request->keyword;
        $detail->bread = $request->readby;
        $detail->bauthor = $request->author;
        $detail->btranslate = $request->translate;
        $detail->bprovince = $request->province;
        $detail->bpublish = $request->publish;
        $detail->type_count = $request->typecount;
        $detail->type_year = $request->typeyear;
        $detail->bdetail = $request->detail;
        $detail->bremark = $request->remark;
        $detail->save();
        
        $book = new Book();
        $book->abook = $detail->bid;
        $book->astatus = $request->status;
        $book->abnumber = $request->number;
        $book->btype = $request->type;
        $book->aprod = $request->product;
        $book->aamount = $request->amount;
        $book->book_hr = $request->bookhr;
        $book->book_min = $request->bookmin;
        $book->book_set = $request->bookset;
        $book->save();
        
        return redirect()->action('Books\BookController@show', ['id' => $book->aid]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (auth()->user()->can('view.book')) {
        $book = Book::find($id);
        return view('books.show', ['book' => $book]);
        } else {
            abort(401, trans('errors.page401'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->can('edit.book')) {
            $book = Book::find($id);
            $category = BookMain::all()->where('bmid', '>', 0);
            $type = BookType::all()->where('btid', '>', 0);
            $status = BookStatus::all();
            $province = Province::all();
            
            return view('books.update', [
                'book' => $book,
                'category' => $category,
                'type' => $type,
                'status' => $status,
                'province' => $province,
            ]);
        } else {
            abort(401, trans('errors.page401'));
        }
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::with('detail')->findOrFail($id);
        $this->validate($request, [
            'category' => 'required',
            'type' => 'required',
            'datein' => 'required',
            'number' => 'required',
            'bookhr' => 'required',
            'bookmin' => 'required',
            'title' => 'required',
//            'isbn' => 'required',
            'subject' => 'required',
            'readby' => 'required',
            'author' => 'required',
            'province' => 'required',
            'publish' => 'required',
            'amount' => 'required',
            'product' => 'required',
        ]);

        $book->detail->bmain = $request->category;
        $book->btype = $request->type;
        $book->detail->bdatein = $request->datein;
        $book->abnumber = $request->number;
        $book->detail->btitle = $request->title;
        $book->detail->bisbn = $request->isbn;
        $book->detail->bsubject = $request->subject;
        $book->detail->bword = $request->keyword;
        $book->detail->bread = $request->readby;
        $book->detail->bauthor = $request->author;
        $book->detail->btranslate = $request->translate;
        $book->detail->bprovince = $request->province;
        $book->detail->bpublish = $request->publish;
        $book->detail->type_count = $request->typecount;
        $book->detail->type_year = $request->typeyear;
        $book->detail->bdetail = $request->detail;
        $book->detail->bremark = $request->remark;
        $book->aamount = $request->amount;
        $book->book_hr = $request->bookhr;
        $book->book_min = $request->bookmin;
        $book->aprod = $request->product;
        $book->astatus = $request->status;
        $book->book_set = $request->bookset;
        $book->detail->save();
        $book->save();
        
        return redirect()->action('Books\BookController@show', ['id' => $book->aid]);
    }
    
    public function remove($id)
    {
        $book = Book::findOrFail($id);
        return view('books.delete', [
            'book' => $book,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
         $detail = $book->detail->bid;
         Book::destroy($id);
         BookDetails::destroy($detail);
        return redirect()->action('Books\BookController@index');
    }
    
    public function search()
    {
        return view('books.search', [
            'option' => 'booktitle',
        ]);
    }
    
    public function results(Request $request)
    {   
        $request->flash();
        $keyword = $request->input('search');
        $option = $request->input('selectoption');
        
    switch($option) {
            case "booktitle":
                $results = Book::with('detail')
                ->join('book_details', 'abook', '=', 'book_details.bid')
                ->where([
                ['btitle', 'LIKE', '%'.$keyword.'%'],
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
                ->orWhere('abnumber', 'LIKE', $keyword)
                ->orderBy('book_details.btitle', 'asc')
                ->paginate(25)
                ->appends(['search' => $keyword, 'selectoption' => $option]);
                break;
            case "author":
                $results = Book::with('detail')
                ->join('book_details', 'abook', '=', 'book_details.bid')
                ->where([
                ['bauthor', 'LIKE', '%'.$keyword.'%'],
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
                ->orderBy('book_details.btitle', 'asc')
                ->paginate(25)
                ->appends(['search' => $keyword, 'selectoption' => $option]);
                break;
            case "readby":
                $results = Book::with('detail')
                ->join('book_details', 'abook', '=', 'book_details.bid')
                ->where([
                ['bread', 'LIKE', '%'.$keyword.'%'],
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
                ->orderBy('book_details.btitle', 'asc')
                ->paginate(25)
                ->appends(['search' => $keyword, 'selectoption' => $option]);
                break;
                case "remark":
                    $results = Book::with('detail')
                    ->join('book_details', 'abook', '=', 'book_details.bid')
                    ->where([
                    ['bremark', 'LIKE', '%'.$keyword.'%'],
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
                    ->orderBy('book_details.btitle', 'asc')
                    ->paginate(25)
                    ->appends(['search' => $keyword, 'selectoption' => $option]);
                    break;
        }
        
        return view('books.index', [
            'results' => $results,
            'option' => $option,
        ]);
    }
}
