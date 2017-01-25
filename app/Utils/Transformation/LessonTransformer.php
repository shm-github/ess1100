<?php

/**
 * Created by PhpStorm.
 * User: Hossein
 * Date: 1/21/2017
 * Time: 8:06 PM
 */
namespace App\Utils\Transformation;


class LessonTransformer extends Transform
{

    public function transform($lesson){
        return [
            'lessonName' => $lesson['title'] ,
            'lessonDescription' => $lesson['body']
        ];
    }

}