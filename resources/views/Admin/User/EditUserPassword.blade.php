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
			    		<h3 class="panel-title">Please Create new Password </h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="{{route('user.update_password' , $user->id)}}" method="post" >
						@csrf
			    		@method('put')	

			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
			    					</div>
			    				</div>

								@if ($errors->has('password'))
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->get('password') as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif

			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			    						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
			    					</div>
			    				</div>

								@if ($errors->has('password_confirmation'))
									<div class="alert alert-danger">
										<ul>
											@foreach ($errors->get('password_confirmation') as $error)
												<li>{{ $error }}</li>
											@endforeach
										</ul>
									</div>
								@endif
			    			</div>
								
			    			<input type="submit" value="Reset Password" class="btn btn-info btn-block">
			    		</form>
			    	</div>
	    		
    		</div>
    	</div>
    </div>
</div>
</div>
@endsection  