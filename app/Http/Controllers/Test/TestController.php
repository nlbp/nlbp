<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Books\Book;
use App\Books\BookDetails;
use App\Books\BookType;
use App\Mail\support;
use App\Http\Resources\Test\TestResource;
use function GuzzleHttp\json_decode;
use Yajra\DataTables\DataTables;
use Rap2hpoutre\FastExcel\FastExcel;

class TestController extends Controller
{
    public function dataIndex()
    {
        return view('test.datatable');
    }
    
    public function data()
    {
        return DataTables::of(Book::query());
    }
    
    public function jquery()
    {
        return view('test.jquery');
    }
    
    public function excel()
    {
$book = Book::with(['detail', 'detail.main', 'type', 'status'])
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
		->get();
        
        return (new FastExcel($book))->download('test.xlsx', function ($book) {
            return [
                'id' => $book->aid,
                'author' => $book->detail->bauthor,
                'title' => $book->detail->btitle,
            ];
        });
    }
    
    public function vue()
    {
        $data = BookDetails::find(8000);
        $content = collect([
            ['text' => 'test1'],
            ['text' => 'test2'],
            ['text' => 'test3'],
            ['text' => 'test4'],
            ['text' => 'test5']
        ])->toJson();
                
        return view('test.vue', [
            'data' => $data,
            'content' => $content,
        ]);
    }
    
    public function TestApi(BookDetails $book)
    {
        return TestResource::collection($book->query()->paginate(25));
    }
    
    public function resourceIndex()
    {
        $getData = url('http://update.test/test/api');
        $data = json_decode(file_get_contents($getData, true));
        return view('test.resource', [
            'data' => $data,
        ]);
    }
}
