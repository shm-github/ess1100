@extends('layouts.dashboard')
@section('page_heading','Add Sentence to ' . $word->word)
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


    {!! Form::open(['action' => 'WordController@storeSentence'  , 'method' => 'post' , 'files' => true]) !!}

    {{ Form::hidden('word_id',$word->id ) }}



    {{--sentence input section--}}

    <div class="form-group alert alert-warning">

        {!! Form::label('name', 'SENTENCE') !!}

        <div class="form-group">

            {!! Form::label('name', 'Sentence:') !!}
            {!! Form::text('sentence_eng' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>

        <div class="form-group">

            {!! Form::label('name', 'Persian Definition:') !!}
            {!! Form::text('sentence_per' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>

        <div class="form-group">

            {!! Form::label('name', 'Deleted Word:') !!}
            {!! Form::text('deleted_word' , null ,[ 'class'=>'form-control '  ] ) !!}

        </div>
    </div>



    <div class="form-group ">
        {!! Form::submit('create Sentence' , ['class'=>'btn-primary btn-block alert alert-success'])   !!}

    </div>

    {!! Form::close() !!}


@endsection