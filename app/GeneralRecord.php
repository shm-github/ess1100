<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralRecord extends Model {

	//
    protected $fillable = [];

    public function records(){
        $this->morphMany('App\Record' , 'recordable');
    }
}
