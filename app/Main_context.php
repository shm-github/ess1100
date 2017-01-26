<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Main_context extends Model {

	//
    protected $fillable = [
        'date_id'    ,
        'title_eng'  ,
        'title_per'  ,
        'context_per',
        'context_eng',
];

}
