@extends('layouts.dashboard')
@section('page_heading','Week '.$week->week_number . ' Reviews')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Word</th>
            <th>Definition</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>


        @foreach($reviews as $review)

            <tr>
                <td><strong>{{$review->word}}</strong></td>

                <td> {{$review->definition}}</td>

                <td> <a href=""> <button type="button" class="btn btn-info btn-block">Update</button> </a> </td>

                <td> <a href=""> <button type="button" class="btn btn-info btn-block">Delete</button> </a> </td>

            </tr>
        @endforeach

        </tbody>
    </table>

@stop