<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model {

	//
    protected $fillable = ['word', 'week_id' , 'date_id' ,'per_def' , 'eng_def'];


    public function date(){
        return $this->belongsTo('App\Date');
    }

}
