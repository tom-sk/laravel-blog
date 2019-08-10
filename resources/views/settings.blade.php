@extends('layouts.app')

@section('content')
    <div class="">
        <div class="max-w-2xl mx-auto bg-gray-200">

            <div class="card-body">
                User Details
                <hr>

                <form action="{{url('update-settings')}}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group" >
                        <label for="">Name:</label>
                        <input class="form-control" type="text" name="name" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="">Email </label>
                        <input class="form-control" type="text" name="email" value="{{$user->email}}">
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
