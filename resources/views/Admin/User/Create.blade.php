@extends('Admin.MainAdmin')

@section('content')  

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">


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
			    	<h3 class="panel-title">Please Create new User </h3>
			 			
			 		<div class="panel-body">
			    		<form action="{{url('/store_user')}}" method="post" >
						@csrf
			    			
			    				
						<div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

						<div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

			    			

						<div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

								
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        

						<div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('User Category') }}</label>

                            <div class="col-md-6">

							<div class="form-check">
							  <input class="form-check-input" type="radio" name="Category" id="flexRadioDefault1" value="flexRadioDefault1">
							  <label class="form-check-label" for="flexRadioDefault1">
							    Admin
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="Category" id="flexRadioDefault2" value="flexRadioDefault2" >
							  <label class="form-check-label" for="flexRadioDefault2">
							    Teacher
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="Category" id="flexRadioDefault3" value="flexRadioDefault3" checked>
							  <label class="form-check-label" for="flexRadioDefault3">
							    Student
							  </label>
							</div>
                                
                            </div>
                        </div>
			    			
						
							
			    										
			    			<input type="submit" value="Create" class="btn btn-info btn-block">
			    		</form>
					</div>
			    </div>
	    		
    		</div>
    	</div>
    </div>
</div>
</div>
@endsection  