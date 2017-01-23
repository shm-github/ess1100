<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model {

	//



    public function osVersion(){
        return $this->belongsTo('App\OsVersion' , 'os_version_id');
    }

    public function osName(){
        return $this->belongsTo('App\OsName' , 'os_name_id');
    }

    public function deviceBrand(){
        return $this->belongsTo('App\DeviceBrand' , 'device_brand_id');
    }
}
