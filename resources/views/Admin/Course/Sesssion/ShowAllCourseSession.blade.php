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
    <div class="card mb-3 mt-2 card_padding">
    
    <h2>Sessions in course  :</h2>
    <p> Number of Sessions <?php print(count($Sessions))?> </p>
    <hr>
    
    <div class="row">
        <div class="form-group col-md-12">
            
        
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title </th>
                    <th scope="col">Uploaded by </th>
                    <th scope="col">Uploaded at </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Sessions as $key => $session)
                                
                    <tr>
                        <th scope="row">{{$session->id}}</th>
                        <td>{{$session->title }}</td>
                        <td>{{$session->user->id }}- {{$session->user->name }}</td>
                        <td>{{$session->created_at}}</td>
                        <td>
                        <a href="{{route('Course_Session.show', $session->id)}}" class="btn btn-info  btn-sm ml-3">Show</a>

                        <form action="{{ url('/Session_Admin') . '/' . $session->id }}" method="POST" class="float-left">
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
        {{ $Sessions->links() }}
        </div>
        <a href="{{route('Course.show', $Course_id)}}" class=" btn btn-info btn-sm ">Back</a>
    </div>
    
    </div>
@endsection
