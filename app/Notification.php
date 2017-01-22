<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

	//

    protected $fillable = [];

    public function requests(){
        $this->morphMany('App\Request' , 'requestable');
    }

}
