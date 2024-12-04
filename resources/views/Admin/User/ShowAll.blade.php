
@extends('Admin.MainAdmin')

@section('content')   


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
  <div class="card mb-3 mt-2">
    <div class="card-body">
      <h2>Users</h2>
      <hr>
      <div class="row">
        
      

          
         
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Category</th>
      <th scope="col" colspan="3" >Action</th>

    </tr>
  </thead>
  <tbody>
   
    
 

            @foreach($Users as $user)
                        
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->category}}</td>
                                <td>

                                <a href="{{route('user.show', $user->id)}}" class="btn btn-info  btn-sm  float-left">Show</a>

                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning  btn-sm mr-3 ml-3 float-left">update</a>

                                <form action="{{ url('/user_delete') . '/' . $user->id }}" method="POST" class="float-left">
                                    @csrf 
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete </button>
                                </form>
                                </td>
                            </tr>
                        

             @endforeach
            
                
    </tbody>
</table>    
  </div>
{{$Users->links()}}       
  </div>
  
</div>
</div>
@endsection  