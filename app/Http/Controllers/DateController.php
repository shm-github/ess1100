<?php

namespace App\Http\Controllers;

use App\Date;
use App\Week;
use Illuminate\Http\Request;

use App\Http\Requests;

class DateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dates = Date::all()->sortByDesc('week_number');
        return view('admin.dates.index' , compact('dates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $weekId
     * @return \Illuminate\Http\Response
     */
    public function create($weekId)
    {
        //
        return view('admin.dates.create' , compact('weekId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        //

        Date::create($request->all());
        redirect('dates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $date = Date::find($id);

        $words = $date->words;

        return view('admin.dates.show' ,compact('date' , 'words') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $date = Date::find($id);

        $weeks = Week::lists('week_number' ,'id' );
        return view('admin.dates.edit' , compact('date' , 'weeks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $date = Date::find($id);

        $input = $request ->all();

        $date -> day_number = $input['day_number'];
        $date -> week_id = $input['week_id'];
        $date -> save();


        return redirect('dates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
