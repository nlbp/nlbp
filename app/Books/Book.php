<?php

namespace App\Books;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    public $timestamps = false;
    public $primaryKey = 'aid';
    
    public function detail()
    {
        return $this->belongsTo('App\Books\BookDetails', 'abook', 'bid');
    }
    
    public function status()
    {
        return $this->belongsTo('App\Books\BookStatus', 'astatus', 'bsid');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Books\BookType', 'btype', 'btid');
    }
}
