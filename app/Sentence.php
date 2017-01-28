<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{

    //
    protected $fillable = ['sentence_eng', 'sentence_per', 'deleted_word'];

    protected $hidden = [ 'word_id', 'created_at', 'updated_at'];

}
