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


    {!! Form::open(['action' => 'WordController@store'  , 'method' => 'post' , 'files' => true]) !!}


    {{ Form::hidden('date_id',$date->id ) }}

    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 ">

                {{--word input section--}}

                <div class="form-group alert alert-info">
                    {!! Form::label('name', 'WORD' ) !!}

                    <div class="form-group">

                        {!! Form::label('name', 'Word:') !!}
                        {!! Form::text('word' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Persian Definition:') !!}
                        {!! Form::text('per_def' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'English Definition:') !!}
                        {!! Form::text('eng_def' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>
                </div>


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

                {{--image file input section--}}

                <div class="form-group alert alert-success">
                    {!! Form::label('name', 'PICTURE') !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Image File:') !!}
                        {!! Form::file('image') !!}
                    </div>

                </div>


                {{--sound file input section--}}

                <div class="form-group alert alert-success">

                    {!! Form::label('name', 'PRONUNCIATION') !!}

                    <div class="form-group">

                        {!! Form::label('name', 'Sound File:') !!}
                        {!! Form::file('sound') !!}

                    </div>
                </div>


            </div>

            <div class="col-lg-6">

                {{--word forms input section--}}

                <div class="form-group alert alert-success">

                    {!! Form::label('name', 'WORD FORMS') !!}
                    <br/>
                    <br/>

                    <div class="form-group alert alert-info">
                        {!! Form::label('name', 'TYPE 1') !!}

                        <div class="form-group">

                            {!! Form::label('name', 'Word:') !!}
                            {!! Form::text('word_form_1' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Word Definition:') !!}
                            {!! Form::text('word_form_def_1' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Type:') !!}
                            {!! Form::select('form_type_1' , [ 1 =>'Verb' ,   2 =>'Adjective' ,  3=>'Adverb'  , 4 =>'Noun'   ] , null,[ 'class'=>'form-control btn-block'  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence:') !!}
                            {!! Form::text('word_form_sentence_1' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence Definition:') !!}
                            {!! Form::text('word_form_sentence_def_1' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                    </div>


                    <div class="form-group alert alert-info">
                        {!! Form::label('name', 'TYPE 2') !!}

                        <div class="form-group">

                            {!! Form::label('name', 'Word:') !!}
                            {!! Form::text('word_form_2' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Word Definition:') !!}
                            {!! Form::text('word_form_def_2' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Type:') !!}
                            {!! Form::select('form_type_2' , [ 1 =>'Verb' ,   2 =>'Adjective' ,  3=>'Adverb'  , 4 =>'Noun'   ] , null,[ 'class'=>'form-control btn-block'  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence:') !!}
                            {!! Form::text('word_form_sentence_2' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence Definition:') !!}
                            {!! Form::text('word_form_sentence_def_2' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                    </div>


                    <div class="form-group alert alert-info">
                        {!! Form::label('name', 'TYPE 3') !!}

                        <div class="form-group">

                            {!! Form::label('name', 'Word:') !!}
                            {!! Form::text('word_form_3' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Word Definition:') !!}
                            {!! Form::text('word_form_def_3' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Type:') !!}
                            {!! Form::select('form_type_3' , [ 1 =>'Verb' ,   2 =>'Adjective' ,  3=>'Adverb'  , 4 =>'Noun'   ] , null,[ 'class'=>'form-control btn-block'  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence:') !!}
                            {!! Form::text('word_form_sentence_3' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence Definition:') !!}
                            {!! Form::text('word_form_sentence_def_3' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                    </div>


                    <div class="form-group alert alert-info">
                        {!! Form::label('name', 'TYPE 4') !!}

                        <div class="form-group">

                            {!! Form::label('name', 'Word:') !!}
                            {!! Form::text('word_form_4' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Word Definition:') !!}
                            {!! Form::text('word_form_def_4' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Type:') !!}
                            {!! Form::select('form_type_4' , [ 1 =>'Verb' ,   2 =>'Adjective' ,  3=>'Adverb'  , 4 =>'Noun'   ] , null,[ 'class'=>'form-control btn-block'  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence:') !!}
                            {!! Form::text('word_form_sentence_4' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                        <div class="form-group">

                            {!! Form::label('name', 'Sentence Definition:') !!}
                            {!! Form::text('word_form_sentence_def_4' , null ,[ 'class'=>'form-control '  ] ) !!}

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="form-group ">
        {!! Form::submit('create post' , ['class'=>'btn-primary btn-block alert alert-success'])   !!}

    </div>

    {!! Form::close() !!}


@endsection