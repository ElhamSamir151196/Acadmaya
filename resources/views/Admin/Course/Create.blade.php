@extends('Admin.MainAdmin')
       
@section('content')  
       
    @if(session()->has('success'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('success')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    

            <div class="card mb-3 mt-2">
                <div class="card-body">
                    <form action="{{url('/store_Course')}}" method="post" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group">
                            <label for="name" >Name</label>
                            <input class="form-control" name="name" id="name">
                        </div>
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('name') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="description" >Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        @if ($errors->has('description'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('description') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        

                        <button class="btn btn-primary float-right">Create Course</button>
                    </form>
                </div>
            </div>


    

 @endsection    

 
            
            