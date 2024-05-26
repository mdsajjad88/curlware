@extends('index')
@section('title', 'create new task')
@section('maincontent')
<h3 class="text-center">Create New Tasks </h3><hr>
    @if(Session::has('success'))
    <p class="alert alert-success">{{Session::get('success')}}</p>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{url('/add/new/task')}}" method="post">
                    @csrf
                    <label for="">Title </label>
                    <input type="text" name="title" class="form-control">
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>                
                    @enderror
                    <label for="">Description <small>(optional)</small> </label>
                    <input type="text" name="description" class="form-control mb-2">




                    <input type="reset" class="btn btn-info" value="Reset">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </form>
            </div>
        </div>
    </div>



    @endsection