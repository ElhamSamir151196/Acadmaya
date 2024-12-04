@extends('Admin.MainAdmin')
       
@section('content')  

<style>
    .btnStyle{
        display:inline-block;
    }

    .btnx{
        padding: 15px ;
        margin: 0px 20px;
       
    }
</style>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('success')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

    @endif
 
            <div class="card mb-3 mt-2">
                <div class="card-header">  
                    <h4 class="text-primary"> Course ID ( {{$target_Course->id}})</h4>
                </div>
                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="title" >Uploaded By</label>
                            <p class="form-control" >{{$target_Course->user->id}} - {{$target_Course->user->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="name" >Name</label>
                            <p class="form-control" >{{$target_Course->name}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="title" >Description</label>
                            <p class="border p-3" >{{$target_Course->description}}</p>
                        </div>

                        
                       

                        <a href="{{ route('Course_student.Course_student_show', $target_Course->id) }}" class="btnx btn btn-info btn-sm float-right">Course Students</a>

                        <a href="{{ route('Course_teacher.Course_teacher_show', $target_Course->id) }}" class="btnx btn btn-info btn-sm float-right">Course Teachers</a>

                        <a href="{{ route('Course_session.Course_session_showAll', $target_Course->id) }}" class="btnx btn btn-info btn-sm float-right">Course Sessions</a>

                        <a href="{{ route('Course.edit', $target_Course->id) }}" class="btnx btn btn-warning btn-sm float-right">Update</a>

                        <form action="{{url('/Course').'/'.$target_Course->id}}" method="POST">
                            @csrf
                            @method('delete')                    
                                <button class="btn btn-danger float-right btn-sm btnx " onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                    </form>
                </div>
            </div>


 @endsection 