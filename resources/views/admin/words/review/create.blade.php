@extends('layouts.dashboard')
@section('page_heading','Add Review To Week ' . $week->id)
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





    {!! Form::open(['action' => 'WordController@storeReview'  , 'method' => 'post']) !!}


    {{ Form::hidden('week_id',$week->id ) }}



    {{--word input section--}}

    <div class="form-group alert alert-info ">
        {!! Form::label('name', 'WORD' ) !!}


    @foreach($words[0] as $word)

            <div class="form-group col-xs-2'">

                {!! Form::label('name', "$word->word" ) !!}
                {!! Form::text("$word->word" , null ,[ 'class'=>'form-control'] ) !!}

            </div>

        @endforeach

    </div>


    <div class="form-group ">
        {!! Form::submit('ADD Review' , ['class'=>'btn-primary btn-block alert alert-success'])   !!}

    </div>

    {!! Form::close() !!}



@endsection