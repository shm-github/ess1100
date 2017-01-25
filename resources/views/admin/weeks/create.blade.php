@extends('layouts.dashboard')
@section('page_heading','Add Week')
@section('section')


    {!! Form::open(['action' => 'WeekController@store' , 'method' => 'post']) !!}



    <div class="form-group ">

        {!! Form::label('name', 'Week Number:') !!}
        {!! Form::text('week_number' , null ,[ 'class'=>'form-control ' , 'placeholder'=>'enter name' ] ) !!}

    </div>


    <div class="form-group">
        {!! Form::label('role', 'Update Version:') !!}
        {!!  Form::select('update_id', $updateVersions , null ,[ 'class'=>'form-control' ]) !!}

    </div>


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