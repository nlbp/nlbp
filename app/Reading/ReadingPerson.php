<?php

namespace App\Reading;

use Illuminate\Database\Eloquent\Model;

class ReadingPerson extends Model
{
    protected $table = 'reading_person';
    public function status()
    {
        return $this->belongsTo('App\Reading\ReadingStatus', 'status_id');
    }
}
