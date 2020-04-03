@extends('layouts.admin')





@section('content')


    <h1>Edit Post</h1>

    <div>

        <div class="col-sm-3">

            @if ($post->photo()->exists())
                <td><img src="{!! asset($post->photo->file)!!}" alt="" class="img-responsive img-rounded"></td>
            @else
                <td><img src="{!! asset('images/placeholder.png')!!}" alt="" class="img-responsive img-rounded"></td>
            @endif

        </div>

        <div class="col-sm-9">

            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Description') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            <div>
                {!! Form::open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy', $post->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
                </div>
            </div>

            {!! Form::close() !!}


        </div>

    </div>

    <div>

        @include('includes.form_error')

    </div>



@stop
