@extends('layouts.dashboard')
@section('page_heading','Create Date')
@section('section')

    {!! Form::open(['action' => 'DateController@store' , 'method' => 'post']) !!}

    {{ Form::hidden('week_id',$weekId ) }}

    <div class="form-group ">

        {!! Form::label('name', 'Day Number:') !!}
        {!! Form::text('day_number' , null ,[ 'class'=>'form-control ' , 'placeholder'=>'enter name' ] ) !!}

    </div>

    <div class="form-group">
        {!! Form::submit('create day' , ['class'=>'btn-primary'])   !!}

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

@stop