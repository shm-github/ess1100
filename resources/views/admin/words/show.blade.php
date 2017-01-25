@extends('layouts.dashboard')
@section('page_heading', 'Word Component')
@section('section')


    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 ">


                <div class="alert alert-info">
                    <table>
                        <thead>
                        <tr>
                            <th>Word</th>
                            <th>Meaning</th>
                            <th>English Definition</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td><strong>{{$word->word}}</strong></td>

                            <td> {{$word->per_def}}</td>

                            <td> {{$word->eng_def}}</td>
                        </tr>

                        </tbody>
                    </table>
                </div>


            </div>
            <div class="col-lg-6">

                <div class="form-group">
                    <img src="/images/{{$word->image->file_name}}" alt="">
                </div>


            </div>
        </div>


        <div class="alert alert-info">
            <table>
                <thead>
                <tr>
                    <th>Sentence</th>
                    <th>Persian Definition</th>
                    <th>Deleted Word</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>

                @foreach($word->sentences as $sentence)

                    <tr>
                        <td><strong>{{$sentence->sentence_eng}}</strong></td>
                        <td> {{$sentence->sentence_per}}</td>
                        <td> {{$sentence->deleted_word}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE' ,'action'=>['WordController@destroySentence' , $sentence->id]]) !!}
                            {!! Form::submit('delete Sentence' , ['class'=>'btn btn-danger btn-block'])   !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

           <a href="/words/{{$word->id}}/sentence">
                    <button type="button" class="btn btn-info btn-block">ADD</button>
                </a>
        </div>


        <div class="alert alert-info">
            <table>
                <thead>
                <tr>
                    <th>Word</th>
                    <th>Word Meaning</th>
                    <th>Type</th>
                    <th>Sentence</th>
                    <th>Sentence Meaning</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>


                @foreach($word->wordForms as $wordForm)

                    <tr>
                        <td><strong>{{$wordForm->word}}</strong></td>
                        <td><strong>{{$wordForm->word_def}}</strong></td>
                        @if($wordForm->is_verb)
                            <td> Verb</td>

                        @elseif($wordForm->is_adv)
                            <td> Adverb</td>

                        @elseif($wordForm->is_noun)
                            <td> Noun</td>

                        @elseif($wordForm->is_adj)
                            <td> Adjective</td>
                        @endif
                        <td> {{$wordForm->sentence}}</td>
                        <td> {{$wordForm->sentence_per}}</td>
                        <td>
                            {!! Form::open(['method'=>'DELETE' ,'action'=>['WordController@destroyWordForm' , $wordForm->id]]) !!}
                            {!! Form::submit('Delete Word Form' , ['class'=>'btn btn-danger btn-block'])   !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>


            <a href="/words/{{$word->id}}/word_form">
                <button type="button" class="btn btn-info btn-block">ADD</button>
            </a>


        </div>




    </div>














@stop