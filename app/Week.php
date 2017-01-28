<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Week extends Model
{

    //
    protected $fillable = ['week_number', 'update_id'];

    protected $hidden = [ 'word_id', 'created_at', 'updated_at'];

    public function updateVersion()
    {
        return $this->belongsTo('App\Update' , 'update_id');
    }


    public function published($week)
    {
        $updateVersion = Update::find($week->update_id);

        if ($updateVersion->is_published)
            return true;
        else
            return false;
    }


    public function dates(){
        return $this->hasMany('App\Date');
    }


    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
