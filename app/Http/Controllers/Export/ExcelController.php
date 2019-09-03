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
        $book = BookDetails::whereBetween('bdatein', ['2019-03-01', '2019-04-01'])->get();
        return view('Export.Excel.Create');
    }

    public function export(Request $request)
    {
        $startdate = $request->input('startdate');
        $enddate = $request->input('enddate');
        $book = BookDetails::with('book')
        ->whereBetween('bdatein', [$startdate, $enddate])
        ->get();
        
        return (new FastExcel($book))->download('test.xlsx');
    }
    }
