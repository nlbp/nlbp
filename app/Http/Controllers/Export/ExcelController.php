<?php

namespace App\Http\Controllers\Export;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Http\Controllers\Controller;
use App\Books\Book;
use App\Books\BookDetails;

class ExcelController extends Controller
{
    
    public function create()
    {
        $book = BookDetails::with('book')
        ->whereBetween('bdatein', ['2019-01-01', '2019-08-21'])
        ->get();
        
        return view('Export.Excel.Create', [
            'book' => $book,
        ]);
    }
    
    public function export(Request $request)
    {
        $book = BookDetails::with('book')
        ->whereBetween('bdatein', ['2019-01-01', '2019-07-31'])
        ->get();
        
        (New \Rap2hpoutre\FastExcel\Facades\FastExcel($book))->export('test.xlsx');
    }
}
