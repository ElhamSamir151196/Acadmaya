@extends('Student.MainStudent')

@section('User_content')  
<!----------------------------------------------------------------->

@if(count($Courses)==0)
<h2>
    No courses Assigned yet
</h2>
@else
    
    <!----------------------------------------------------------------------->

            <div class="card mb-3 mt-2">
                <div class="card-body">
                    <form action="{{url('/Select_Course_Student')}}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="title" >Select Course </label>
                        <select class="form-control" name="CoursesOption">
                            @foreach($Courses as $Course)
                                <option value="{{ $Course->course->id }}" >{{ $Course->course->id }} - {{ $Course->course->name }} </option>
                            @endforeach
                        </select>

                    </div>
                        <button class="btn btn-primary float-right"> Go To Course</button>
                    </form>
                </div>
            </div>
     
            
@endif
@endsection