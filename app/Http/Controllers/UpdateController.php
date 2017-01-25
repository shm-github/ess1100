<?php

namespace App\Http\Controllers;

use App\Update;
use Illuminate\Http\Request;

use App\Http\Requests;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $updates = Update::all();
        return view('admin.update.index' , compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.update.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $this->validate($request ,[
            'version' => 'required',
        ]);


        $input = $request->all();

        if (!array_key_exists('is_published' , $input))
            $input['is_published']=false;

        Update::create($request->all());

        return redirect('updates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $update = Update::find($id);
        return view('admin.update.edit' , compact('update'));
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

        $update = Update::find($id);

        $input = $request ->all();

        if (!array_key_exists('is_published' , $input))
            $input['is_published']=false;

        $update -> version = $input['version'];
        $update -> is_published = $input['is_published'];
        $update -> save();


//        $update->save($request->all());
        return redirect('updates');
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
