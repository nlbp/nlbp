<?php

namespace App\Reading;

use Illuminate\Database\Eloquent\Model;

class ReadingStatus extends Model
{
    protected $table = 'reading_status';
    
    public function person()
    {
        return $this->hasOne('App\Reading\ReadingPerson', 'status_id');
    }
}
