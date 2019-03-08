<?php

namespace App\Http\Controllers\Reading;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reading\ReadingStatus;

class StatusController extends Controller
{
    public function index()
    {
        $status = ReadingStatus::all();
        return view('reading.status.index', [
            'status' => $status,
        ]);
    }
    
    public function create()
    {
        return view('reading.status.create');
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        $status = new ReadingStatus();
        $status->name = $request->name;
        $status->save();
        return redirect()->action('Reading\StatusController@index');
    }
}
