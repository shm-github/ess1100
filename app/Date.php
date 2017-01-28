<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Date extends Model
{
    //

    protected $fillable = ['day_number' , 'week_id'];

    protected $hidden = [ 'word_id', 'created_at', 'updated_at'];

    public function week(){
        return $this->belongsTo('App\Week');
    }

    public function words(){
        return $this->hasMany('App\Word');
    }

    public function idiom(){
        return $this->hasOne('App\Idiom');
    }

    public function context(){
        return $this->hasOne('App\Main_context');
    }


    public function wordsCount($date){
        return count($date->words) ;
    }
}
