@extends('layouts.dashboard')
@section('page_heading','Add New Word')
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


    {!! Form::open(['action' => 'WordController@storeWordForm'  , 'method' => 'post']) !!}


    {{ Form::hidden('word_id',$word->id ) }}


                {{--word forms input section--}}


                    <div class="form-group alert alert-info">
                        {!! Form::label('name', 'TYPE 1') !!}

                        <div class="form-group">

                            {!! Form::label('name', 'Word:') !!}
                            {!! Form::text('word' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Word Definition:') !!}
                            {!! Form::text('word_form_def' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Type:') !!}
                            {!! Form::select('form_type' , [ 1 =>'Verb' ,   2 =>'Adjective' ,  3=>'Adverb'  , 4 =>'Noun'   ] , null,[ 'class'=>'form-control btn-block'  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence:') !!}
                            {!! Form::text('word_form_sentence' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence Definition:') !!}
                            {!! Form::text('word_form_sentence_def' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                    </div>




    <div class="form-group ">
        {!! Form::submit('Create Word Form' , ['class'=>'btn-primary btn-block alert alert-success'])   !!}

    </div>

    {!! Form::close() !!}


@endsection