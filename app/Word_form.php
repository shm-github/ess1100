<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Word_form extends Model {

	protected $fillable = ['word' , 'sound_file_name' , 'is_verb' , 'is_adv' ,  'is_noun' , 'is_adj' , 'sentence' ,'sentence_per' ,'word_def'];

}
