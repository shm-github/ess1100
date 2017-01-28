<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model {

	//
    protected $fillable = ['word' , 'date_id' ,'per_def' , 'eng_def'];

    protected $hidden = [ 'word_id', 'created_at', 'updated_at'];


    public function date(){
        return $this->belongsTo('App\Date');
    }

    public function sentences(){
        return $this->hasMany('App\Sentence');
    }

    public function pronunciation(){
        return $this->hasOne('App\Pronounciation');
    }

    public function image(){
        return $this->hasOne('App\Pic');
    }

    public function wordForms(){
        return $this->hasMany('App\Word_form');
    }

}
