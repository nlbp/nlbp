<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Books\Book;
use App\Books\BookDetails;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = BookDetails::with('book')
        ->latest('bdatein')
        ->take(30)
        ->get();
        return view('home', [
            'title' => 'Home',
            'book' => $book,
        ]);
    }
}
