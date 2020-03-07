@extends('layouts.admin')



@section('content')


    <h1>Users</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @if($users)

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        @if ($user->photo()->exists())
                            <td><img height="50" src="{!! asset($user->photo->file)!!}" alt=""></td>
                        @else
                            <td>No photo</td>
                        @endif
                        <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach

            @endif

        </tbody>
    </table>


@stop
