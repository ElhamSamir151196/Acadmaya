@extends('Teacher.MainTeacher')
       
@section('content')  



        @if(session()->has('warning'))
                <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                    <b>{{session('warning')}}</b>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

        @endif
 
            <div class="card mb-3 mt-2">
                <div class="card-body">
                    <form action="{{ route('Session.update', $Session->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="form-group">
                            <label for="title" >Uploaded By</label>
                            <p class="form-control" >{{$Session->user->id}} - {{$Session->user->name}}</p>
                        </div>
                        <div class="form-group">
                            <label for="title" >Title</label>
                            <input class="form-control" name="title" value="{{$Session->title}}">


                        </div>
                        
                        <div class="form-group">
                            <label for="title" >Description</label>
                            <textarea class="form-control" name="description">{{$Session->description}}</textarea>

                        </div>

                        <!------------Attaches --------------------------------------->

                        <div class="form-group">
                            <label for="title" >Attachs</label>
                            <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Attaches</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>       

                                @foreach($Session->session_ataches as $key=> $SessionAttach)
                                    <tr>
                                    <td>
                                            <button type='button' class='btn btn-outline-danger navigateTest'id='correspoinding' onclick='removeRow(this)' name='correspoinding1'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                                    <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'>
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                        <td> 
                                            <a href="{{ route('Session.download',  $SessionAttach->uuid) }}" class="btn btn-primary ">{{ $SessionAttach->cover }}</a>
                                            <input type="hidden" id="cover1" name="cover1[]" value="{{ $SessionAttach->uuid}}">

                                        </td>
                                        
                                       
                                    </tr>
                                @endforeach
                                </tbody>
                              
                            </table>
                                    </div>
                                    <button type="button" onclick="myFunction()" class="btn btn-primary">Add Attach</button>
                        </div>

                        
                        <!------------------------------------------------------------------------------------>

                        

                        
                        <button class="btn btn-primary float-right">Apply</button>
                    </form>
                    <form action="{{url('/Select_Course')}}" method="post" >
                    @csrf
                        <input type="hidden" id="CoursesOption" name="CoursesOption" value="{{$Session->course_id}}">
                        <button class="btn btn-primary  btnx"> Back </button>
                    </form>
                </div>
            </div>


            <script>
        function myFunction() {
            var table = document.getElementById("myTable");
            var tbodyRowCount = table.tBodies[0].rows.length; // 3
            var row = table.insertRow(tbodyRowCount+1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            //var cell3 = row.insertCell(2);

            //cell2.innerHTML = tbodyRowCount+1;
            cell1.innerHTML ="<button type='button' class='btn btn-outline-danger navigateTest'id='correspoinding' onclick='removeRow(this)' name='correspoinding"+(tbodyRowCount+1)+"'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'><path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'></path></svg></button>";
            cell2.innerHTML ="<input type='file' name='cover[]' id='cover' class='btn btn-primary '>";
            
            
        }

        // delete TABLE row function.
    let removeRow = (oButton) => {
        
        let empTab = document.getElementById('myTable');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); 
        // button -> td -> tr.
    }

       
    </script>


   

 @endsection    

 
            
            