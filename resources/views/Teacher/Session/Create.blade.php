@extends('Teacher.MainTeacher')
       
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
                    <form action="{{url('/store_Session')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    
                    <div class="form-group">
                        <label for="title" >title</label>
                        <input class="form-control" name="title">
                    </div>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->get('title') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title" >Description</label>
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

                         <input type="hidden" id="course_id" name="course_id" value="{{$id}}">

                         <!-- atttaches ----->
                         <div class="form-group">
                            <label for="title" >Authors</label>
                            <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">Delete</th>
                                    <th scope="col">Attach</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td>
                                            <button type='button' class='btn btn-outline-danger navigateTest'id='correspoinding' onclick='removeRow(this)' name='correspoinding1'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x' viewBox='0 0 16 16'>
                                                    <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'>
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                        
                                        <td><input type="file" name="cover[]" id="cover" class="btn btn-primary "></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            </div>

                        </div>
                        <button type="button" onclick="myFunction()" class="btn btn-primary">Add Attach</button>


                        <br><br>


                        <button class="btn btn-primary float-right">Create Session</button>
                    </form>
                    <form action="{{url('/Select_Course')}}" method="post" >
                    @csrf
                        <input type="hidden" id="CoursesOption" name="CoursesOption" value="{{$id}}">
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

 
            
            