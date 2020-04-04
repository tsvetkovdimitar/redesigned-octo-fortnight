@extends('layouts.admin')





@section('content')


    <h1>Media</h1>

    @if($photos)

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created</th>
            </tr>
        </thead>
        <tbody>

        @foreach($photos as $photo)

            <tr>
                <td>{{$photo->id}}</td>
{{--                <td><img src="{{$photo->file}}" alt=""></td>--}}
                @if ($photo->file)
                    <td><img height="50" src="{!! asset($photo->file)!!}" alt=""></td>
                @else
                    <td><img height="50" src="{!! asset('images/placeholder.png')!!}" alt=""></td>
                @endif
                <td>{{$photo->created_at ? $photo->created_at : 'No Date'}}</td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @endif

@stop
