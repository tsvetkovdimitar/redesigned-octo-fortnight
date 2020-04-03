@extends('layouts.admin')





@section('content')


    <h1>Posts</h1>


    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>

        @if($posts)

            @foreach($posts as $post)

            <tr>
                <td>{{$post->id}}</td>
                @if ($post->photo()->exists())
                    <td><img height="50" width="100" src="{!! asset($post->photo->file)!!}" alt=""></td>
                @else
                    <td><img height="50" width="100" src="{!! asset('images/emptyspeechbubble.jpg')!!}" alt=""></td>
                @endif
                <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                <td>{{$post->category ? $post->category->name : "No category"}}</td>
                <td>{{$post->title}}</td>
                <td>{{\Illuminate\Support\Str::limit($post->body, 300)}}</td>
                <td>{{$post->created_at->diffForHumans()}}</td>
                <td>{{$post->updated_at->diffForHumans()}}</td>
            </tr>

            @endforeach

            @endif

        </tbody>
    </table>

@stop
