@extends('layouts.app')

@section('content')
<div class="">
    <div class="max-w-2xl mx-auto bg-gray-200">

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <div>
                    <h2>Your Posts</h2>
                </div>

                @foreach ($posts as $post)
                    <a href='blog/{{$post->id}}'>
                        <div class="shadow-xl bg-gray-700 text-white p-6 rounded-lg">

                            <h3 class="m-2">{{ $post->title }}</h3>
                            <p class="m-2">{{ str_limit($post->content, $limit = 150, $end = '...') }}</p>
                            <p class="m-2">{{ date('d/m/Y', strtotime($post->created_at)) }}</p>

                            <div class="btn-container flex">
                                <a href="/edit/{{$post->id}}" class="m-2 btn bg-white">Edit</a>

                                <form class="m-2" action="{{url('delete')}}/{{$post->id}}" method="post">
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </a>

                    <br>
                @endforeach


                <br>

                <a href="/new-blog" class="btn btn-primary">
                    New Blog
                </a>
            </div>
    </div>
</div>
@endsection
