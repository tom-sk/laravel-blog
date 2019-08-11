<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('app/app.js') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="posts"> 
                <div class="max-w-2xl mx-auto bg-gray-200">

                    <div class="card-body">
                        @foreach($blogs as $post)

                                <div class="shadow-xl bg-gray-700 text-white p-6 rounded-lg">

                                    <a href='blog/{{$post->id}}' class="m-2">{{ $post->title }}</a  >
                                    <p class="m-2">{{ str_limit($post->content, $limit = 150, $end = '...') }}</p>
                                    <p class="m-2">{{ date('d/m/Y', strtotime($post->created_at)) }}</p>

                                    </div>


                            <br>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

        <div id="app"></div>
    </body>
</html>
