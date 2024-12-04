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
<div class="container">
        <div class=" centered-form">
       
        	<div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Please Update User id ( {{$user->id}})</h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="{{route('user.update' , $user->id )}}" method="post" >
						@csrf
						@method('put')
			    			
			    				<div class="form-group">
                                    <textarea type="text" name="name" id="name" class="form-control input-sm"  >{{$user->name}} </textarea>

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
								<textarea type="email" name="email" id="email" class="form-control input-sm" >{{$user->email}} </textarea>

							</div>

							@if ($errors->has('email'))
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->get('email') as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

							<div class="form-group">
								<textarea type="text" name="phone" id="phone" class="form-control input-sm" >{{$user->phone}} </textarea>

							</div>

							@if ($errors->has('phone'))
								<div class="alert alert-danger">
									<ul>
										@foreach ($errors->get('phone') as $error)
											<li>{{ $error }}</li>
										@endforeach
									</ul>
								</div>
							@endif

			    			
			    			
							
			    										
			    			<input type="submit" value="Update" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		
    		</div>
    	</div>
    </div>
</div>
</div>
@endsection  