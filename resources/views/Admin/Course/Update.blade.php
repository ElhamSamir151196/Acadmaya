@extends('Admin.MainAdmin')
       
@section('content')  



        @if(session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('warning')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

        @endif
 
            <div class="card mb-3 mt-2">
                <div class="card-body">
                    <form action="{{ route('Course.update', $Course->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="form-group">
                            <label for="title" >Uploaded By</label>
                            <p class="form-control" >{{$Course->user->id}} - {{$Course->user->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="name" >Name</label>
                            <input class="form-control" name="name" value="{{$Course->name}}">


                        </div>
                        
                        <div class="form-group">
                            <label for="title" >Description</label>
                            <textarea class="form-control" name="description">{{$Course->description}}</textarea>

                        </div>


                      

                        <br><br>

                        

                        
                        <button class="btn btn-primary float-right">Submit Course</button>
                    </form>
                </div>
            </div>


   

 @endsection    

 
            
            