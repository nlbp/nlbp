<?php

namespace App\Books;

use Illuminate\Database\Eloquent\Model;

class BookStatus extends Model
{
    protected $table = 'book_status';
    public $timestamps = false;
    public $primaryKey = 'bsid';
    
    public function book()
    {
        return $this->hasOne('App\Books\Book', 'astatus', 'bsid');
    }
}
