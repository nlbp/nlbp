<?php

namespace App\Http\Controllers\Books;

use Illuminate\Http\Request;
use App\Books\Book;
use App\Books\BookDetails;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    
    public function search(Request $request)
    {
//        $request->flash();
$option = $request->input('selectoption');
        $book = BookDetails::with('book')
        ->latest('bdatein')
        ->take(30)->get();
        
        return view('books.search', [
            'book' => $book,
            'option' => $option,
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
                ->orderBy('btitle', 'asc')
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
                ->orderBy('btitle', 'asc')
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
                ->orderBy('btitle', 'asc')
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
                    ->orderBy('btitle', 'asc')
                    ->paginate(25)
                    ->appends(['search' => $keyword, 'selectoption' => $option]);
                    break;
        }
        
return view('books.search', [
    'results' => $results,     
            'option' => $option,
        ]);
    }
    
    public function show($id)
    {
        return view('books.SearchShow', [
            'book' => Book::findOrFail($id),
        ]);
    }
}
