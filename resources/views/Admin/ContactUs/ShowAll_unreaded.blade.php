
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
        
    <a href="{{url('Show_All_ContactUs')}}" class="btn btn-info  btn-sm  float-right mr-3">Show All Contact Message</a>
    @if(count($ContactUs)==0)
    <h2>
    Contact Messages send  yet
    </h2>
    @else
      <h2>Contact Messages unreaded</h2>
      <hr>
      <div class="row">
        
      

          
         
<div class="table-responsive">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Full Name</th>
      <th scope="col">E-mail</th>
      <th scope="col">Message</th>
      <th scope="col" colspan="2" >Action</th>

    </tr>
  </thead>
  <tbody>
   
    
 

            @foreach($ContactUs as $ContactDetail)
                        
                            <tr>
                                <th scope="row">{{$ContactDetail->id}}</th>
                                <td>{{$ContactDetail->name}}</td>
                                <td>{{$ContactDetail->email}}</td>
                                <td>{{$ContactDetail->message}}</td>
                                <td>

                                <a href="{{route('Contact.show', $ContactDetail->id)}}" class="btn btn-info  btn-sm  float-left mr-3">Show</a>

                                <form action="{{ url('/Contact') . '/' . $ContactDetail->id }}" method="POST" class="float-left">
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
  </div>
  @endif
</div>
</div>
@endsection  