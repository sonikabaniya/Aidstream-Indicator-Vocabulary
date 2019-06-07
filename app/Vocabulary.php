<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    protected $table = 'Vocabulary';

    public function indicators()
    {
        return $this->hasMany('App\Indicator','vocab');
    }
}
