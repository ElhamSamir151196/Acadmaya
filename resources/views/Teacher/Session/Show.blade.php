@extends('Teacher.MainTeacher')
       
@section('content')  

<style>
    .btnStyle{
        display:inline-block;
    }

    .btnx{
        padding: 15px 70px;
        margin: 0px 50px;
       
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
                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="title" >Uploaded By</label>
                            <p class="form-control" >{{$target_Session->user->id}} - {{$target_Session->user->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="title" >Title</label>
                            <p class="form-control" >{{$target_Session->title}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="title" >Description</label>
                            <p class="border p-3" >{{$target_Session->description}}</p>
                        </div>

                        

                        <div class="form-group">
                            <label for="title" >Course </label>
                            <p class="form-control" >{{$target_Session->course->id}} -{{$target_Session->course->name}} </p>
                        </div>

                        
                        <!------------Attaches --------------------------------------->

                        <div class="form-group">
                            <label for="title" >Attachs</label>
                            <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Attaches</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>       

                                @foreach($target_Session->session_ataches as $key=> $SessionAttach)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td><a href="{{ route('Session.download',  $SessionAttach->uuid) }}">{{ $SessionAttach->cover }}</a></td>
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                              
                            </table>
                                    </div>
                        </div>


                       <!-------------------------Actions ---------------------------->
                      
                            
                            
                            @if($target_Session->user->id == auth()->user()->id)
                            <a href="{{ route('Session.edit', $target_Session->id) }}" class="btnx btn btn-warning btn-sm float-right">Update</a>

                        
                            <form action="{{url('/Session').'/'.$target_Session->id}}" method="POST">
                            @csrf
                            @method('delete')                    
                                <button class="btn btn-danger float-right btn-sm btnx" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        
                            @endif


                    </form>

                    <form action="{{url('/Select_Course')}}" method="post" >
                    @csrf
                        <input type="hidden" id="CoursesOption" name="CoursesOption" value="{{$target_Session->course_id}}">
                        <button class="btn btn-primary  btnx"> Back </button>
                    </form>
                        
                </div>
    </div>

    


 @endsection 