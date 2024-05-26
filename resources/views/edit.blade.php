@extends('index')
@section('title', 'Edit task')
@section('maincontent')
<h3 class="text-center">Edit Tasks </h3><hr>
    @if(Session::has('success'))
    <p class="alert alert-success">{{Session::get('success')}}</p>
    @endif
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{url('/update/task')}}" method="post">
                    @csrf
                    <input type="text" name="id" style="display: none;" value="{{$editID->id}}">
                    <label for="">Title </label>
                    <input type="text" name="title" class="form-control" value="{{$editID->title}}">
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>                
                    @enderror
                    <label for="">Description <small>(optional)</small> </label>
                    <input type="text" name="description" class="form-control mb-2" value="{{$editID->description}}">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="{{$editID->status}}">{{$editID->status}}</option>
                    
                    @if($editID->status == "complete")
                    <option value="incomplete">Incomplete</option>
                    @else
                    <option value="complete">Complete</option>
                    @endif
                    @error('status')
                    <div class="alert alert-danger">{{$message}}</div>                
                    @enderror
                
                </select>
                    <input type="submit" class="btn btn-primary mt-2" value="Update task">
                </form>
            </div>
        </div>
    </div>



    @endsection