@extends('layouts.dashboard')
@section('page_heading','Day '.$date->day_number . ' Words')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Word</th>
            <th>per_def</th>
            <th>Update</th>
            <th>Words Index Page</th>
            <th>Word Component</th>
        </tr>
        </thead>
        <tbody>


        @foreach($words as $word)

            <tr>
                <td><strong>{{$word->word}}</strong></td>

                <td> {{$word->per_def}}</td>

                <td> <a href="/words/{{$word->id}}/edit"> <button type="button" class="btn btn-warning btn-block">update Word</button> </a> </td>

                <td> <a href="/words/"> <button type="button" class="btn btn-warning btn-block">All Words</button> </a> </td>

                <td> <a href="/words/{{$date->id}}"> <button type="button" class="btn btn-info btn-block">Show Components</button> </a> </td>


            </tr>
        @endforeach

        </tbody>
    </table>

@stop