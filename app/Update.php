<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model {

	//
    protected $fillable = [];

    public function requests(){
        $this->morphMany('App\Request' , 'requestable');
    }

}
