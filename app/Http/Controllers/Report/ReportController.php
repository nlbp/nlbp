<?php

namespace App\Http\Controllers\Report;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Books\Book;
use App\Books\BookDetails;
use App\Reading\ReadingPerson;
use App\Reading\ReadingStatus;

class ReportController extends Controller
{
    
    public function index()
    {
        return view('report.index');
    }
}
