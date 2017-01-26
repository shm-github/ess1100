@extends('layouts.dashboard')
@section('page_heading','Dates')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Day Number</th>
            <th>Week Number</th>
            <th>Word Count</th>
            <th>Update Day</th>
            <th>Word</th>
            <th>Report</th>
            <th>Main Context</th>
            <th>Idiom</th>
            <th>Words</th>

        </tr>
        </thead>
        <tbody>


        @foreach($dates as $date)

            <tr>
                <td><strong><a href="/dates/{{$date->id}}/edit">{{$date->day_number}}</a></strong></td>

                <td>  <a href="/dates/{{$date->id}}/edit">{{$date->week->week_number}}</a></td>

                <td>  <a href="/dates/{{$date->id}}/edit">{{count($date->words)}}</a></td>

                <td> <a href="/dates/{{$date->id}}/edit"> <button type="button" class="btn btn-warning btn-block">Update Day</button> </a> </td>

                <td> <a href="/words/create/{{$date->id}}"> <button type="button" class="btn btn-info btn-block">ADD Word</button> </a> </td>

                <td> <a href="/dates/{{$date->id}}"> <button type="button" class="btn btn-info btn-block">Complete Day Report</button> </a> </td>

                <td> <a href="/words/create/context/{{$date->id}}"> <button type="button" class="btn btn-info btn-block">ADD Main Context</button> </a> </td>

                <td> <a href="/words/create/idiom/{{$date->id}}"> <button type="button" class="btn btn-info btn-block">ADD Idiom</button> </a> </td>

                <td> <a href="/dates/words/{{$date->id}}"> <button type="button" class="btn btn-success btn-block">SHOW Words</button> </a> </td>
            </tr>

        @endforeach

        </tbody>
    </table>

@stop