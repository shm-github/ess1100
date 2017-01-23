<?php

namespace App\Http\Controllers;

use App\DeviceBrand;
use App\OsName;
use App\OsVersion;
use App\Role;
use App\User;
use App\UserInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();

        return view('admin.index' , compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.create');
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
        $this->validate($request,[
            'name' => 'required',
            'email'=> 'required' ,
            'password' => 'required',
            'os_name' => 'required',
            'os_version' => 'required',
            'device_brand' => 'required',
            'device_name' => 'required',
            'resolution' => 'required',
            'imei' => 'required',
            'active_state' => 'required'
        ]);

        $input = $request->all();

        $user = User::create([
            'name' => $input['name'],
            'email'=> $input['email'],
            'password' => $input['password']
        ]);

        $role = Role::whereRole('app_user')->first();

        $user ->roles()->save($role);




        $osName = OsName::whereName( $input['os_name'])->first();

        if(!$osName)
            $osName =OsName::create(['name'=>$input['os_name']]);




        $osVersion = OsVersion::whereVersion( $input['os_version'])->first();

        if(!$osVersion)
            $osVersion =OsVersion::create(['version'=>$input['os_version']]);




        $deviceBrand = DeviceBrand::whereName( $input['device_brand'])->first();

        if(!$deviceBrand)
            $deviceBrand =DeviceBrand::create(['name'=>$input['device_brand']]);




        $info = UserInformation::create([
            'os_name_id' => $osName->id,
            'os_version_id' => $osVersion->id,
            'device_brand_id' => $deviceBrand->id,
            'device_name' => $input['device_name'],
            'screen_resolution' => $input['resolution'],
            'device_IMEI' => $input['imei'],
            'is_activated' => $input['active_state'],
            'install_date' => Carbon::now(),
            'activate_date' => Carbon::now(),
        ]);

        $user->info()->save($info);

        return redirect('admin/users');
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
        //
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
