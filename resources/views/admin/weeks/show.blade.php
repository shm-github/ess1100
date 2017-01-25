@extends('layouts.dashboard')
@section('page_heading','Week '.$week->week_number . ' Days')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Day</th>
            <th>Word Counts</th>
            <th>Update</th>
            <th>Days Index Page</th>
            <th>Add Word</th>
            <th>Show Words</th>
            <th>Add idiom</th>
            <th>Add main context</th>
        </tr>
        </thead>
        <tbody>


        @foreach($dates as $date)

            <tr>
                <td><strong>{{$date->day_number}}</strong></td>

                <td> {{$date->wordsCount($date)}}</td>

                <td> <a href="/dates/{{$date->id}}/edit"> <button type="button" class="btn btn-warning btn-block">update Day</button> </a> </td>

                <td> <a href="/dates/"> <button type="button" class="btn btn-warning btn-block">All Dates</button> </a> </td>

                <td> <a href="/words/create/{{$date->id}}"> <button type="button" class="btn btn-info btn-block">Add Word</button> </a> </td>

                <td> <a href="/dates/{{$date->id}}"> <button type="button" class="btn btn-info btn-block ripple-effect">Show Words</button> </a> </td>

            </tr>
        @endforeach

        </tbody>
    </table>

@stop