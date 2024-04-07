@extends('layouts.user.app')

@section('title')
	Cari Ruangan
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid mb-9">
		<div class="input-group pb-4 pt-4" style="width: 40%; left: 60%;">
			<input class="form-control" placeholder="Cari Ruangan" type="text">
			<div class="input-group-append">
				<button class="btn btn-primary" type="button">Cari</button>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="card">
					<div class="card-header">
						Filter
					</div>
					<div class="card-body">
						<h6 class="card-title">Kategori</h6>
						<ul class="list-group">
							<li class="list-group-item"><a href="#">Kategori 1</a></li>
							<li class="list-group-item"><a href="#">Kategori 2</a></li>
							<li class="list-group-item"><a href="#">Kategori 3</a></li>
						</ul>
						<h6 class="card-title mt-3">Kategori</h6>
						<ul class="list-group">
							<li class="list-group-item"><a href="#">Kategori 1</a></li>
							<li class="list-group-item"><a href="#">Kategori 2</a></li>
							<li class="list-group-item"><a href="#">Kategori 3</a></li>
						</ul>
					</div>
					<div class="card-body">
						<h5 class="card-title">Harga</h5>
						<input class="custom-range" max="100" min="0" type="range" value="50">
					</div>
				</div>
			</div>
			<div class="col-9">
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
	</div>
@endsection

@section('script')
@endsection
