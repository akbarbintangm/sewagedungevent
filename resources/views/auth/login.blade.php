@extends('layouts.user.app')

@section('title')
	Login
@endsection

@section('meta-link')
@endsection

@section('content')
	<section class="section section-shaped section-lg">
		<div class="shape shape-style-1 bg-gradient-default">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="pt-lg-7 container">
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<div class="card bg-secondary border-0 shadow">
						<div class="card-header bg-white pb-5">
						</div>
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-muted mb-4 text-center">
								<small>Sign in with credentials</small>
							</div>
							<form action="{{ route('auth-login') }}" enctype="multipart/form-data" method="POST" role="form">
								@csrf
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-email-83"></i></span>
										</div>
										<input class="form-control" name="email" placeholder="Email" type="email">
									</div>
								</div>
								<div class="form-group focused">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" name="password" placeholder="Password" type="password">
									</div>
								</div>
								<div class="custom-control custom-control-alternative custom-checkbox">
									<input class="custom-control-input" id=" customCheckLogin" name="remember" type="checkbox">
									<label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
								</div>
								<div class="text-center">
									<button class="btn btn-primary my-4" type="submit">Sign in</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<a class="text-light" href="#"><small>Forgot password?</small></a>
						</div>
						<div class="col-6 text-right">
							<a class="text-light" href="{{ route('auth-register') }}"><small>Create new account</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
@endsection
