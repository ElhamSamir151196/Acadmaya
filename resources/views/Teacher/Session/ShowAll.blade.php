@extends('Teacher.MainTeacher')
       
@section('content')  

    @if(session()->has('danger'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <b>{{session('danger')}}</b>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif

    <a href="{{route('Session.create', $id)}}" class="btn btn-primary  ">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        Create new session</a>

    @if(count($Sessions)==0)
    <h2>
        No Sessions Uploaded yet
    </h2>
    @else
    <div class="card mb-3 mt-2 card_padding">
    
    <h2>Sessions</h2>
    <hr>
    
    <div class="row">
        <div class="form-group col-md-12">
            
        
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title </th>
                    <th scope="col">Uploaded at </th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Sessions as $key => $Session)
                                
                    <tr>
                        <th scope="row">{{$Session->id}}</th>
                        <td>{{$Session->title}}</td>
                        <td>{{$Session->created_at}}</td>
                            
                        <td>  
                            <a href="{{route('Session.show', $Session->id)}}" class="btn btn-info  btn-sm">Show</a>
                        </td>
                        <td>
                            <a href="{{ route('Session.edit', $Session->id) }}" class="btn btn-warning btn-sm float-right">Update</a>

                        </td>
                        <td>
                            <form action="{{url('/Session').'/'.$Session->id}}" method="POST">
                            @csrf
                            @method('delete')                    
                                <button class="btn btn-danger float-right btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach        
            </tbody>
        </table>  
</div>  
        {{ $Sessions->links() }}
        </div>
    </div>
    </div>
    @endif
@endsection
