@extends('layouts.dashboard')
@section('page_heading','Users')
@section('section')

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Phone</th>
            <th>OS</th>
            <th>Active</th>
            <th>Active Time</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
            <tr>
                <td><strong>{{$user->name}}</strong></td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>

                @if($user->info)
                    <td>{{$user->info->deviceBrand->name}}</td>
                    <td>{{$user->info->osName->name . '-' . $user->info->osVersion->version }}</td>
                    <td>{{$user->info->is_activated}}</td>
                    <td>{{$user->info->activate_date}}</td>
                @endif


            </tr>

        @endforeach

        </tbody>
    </table>

@stop