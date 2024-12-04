@extends('Admin.MainAdmin')
@section('content')  


    
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
            <form action="{{url('/store_Course_student')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title" >Select Student : </label>
                    <select class="form-control" name="userOption">
                        @foreach($Students as $user)
                            <option value="{{ $user->id }}" > {{ $user->id }} - {{ $user->name }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title" >Select Course :  </label>
                        <select class="form-control" name="courseOption">
                            @foreach($Courses as $Course)
                                <option value="{{ $Course->id }}" >{{ $Course->id }} - {{ $Course->name }} </option>
                            @endforeach
                        </select>
                </div>
                    

                <button class="btn btn-primary float-right">Save</button>
            </form>
        </div>
    </div>



@endsection