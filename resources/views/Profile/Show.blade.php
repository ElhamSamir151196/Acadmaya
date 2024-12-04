@extends('Student.MainStudent')

@section('User_content')  

<style>
    .btnStyle{
        display:inline-block;
    }

    .btnx{
        padding: 15px 70px;
        margin: 0px 50px;
       
    }
</style>
             
        @if(session()->has('danger'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('danger')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

        @endif

        @if(session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('warning')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
    
        @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('success')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

        @endif


    <div class="card mt-2 mb-2">
        <div class="card-header">  
            <h4 class="text-primary"> User ID ( {{$user->id}})</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    
                    <tr>  <th scope="row" colspan="2"> <legend>Personal Information </legend> </th></tr>

                    <tr>  <th scope="row">Full Name </th><td>   <p>{{$user->name}}</p> </td> </tr> 
                    <tr>  <th scope="row">E-mail</th><td>   <p>{{$user->email}}</p> </td> </tr>
                    <tr>  <th scope="row">Phone Number</th><td>   <p>{{$user->phone}}</p> </td> </tr>
                    <tr>  <th scope="row">Category</th><td>  <p>{{$user->category}}</p>  </td> </tr>
                                
                                
                </table> 
            </div>
        </div>
                            
    </div>
        <div class="card mt-2 mb-2">
            <div class="card-body">
            

                
                    <a href="{{route('user.edit_profile', $user->id)}}" class="btn btn-warning btn-sm float-right btnx">Edit</a>
                    <a href="{{route('user.edit_password_profile', $user->id)}}" class="btn btn-warning btn-sm float-right btnx">Reset Password</a>

                                
            </div>
        </div>
 
 @endsection   