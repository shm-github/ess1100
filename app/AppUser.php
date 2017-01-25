<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    //
    protected $fillable = ['name' , 'email' , 'password'];

    public function info(){
        return $this->hasOne('App\UserInformation' , 'user_id');
    }
}
