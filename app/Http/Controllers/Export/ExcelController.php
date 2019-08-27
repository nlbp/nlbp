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
        return view('Export.Excel.Create');
    }
    
    public function export(Request $request)
    {
        $book = BookDetails::with('book')
        ->whereBetween('bdatein', ['2019-01-01', '2019-07-31'])
        ->get();
        
        (New FastExcel($book))->export('test.xlsx');
    }
}
