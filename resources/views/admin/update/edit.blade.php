@extends('layouts.dashboard')
@section('page_heading','Add Update')
@section('section')



    {!! Form::model($update , ['method'=>'PATCH' , 'action'=>['UpdateController@update' , $update->id]]) !!}


    <div class="form-group ">

        {!! Form::label('name', 'Version:') !!}
        {!! Form::text('version' , null ,[ 'class'=>'form-control ' , 'placeholder'=>'enter name' ] ) !!}

    </div>


    <div class="form-group ">

        {!! Form::label('name', 'Publish:') !!}
        {!! Form::checkbox('is_published', true ) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('update' , ['class'=>'btn-primary'])   !!}

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
