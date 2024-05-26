<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@hassection('title')
        @yield('title')
        @else 
        Home 
        @endif
    </title>
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>
    <div class="container mt-3">
        <div class="row">
            
            <div class="col-3">
                <a href="{{url('/')}}" class="btn btn-primary bar">Home </a> <br>
                <a href="{{url('create')}}" class="btn btn-primary bar">Create New Tasks </a>
            </div>
            <div class="col-9">
                @hassection('maincontent')
                @yield('maincontent')
                @else 
                <h3 class="text-center">All Task Details</h3><hr>
                @if(Session::has('success'))
    <p class="alert alert-success">{{Session::get('success')}}</p>
    @endif
                <table class="table " border="1">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                   @foreach($alldata as $data)
                   <tr>
                    <td>{{$data->title}}</td>
                    <td>{{$data->description}}</td>
                    @if($data->status == "incomplete")
                    <td class="mb-2"> <a href="{{url('status/update/'.$data->id)}}" class="btn btn-info bar">{{$data->status}}</a> </td>
                    @else 
                    <td > <a href="{{url('status/update/'.$data->id)}}" class="btn btn-primary bar">{{$data->status}}</a> </td>
                    @endif
                    <td><a href="{{ url('edit/task/'.$data->id)}}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{url('delete/task/'.$data->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger">Delete</a></td>
                   </tr>
                   @endforeach
                </table>
                @endif 
             </div>
        </div>
    </div>
</body>

</html>