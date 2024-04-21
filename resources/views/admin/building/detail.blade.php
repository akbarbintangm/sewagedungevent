@extends('layouts.admin.app')

@section('title')
	Detail Ruangan{{-- NAMA RUANGAN --}}
@endsection

@section('pageName')
	Ruangan
@endsection

@section('subPageName')
	Detail Ruangan {{-- ATAU NAMA RUANGAN --}}
@endsection

@section('meta-link')
	<style>
		.scrollable-images {
			width: 100%;
			overflow-x: auto;
			white-space: warp;
		}

		.scrollable-images img {
			width: 200px;
			/* Atur lebar gambar sesuai kebutuhan */
			height: auto;
			/* Sesuaikan tinggi gambar */
			display: inline-block;
			margin-right: 10px;
			/* Atur jarak antar gambar */
		}
	</style>
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-12">
				<div class="card mb-4">
					<div class="card-header pb-0">
						<h6>Detail Ruangan</h6>
					</div>
					<div class="card-body px-0 pb-2 pt-0">
						<div>
							{{-- <div class="scrollable-images">
								@foreach ($gambarServer as $gambar)
									<img alt="Gambar" src="{{ $gambar }}">
								@endforeach
							</div> --}}
							<div class="scrollable-images ml-5">
								<img alt="Gambar" src="{{ asset('img/Ruang1.jpg') }}">
								<img alt="Gambar" src="{{ asset('img/team-2.jpg') }}">
								<img alt="Gambar" src="{{ asset('img/Ruang1.jpg') }}">
								<img alt="Gambar" src="{{ asset('img/Ruang1.jpg') }}">
								<img alt="Gambar" src="{{ asset('img/team-2.jpg') }}">
								<img alt="Gambar" src="{{ asset('img/Ruang1.jpg') }}">
							</div>
						</div>
						<div class="table-responsive container mt-3">
							<form>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Nama Ruangan</label>
											<input class="form-control" id="example-text-input" placeholder="" type="text">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Nama Pemilik</label>
											<input class="form-control" id="example-text-input" placeholder="" type="text" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Email</label>
											<input class="form-control" id="example-text-input" placeholder="" type="email" value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Alamat</label>
											<input class="form-control" id="example-text-input" placeholder="" type="text" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Harga</label>
											<input class="form-control" id="example-text-input" placeholder="" type="text" value="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Daftar Fasilitas</label>
											<input class="form-control" id="example-text-input" placeholder="" type="text" value="">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="example-text-input">Deskripsi Ruangan</label>
											<textarea class="form-control" id="text-area" rows="8"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<a class="btn btn-primary mb-0" href="">Simpan</a>
										</div>
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('layouts.admin.footer')
	</div>
@endsection

@section('script')
@endsection
