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


    {!! Form::open(['action' => 'WordController@storeIdiom'  , 'method' => 'post' , 'files' => true]) !!}


    {{ Form::hidden('date_id',$date->id ) }}

    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6 ">

                {{--word input section--}}

                <div class="form-group alert alert-info">
                    {!! Form::label('name', 'WORD' ) !!}

                    <div class="form-group">

                        {!! Form::label('name', 'Idiom(english)') !!}
                        {!! Form::text('idiom_eng' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Example(english)') !!}
                        {!! Form::text('idiom_eng_def' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>

                    <div class="form-group">

                        {!! Form::label('name', 'Idiom(persian)') !!}
                        {!! Form::text('idiom_per' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>


                    <div class="form-group">

                        {!! Form::label('name', 'Example(persian)') !!}
                        {!! Form::text('idiom_per_def' , null ,[ 'class'=>'form-control '  ] ) !!}

                    </div>
                </div>






            </div>

            <div class="col-lg-6">

                {{--image file input section--}}

                <div class="form-group alert alert-success">
                    {!! Form::label('name', 'PICTURE') !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Image File:') !!}
                        {!! Form::file('image') !!}
                    </div>

                </div>


            </div>
        </div>
    </div>


    <div class="form-group ">
        {!! Form::submit('ADD IDIOM' , ['class'=>'btn-primary btn-block alert alert-success'])   !!}

    </div>

    {!! Form::close() !!}


@endsection