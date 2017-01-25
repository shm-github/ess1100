<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class Controller extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;


    protected $statusCode = 200 ;

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;

    }

    /**
     * @param int $statusCode
     * @return $this
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this ;
    }



    public function notFoundError($message="Not Found!"){

        return $this->setStatusCode(404)->errorRespond($message);

    }


    public function internalError($message = "internal error"){

        return $this->setStatusCode(500)->errorRespond($message);
    }



    public function userNameExistsError($message = "username exists"){
        //409 is conflict error
        return $this->setStatusCode(409)->errorRespond($message);
    }


    public function emptyFieldError($messages)
    {
//        return response()->json(array(
//                $messages,
//                400)
//        );
        return $this->setStatusCode(400)->respond( array($messages) );
    }


    public function userCreateSuccessfully($messages = 'user create successfully')
    {
        return $this->respond( array($messages) );
//        return response()->json(array(
//                $messages,
//                200)
//        );
    }



    public function errorRespond($message ){

        return $this->respond([
            'error' => $message ,
            'error_code' => $this->statusCode
        ]);
    }


    public function respond(array $data , $headers = []){
        return response($data , $this->statusCode , $headers);
    }
}
