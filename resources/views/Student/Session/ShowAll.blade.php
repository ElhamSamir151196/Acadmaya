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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Sessions as $key => $Session)
                                
                    <tr>
                        <th scope="row">{{$Session->id}}</th>
                        <td>{{$Session->title}}</td>
                        <td>{{$Session->created_at}}</td>
                            
                        <td>  
                            <a href="{{route('Session.show_Student', $Session->id)}}" class="btn btn-info  btn-sm">Show</a>
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
