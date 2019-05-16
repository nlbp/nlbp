<?php

namespace App\Http\Controllers\Vue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Books\Book;

class VueController extends Controller
{
    public function text1()
    {
        return view('vue.text');
    }
    
    public function form()
    {
        return view('vue.form');
    }
    
    public function axios()
    {
        return view('vue.axios');
    }
}
