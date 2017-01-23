<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = ['role'];

    public static function getNames(){

        $roles = Role::all();

        $roleNames = array() ;

        foreach ($roles as $role) {
            $roleNames[$role->role] = $role->role;
        }

        return $roleNames;
    }
}
