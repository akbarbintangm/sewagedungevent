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
							<div class="text-muted mb-3 text-center"><small>Sign in with</small></div>
							<div class="btn-wrapper text-center">
								<a class="btn btn-neutral btn-icon" href="#">
									<span class="btn-inner--icon"><img src="../assets/img/icons/common/github.svg"></span>
									<span class="btn-inner--text">Github</span>
								</a>
								<a class="btn btn-neutral btn-icon" href="#">
									<span class="btn-inner--icon"><img src="../assets/img/icons/common/google.svg"></span>
									<span class="btn-inner--text">Google</span>
								</a>
							</div>
						</div>
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-muted mb-4 text-center">
								<small>Or sign in with credentials</small>
							</div>
							<form role="form">
								<div class="form-group mb-3">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-email-83"></i></span>
										</div>
										<input class="form-control" placeholder="Email" type="email">
									</div>
								</div>
								<div class="form-group focused">
									<div class="input-group input-group-alternative">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
										</div>
										<input class="form-control" placeholder="Password" type="password">
									</div>
								</div>
								<div class="custom-control custom-control-alternative custom-checkbox">
									<input class="custom-control-input" id=" customCheckLogin" type="checkbox">
									<label class="custom-control-label" for=" customCheckLogin"><span>Remember me</span></label>
								</div>
								<div class="text-center">
									<button class="btn btn-primary my-4" type="button">Sign in</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<a class="text-light" href="#"><small>Forgot password?</small></a>
						</div>
						<div class="col-6 text-right">
							<a class="text-light" href="{{ route('register') }}"><small>Create new account</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
@endsection
