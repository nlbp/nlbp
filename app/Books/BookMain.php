<?php

namespace App\Books;

use Illuminate\Database\Eloquent\Model;

class BookMain extends Model
{
    protected $table = 'book_main';
    public $timestamps = false;
    public $primaryKey = 'bmid';
    
    public function detail()
    {
        return $this->hasOne('App\Books\BookDetails', 'bmain', 'bmid');
    }
}
