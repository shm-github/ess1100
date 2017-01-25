@extends('layouts.dashboard')
@section('page_heading','Updates')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Version</th>
            <th>Published</th>
            <th>Update</th>

        </tr>
        </thead>
        <tbody>


        @foreach($updates as $update)

            <tr>
                <td><strong><a href="/updates/{{$update->id}}/edit">{{$update->version}}</a></strong></td>
                <a href="/updates/edit"></a>
                @if($update->is_published)
                    <td>  <a href="/updates/{{$update->id}}/edit">True</a></td>
                @else
                    <td><a href="/updates/{{$update->id}}/edit"> False</a></td>
                @endif

                <td> <a href="/updates/{{$update->id}}/edit"> <button type="button" class="btn btn-warning btn-block">update</button> </a> </td>
            </tr>

        @endforeach

        </tbody>
    </table>

@stop