@extends('layouts.dashboard')
@section('page_heading','Add Idiom')
@section('section')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>

                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach


            </ul>
        </div>
    @endif





    {!! Form::open(['action' => 'WordController@storeContext'  , 'method' => 'post' , 'files' => true]) !!}


    {{ Form::hidden('date_id',$date->id ) }}



    {{--word input section--}}

    <div class="form-group alert alert-info ">
        {!! Form::label('name', 'WORD' ) !!}

        <div class="form-group col-xs-2'">

            {!! Form::label('name', 'Title(english)') !!}
            {!! Form::text('title_eng' , null ,[ 'class'=>'form-control'] ) !!}

        </div>

        <div class="form-group">

            {!! Form::label('name', 'Context(english)') !!}
            {!! Form::textarea('context_eng' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>

        <div class="form-group">

            {!! Form::label('name', 'Title(persian)') !!}
            {!! Form::text('title_per' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>


        <div class="form-group">

            {!! Form::label('name', 'Context(persian)') !!}
            {!! Form::textarea('context_per' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>
    </div>


    <div class="form-group ">
        {!! Form::submit('ADD CONTEXT' , ['class'=>'btn-primary btn-block alert alert-success'])   !!}

    </div>

    {!! Form::close() !!}



@endsection