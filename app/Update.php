<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Update extends Model {

	//
    protected $fillable = ['version' , 'is_published'];

    //get related weeks to each update version
    public function weeks(){
        return $this->hasMany('App\Week' , 'update_id');
    }


    //set polymorphic relationship to be able became a admin request
    public function requests(){
        $this->morphMany('App\Request' , 'requestable');
    }


}
