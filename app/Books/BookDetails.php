<?php

namespace App\Books;

use Illuminate\Database\Eloquent\Model;

class BookDetails extends Model
{
    protected $table = 'book_details';
    public $timestamps = false;
    public $primaryKey = 'bid';
    
    public function Book()
    {
        return $this->hasOne('App\Books\Book', 'abook', 'bid');
    }
    
    public function main()
    {
        return $this->belongsTo('App\Books\BookMain', 'bmain', 'bmid');
    }
    
    public function province()
    {
        return $this->belongsTo('App\Books\Province', 'bprovince', 'province_id');
    }
}
