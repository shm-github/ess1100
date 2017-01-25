@extends('layouts.dashboard')
@section('page_heading','Create User')
@section('section')


    {!! Form::open(['action' => 'AdminUsersController@store' , 'method' => 'post']) !!}



    <div class="form-group ">

        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name' , null ,[ 'class'=>'form-control ' , 'placeholder'=>'enter name' ] ) !!}

    </div>

    <div class="form-group">

        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email' , null ,[ 'class'=>'form-control' , 'placeholder'=>'enter email'] ) !!}

    </div>

    <div class="form-group">

        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password' ,[ 'class'=>'form-control' , 'placeholder'=>'enter password' ] ) !!}

    </div>

    <div class="form-group">
        {!! Form::label('role', 'Role:') !!}
        {!!  Form::select('role', App\Role::getNames() , null ,[ 'class'=>'form-control' ]) !!}

    </div>




    <div class="container-fluid bg-info">

        <div class="form-group " >

            {!! Form::label('name', 'OS Name:') !!}
            {!! Form::text('os_name' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>


        <div class="form-group " >

            {!! Form::label('name', 'OS Version:') !!}
            {!! Form::text('os_version' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>


        <div class="form-group " >

            {!! Form::label('name', 'Device Brand:') !!}
            {!! Form::text('device_brand' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>

        <div class="form-group " >

            {!! Form::label('name', 'Device Model Name:') !!}
            {!! Form::text('device_name' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>


        <div class="form-group " >

            {!! Form::label('name', 'Screen Resolution:') !!}
            {!! Form::text('resolution' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>


        <div class="form-group " >

            {!! Form::label('name', 'Device IMEI:') !!}
            {!! Form::text('imei' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>

        <div class="form-group">
            {!! Form::label('active', 'Active state:') !!}
            {!!  Form::select('active_state', array(1=>'active' , 0 => 'not active') , null ,[ 'class'=>'form-control' ]) !!}

        </div>

    </div>



    <br />



    <div class="form-group">
        {!! Form::submit('create post' , ['class'=>'btn-primary'])   !!}

    </div>
    {!! Form::close() !!}



    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>

                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach


            </ul>
        </div>
    @endif






@endsection