<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Request extends Model {

	//

    use SoftDeletes;

    protected $dates=['deleted_at'];

    public function requestable(){
        $this->morphTo();
    }
}
