@extends('layouts.app')

@section('content')
  <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(/assets/images/big/auth-bg.jpg) no-repeat center center;">
		<div class="auth-box">
      <div id="loginform">
        <div class="logo">
            <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
            <h5 class="font-medium mb-3">Sign In to Admin</h5>
						<!-- Form -->
            <div class="row">
              <div class="col-12">
							<form class="form-horizontal mt-3" id="loginform" method="POST" action="{{ route('login') }}">
								@csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                  </div>
                  <input type="text" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
									@error('email')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
									@enderror
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                  </div>
									<input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
									@error('password')
											<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
											</span>
									@enderror
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      	<label class="custom-control-label" for="remember">Remember me</label>
                        <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock mr-1"></i> Forgot pwd?</a>
                    </div>
                  </div>
                </div>
                <div class="form-group text-center">
                  <div class="col-xs-12 pb-3">
                  	<button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                  </div>
									@if (Route::has('password.request'))
											<a class="btn btn-link" href="{{ route('password.request') }}">
													{{ __('Forgot Your Password?') }}
											</a>
									@endif
                </div>
              	<div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 mt-2 text-center">
                    <div class="social">
                      <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                      <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                    </div>
                  </div>
                </div>
                <div class="form-group mb-0 mt-2">
                  <div class="col-sm-12 text-center">
                    Don't have an account? <a href="authentication-register1.html" class="text-info ml-1"><b>Sign Up</b></a>
                  </div>
              	</div>
            </form>
          </div>
        </div>
      </div>
    </div>
	</div>
</div>
@endsection
