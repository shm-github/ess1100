<?php

namespace App\Http\Controllers;

use App\Update;
use App\Week;
use Illuminate\Http\Request;

use App\Http\Requests;

class WeekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $weeks = Week::all();

        return view('admin.weeks.index' , compact('weeks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $updateVersions = Update::lists('version' , 'id');

        return view('admin.weeks.create' ,compact('updateVersions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Week::create($request->all());

        return redirect('/weeks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $week = Week::find($id);

        $dates = $week->dates;

        return view('admin.weeks.show' ,compact('dates' , 'week') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $week = Week::find($id);
        $updateVersions = Update::lists('version' , 'id');

        return view('admin.weeks.edit' , compact('week' , 'updateVersions'));
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
        $week = Week::find($id);

        $input = $request ->all();

        $week -> week_number = $input['week_number'];
        $week -> update_id = $input['update_id'];
        $week -> save();


        return redirect('weeks');
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
