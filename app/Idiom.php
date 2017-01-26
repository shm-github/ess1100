<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiom extends Model {

	//
    protected $fillable = [
        'date_id',
        'idiom_eng',
        'idiom_eng_def',
        'idiom_per',
        'idiom_per_def',
        'image',
    ];

}
