<?php

namespace App\Http\Controllers;

use App\Update;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserRequestController extends Controller
{

    public function getUpdate($updateId)
    {
        $update = Update::find($updateId);

        if ($update == null)
            return $this->notFoundError('update with id ' . $updateId . ' not Found!');


        if (!$update->is_published)
            return $this->notFoundError('update with id ' . $updateId . ' is not published!');

        $weeks = $update->weeks->all();
        $output = [];



        foreach ($weeks as $week) {

            foreach ($week->dates as $day) {

                foreach ($day->words as $word) {
                    $wordNumber = 'word '.$word->id ;

                    $w = [
                        'word' => $word->word ,
                        'date_id' => $word->date_id ,
                        'per_def' => $word->per_def ,
                        'eng_def' => $word->eng_def ,
                    ];

                    $mWord = [
                        'word' =>  $w,
                        'sentences' =>  $word->sentences->all(),
                        'pic' =>  $word->image,
                        'pronunciation' =>  $word->pronunciation,
                        'wordForms' =>  $word->wordForms->all(),
                    ];

                    $mWords[] = $mWord;
                }
                /** end of word foreach*/

                $dayNumber = 'day '.$day->day_number;
                $main_context = $day->context;
                $idiom = $day->idiom;

                $mDay = [
                    'idiom' =>$idiom ,
                    'context' => $main_context ,
                    'words' => $mWords
                ];

                $mDays[] = $mDay;
            }


            $weekNumber = $week->week_number;

            $mWeek = [
                'reviews' => $week->reviews->all() ,
                'days' => $mDays ,
            ];

            $output[] = $mWeek;

            $mDays = null ;


        }


        return response()->json($output);
    }
}
