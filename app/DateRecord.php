<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DateRecord extends Model {

	//
    protected $fillable = [];

    public function records(){
        $this->morphMany('App\Record' , 'recordable');
    }

}
