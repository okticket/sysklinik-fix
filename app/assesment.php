<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assesment extends Model
{
    protected $table = 'assessment';

    public function Event()
    {
        return $this->belongsTo('App\Event');
    } 
}
