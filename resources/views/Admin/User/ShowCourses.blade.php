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
    
    <h2>Courses</h2>
    <hr>
    
    <div class="row">
        <div class="form-group col-md-12">
            
        
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name </th>
                    <th scope="col">Uploaded at </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Courses as $key => $Course)
                                
                    <tr>
                        <th scope="row">{{$Course->course->id}}</th>
                        <td>{{$Course->course->name}}</td>
                        <td>{{$Course->created_at}}</td>
                            
                        
                        <td>
                            <form action="{{url('/Course').'/'.$Course->id}}" method="POST">
                            @csrf
                            @method('delete')                    
                                <button class="btn btn-danger  btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                       
                    </tr>
                @endforeach        
            </tbody>
        </table>  
</div>  
        {{ $Courses->links() }}
        </div>
        <a href="{{route('user.show', $id)}}" class="btn btn-info  btn-sm  float-left">Back</a>

    </div>

    </div>
@endsection
