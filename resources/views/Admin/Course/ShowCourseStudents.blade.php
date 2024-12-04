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
    
    <h2>Students in course  :</h2>
    <p> Number of Students <?php print(count($Students))?> </p>
    <hr>
    
    <div class="row">
        <div class="form-group col-md-12">
            
        
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student </th>
                    <th scope="col">Course </th>
                    <th scope="col">Uploaded at </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Students as $key => $Course)
                                
                    <tr>
                        <th scope="row">{{$Course->id}}</th>
                        <td>{{$Course->user->id }}- {{$Course->user->name }}</td>
                        <td>{{$Course->course->id }}- {{$Course->course->name }}</td>
                        <td>{{$Course->created_at}}</td>
                        <td>
                        <form action="{{ url('/student_course_delete') . '/' . $Course->id }}" method="POST" class="float-left">
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
        {{ $Students->links() }}
        </div>
        <a href="{{route('Course.show', $Course_id)}}" class=" btn btn-info btn-sm ">Back</a>

    </div>

    </div>
@endsection
