@extends('layouts.app')

@section('content')
    <div class="single-blog">
        <div class="max-w-2xl mx-auto bg-gray-200">
            <div class="card-body">
                <h2>{{$blog->title}}</h2>

                <div class="content">
                    {{$blog->content}}
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="max-w-2xl mx-auto bg-gray-200">
        <div class="card-body">
            <div class="card-body">
                <h4>Comments</h4>

                @foreach ($blog->comments as $comment)
                    <div>{{ $comment->content}}</div>
                    <div>User: {{ $comment->user->name}}</div>
                    <hr>
                @endforeach

                <br>

                <form action="{{url('new-comment')}}/{{$blog->id}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
