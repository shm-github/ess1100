<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class pronounciation extends Model {

	//
    protected $fillable = [ 'file_name'];
    protected $hidden = [ 'word_id', 'created_at', 'updated_at'];

}
