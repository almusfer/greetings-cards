<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = ['name', 'description', 'active'];
    public function cards()
    {
        return $this->hasMany('App\Card');
    }


}
