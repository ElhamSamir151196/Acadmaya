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
    <div class="card mb-3 mt-2 card_padding">
    
    <h2> Teachers in the course : </h2>
    <p> Number of Teachers <?php print(count($Teachers))?> </p>
    <hr>
    
    <div class="row">
        <div class="form-group col-md-12">
            
        
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Course </th>
                    <th scope="col">Teacher </th>
                    <th scope="col">Uploaded at </th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Teachers as $key => $Course)
                                
                    <tr>
                        <th scope="row">{{$Course->id}}</th>
                        <td>{{$Course->user->id }}- {{$Course->user->name }}</td>
                        <td>{{$Course->course->id }}- {{$Course->course->name }}</td>
                        <td>{{$Course->created_at}}</td>
                        <td>
                            <a href="{{ route('Course_Assigned_teacher.edit', $Course->id) }}" class="btn btn-warning btn-sm float-right">
                                @if($Course->still_teach)
                                    Disable
                                @else
                                    Enable
                                @endif
                            </a>

                        </td>
                    </tr>
                @endforeach        
            </tbody>
        </table>  
</div>  
        {{ $Teachers->links() }}
        </div>
        <a href="{{route('Course.show', $Course_id)}}" class=" btn btn-info btn-sm ">Back</a>

    </div>

    </div>
@endsection
