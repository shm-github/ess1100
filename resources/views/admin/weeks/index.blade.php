@extends('layouts.dashboard')
@section('page_heading','Weeks')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Week</th>
            <th>Published</th>
            <th>Add Date</th>
            <th>Show Dates</th>
        </tr>
        </thead>
        <tbody>


        @foreach($weeks as $week)

            <tr>
                <td><strong>{{$week->week_number}}</strong></td>

                @if($week->published($week))
                    <td> True</td>
                @else
                    <td> False</td>
                @endif


                <td> <a href="/dates/create/{{$week->id}}"> <button type="button" class="btn btn-warning btn-block">Add Date</button> </a> </td>

                <td> <a href="/dates/{{$week->id}}"> <button type="button" class="btn btn-info btn-block">Show Dates</button> </a> </td>


            </tr>
        @endforeach

        </tbody>
    </table>

@stop