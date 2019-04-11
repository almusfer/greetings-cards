<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //

    protected $fillable = ['event_id', 'url', 'positionX', 'positionY', 'text_color', 'font_size', 'font_id', 'active'];

    public function event()
    {
        return $this->belongsTo('App\Event')->withDefault();
    }

}
