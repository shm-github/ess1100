@extends('layouts.dashboard')
@section('page_heading','Dates')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Day Number</th>
            <th>Week Number</th>
            <th>Add Word</th>
            <th>Show Words</th>

        </tr>
        </thead>
        <tbody>


        @foreach($dates as $date)

            <tr>
                <td><strong><a href="/dates/{{$date->id}}/edit">{{$date->day_number}}</a></strong></td>

                <td>  <a href="/dates/{{$date->id}}/edit">{{$date->week->week_number}}</a></td>

                <td> <a href="/words/create/{{$date->id}}"> <button type="button" class="btn btn-warning">ADD WORD</button> </a> </td>
                <td> <a href="/words/{{$date->id}}"> <button type="button" class="btn btn-warning">SHOW WORD</button> </a> </td>
            </tr>

        @endforeach

        </tbody>
    </table>

@stop