<?php

/**
 * Created by PhpStorm.
 * User: Hossein
 * Date: 1/21/2017
 * Time: 8:04 PM
 */
namespace App\Utils\Transformation;

 abstract class Transform
{

    public function transformCollection(array $items)
    {
        return array_map( [$this , 'Transform'] , $items);
    }


    public abstract function Transform($item);

}