<?php

namespace App\Books;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    public $timestamps = false;
    public $primaryKey = 'province_id';
    
    public function detail()
    {
        return $this->hasOne('App\Books\BookDetails', 'bprovince', 'province_id');
    }
}
