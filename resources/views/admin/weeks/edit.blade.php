@extends('layouts.dashboard')
@section('page_heading','Update Week')
@section('section')



    {!! Form::model($week , ['method'=>'PATCH' , 'action'=>['WeekController@update' , $week->id]]) !!}


    <div class="form-group ">

        {!! Form::label('name', 'Week Number:') !!}
        {!! Form::text('week_number' , null ,[ 'class'=>'form-control ' , 'placeholder'=>'enter name' ] ) !!}

    </div>


    <div class="form-group">
        {!! Form::label('role', 'Update Version:') !!}
        {!!  Form::select('update_id', $updateVersions , $week->update_id ,[ 'class'=>'form-control' ]) !!}

    </div>


    <div class="form-group">
        {!! Form::submit('update post' , ['class'=>'btn-primary'])   !!}

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
