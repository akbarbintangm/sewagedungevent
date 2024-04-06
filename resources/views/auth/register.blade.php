@extends('layouts.user.app')

@section('title')
	Register
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
								<small>Sign up with credentials</small>
							</div>
							<form role="form">
								<div class="form-group">
									<div class="input-group input-group-alternative mb-3">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="ni ni-hat-3"></i></span>
										</div>
										<input class="form-control" placeholder="Name" type="text">
									</div>
								</div>
								<div class="form-group">
									<div class="input-group input-group-alternative mb-3">
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
								<div class="text-muted font-italic"><small>password strength: <span class="text-success font-weight-700">strong</span></small></div>
								<div class="row my-4">
									<div class="col-12">
										<div class="custom-control custom-control-alternative custom-checkbox">
											<input class="custom-control-input" id="customCheckRegister" type="checkbox">
											<label class="custom-control-label" for="customCheckRegister"><span>I agree with the <a href="#">Privacy Policy</a></span></label>
										</div>
									</div>
								</div>
								<div class="text-center">
									<button class="btn btn-primary mt-4" type="button">Create account</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
@endsection
