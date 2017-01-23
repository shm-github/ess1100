<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model {

	//
    protected $fillable = [
        'device_IMEI' ,
        'screen_resolution' ,
        'device_brand_id' ,
        'device_name' ,
        'os_name_id' ,
        'os_version_id' ,
        'is_activated' ,
        'user_online_state' ,
        'activate_date' ,
        'install_date' ];


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
