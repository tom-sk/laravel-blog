@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Blog</div>

                    <div class="card-body">
                        <form action="{{url('edit')}}/{{$blog->id}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input class="form-control" name="title" type="text" value="{{$blog->title}}">
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <textarea type="text" class="form-control" name="content" >{{$blog->content}}</textarea>
                            </div>

                            <input type="hidden" name="id" value="{{$blog->id}}">

                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
