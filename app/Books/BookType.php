<?php

namespace App\Books;

use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    protected $table = 'book_type';
    public $timestamps = false;
    public $primaryKey = 'btid';
    
    public function book()
    {
        return $this->hasOne('App\Books\Book', 'btype', 'btid');
    }
}
