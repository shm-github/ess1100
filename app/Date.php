<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //

    protected $fillable = ['day_number' , 'week_id'];

    public function week(){
        return $this->belongsTo('App\Week');
    }

    public function words(){
        return $this->hasMany('App\Word');
    }


    public function wordsCount($date){
        return count($date->words) ;
    }
}
