<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Indicator extends Model
{
    //
    protected $table = 'indicator';

    public function vocabulary()
    {
        return $this->belongsTo('App\Vocabulary','vocab');
    }
   
}
