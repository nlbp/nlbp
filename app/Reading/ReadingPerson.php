<?php

namespace App\Reading;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ReadingPerson extends Model
{
    use Notifiable;
    
    protected $table = 'reading_person';
    
    public function status()
    {
        return $this->belongsTo('App\Reading\ReadingStatus', 'status_id');
    }
}
