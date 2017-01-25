@extends('layouts.dashboard')
@section('page_heading','Update Day')
@section('section')



    {!! Form::model($date , ['method'=>'PATCH' , 'action'=>['DateController@update' , $date->id]]) !!}


    <div class="form-group ">

        {!! Form::label('name', 'Day Number:') !!}
        {!! Form::text('day_number' , null ,[ 'class'=>'form-control ' , 'placeholder'=>'enter name' ] ) !!}

    </div>

    <div class="form-group">
        {!! Form::label('role', 'Week Number:') !!}
        {!!  Form::select('week_id', $weeks ,$date->week_id ,[ 'class'=>'form-control' ]) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('update day' , ['class'=>'btn-primary'])   !!}

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
