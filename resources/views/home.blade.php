@extends('layouts.user.app')

@section('title')
	Beranda
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="section section-hero section-shaped">
		<div class="shape shape-style-3 shape-default">
		</div>
		<div class="page-header">
			<div class="shape-container d-flex align-items-center py-lg container">
				<div class="col px-0">
					<div class="row align-items-center justify-content-center">
						<div class="col-lg-6 text-center">
							<h1 class="display-1 text-white">People stories</h1>
							<h2 class="display-4 font-weight-normal text-white">The time is right now!</h2>
							<div class="btn-wrapper mt-4">
								<a class="btn btn-warning btn-icon mb-sm-0 mt-3" href="{{route('buildingWithoutLoginPage:user')}}">
									<span class="btn-inner--icon"><i class="ni ni-button-play"></i></span>
									<span class="btn-inner--text">Book Now</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section features-1">
		<div class="container-fluid pl-9 pr-9">
			<div class="row">
				<div class="col-md-3">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 pt-4">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 pt-4">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 pt-4">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 pt-4">
					<div class="card">
						<img alt="..." class="card-img-top" src="{{ asset('img/Ruang1.jpg') }}">
						<div class="card-body">
							<h5 class="card-title text-center">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-primary" href="#">Booking</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
@endsection
