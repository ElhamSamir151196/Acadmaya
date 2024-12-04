@extends('Admin.MainAdmin')
       
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
                    <form   method="post" enctype="multipart/form-data">
                    @csrf
                        
                        <div class="form-group">
                            <label for="title" >Name</label>
                            <p class="form-control" >{{$target_Contact->name}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="title" >Email</label>
                            <p class="border p-3" >{{$target_Contact->email}}</p>
                        </div>

                        

                        <div class="form-group">
                            <label for="title" >Message </label>
                            <p class="form-control" >{{$target_Contact->message}}</p>
                        </div>


                       <!-------------------------Actions ---------------------------->
                      
                            
                            
                        <a href="{{url('/Show_All_ContactUs')}}" class="btn btn-primary  btnx">Back</a>


                    </form>

                   
                        
                </div>
    </div>

    


 @endsection 