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
								@if (Auth::check())
									<a class="btn btn-warning btn-icon mb-sm-0 mt-3" href="{{ route('buildingPage:user') }}">
									@else
										<a class="btn btn-warning btn-icon mb-sm-0 mt-3" href="{{ route('buildingWithoutLoginPage:user') }}">
								@endif
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
				@foreach ($data as $key => $item)
					<div class="col-md-3 mb-3">
						<div class="card">
							<img alt="{{ $item->picture_1 }}" id="{{ $item->picture_1 }}" src="{{ asset('rooms/' . $item->owner_email . '/' . $item->name . '/' . $item->picture_1) }}">
							<div class="card-body">
								<h5 class="card-title text-center">{{ $item->name }}</h5>
								<p class="card-text">{{ Str::limit($item->description, 45, '...') }}</p>
								<p class="card-text"><b>Harga: Rp. {{ $item->price }}</b></p>
								<div class="d-flex justify-content-center">
									@if (Auth::check())
										<a class="btn btn-primary" href="{{ route('buildingDetailPage:user', ['id' => $item->id]) }}">Booking</a>
									@else
										<a class="btn btn-primary" href="{{ route('buildingDetailWithoutLoginPage:user', ['id' => $item->id]) }}">Booking</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('script')
@endsection
