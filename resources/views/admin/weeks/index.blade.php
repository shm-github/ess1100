@extends('layouts.dashboard')
@section('page_heading','Weeks')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Week</th>
            <th>Days Count</th>
            <th>Reviews Count</th>
            <th>Published</th>
            <th>update</th>
            <th>Add Date</th>
            <th>Add Review</th>
            <th>Show Reviews</th>
            <th>Show Dates</th>
        </tr>
        </thead>
        <tbody>


        @foreach($weeks as $week)

            <tr>
                <td><strong>{{$week->week_number}}</strong></td>

                <td>{{count($week->dates)}}</td>

                <td>{{count($week->reviews->all())}}</td>

                @if($week->published($week))
                    <td> True</td>
                @else
                    <td> False</td>
                @endif

                <td> <a href="/weeks/{{$week->id}}/edit"> <button type="button" class="btn btn-warning btn-block">update</button> </a> </td>

                <td> <a href="/dates/create/{{$week->id}}"> <button type="button" class="btn btn-info btn-block">Add Date</button> </a> </td>

                <td> <a href="/words/create/review/{{$week->id}}"> <button type="button" class="btn btn-success btn-block">Add Review</button> </a> </td>

                <td> <a href="/weeks/reviews/{{$week->id}}"> <button type="button" class="btn btn-success btn-block">Show Reviews</button> </a> </td>

                <td> <a href="/weeks/{{$week->id}}"> <button type="button" class="btn btn-success btn-block">Show Dates</button> </a> </td>


            </tr>
        @endforeach

        </tbody>
    </table>

@stop