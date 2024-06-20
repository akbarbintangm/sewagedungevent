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
	<link href="{{ asset('/css/slick.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/slick-theme.css') }}" rel="stylesheet" />
	<style>
		/* .scrollable-images {
					width: 100%;
					overflow-x: auto;
					white-space: warp;
				} */
		.scrollable-images img {
			width: 200px;
			height: auto;
			display: inline-block;
			margin-right: 0px;
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
						<div class="m-4">
							<div class="scrollable-images m-4">
								<img alt="{{ $data->picture_1 }}" id="{{ $data->picture_1 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_1) }}">
								@if ($data->picture_2)
									<img alt="{{ $data->picture_2 }}" id="{{ $data->picture_2 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_2) }}">
								@endif
								@if ($data->picture_3)
									<img alt="{{ $data->picture_3 }}" id="{{ $data->picture_3 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_3) }}">
								@endif
								@if ($data->picture_4)
									<img alt="{{ $data->picture_4 }}" id="{{ $data->picture_4 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_4) }}">
								@endif
								@if ($data->picture_5)
									<img alt="{{ $data->picture_5 }}" id="{{ $data->picture_5 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_5) }}">
								@endif
								@if ($data->picture_6)
									<img alt="{{ $data->picture_6 }}" id="{{ $data->picture_6 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_6) }}">
								@endif
								@if ($data->picture_7)
									<img alt="{{ $data->picture_7 }}" id="{{ $data->picture_7 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_7) }}">
								@endif
								@if ($data->picture_8)
									<img alt="{{ $data->picture_8 }}" id="{{ $data->picture_8 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_8) }}">
								@endif
								@if ($data->picture_9)
									<img alt="{{ $data->picture_9 }}" id="{{ $data->picture_9 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_9) }}">
								@endif
								@if ($data->picture_10)
									<img alt="{{ $data->picture_10 }}" id="{{ $data->picture_10 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_10) }}">
								@endif
							</div>
						</div>
						<div class="table-responsive container mt-3">
							<form action="{{ route('updateBuilding:admin-entry', ['id' => $data->id]) }}" enctype="multipart/form-data" id="forms" method="POST">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="roomName">Nama Ruangan <span class="text-danger">*</span></label>
											<input class="form-control" id="roomName" name="room_name" placeholder="Ruangan A" required type="text" value="{{ $data->name }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="ownerName">Nama Pemilik <span class="text-danger">*</span></label>
											<input class="form-control" disabled id="ownerName" placeholder="Johnson" required type="name" value="{{ $data->owner_name }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="emailOwner">Email <span class="text-danger">*</span></label>
											<input class="form-control" disabled id="emailOwner" placeholder="johnson@gmail.com" required type="email" value="{{ $data->owner_email }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="addressRoom">Alamat Ruangan <span class="text-danger">*</span></label>
											<input class="form-control" id="addressRoom" name="room_address" placeholder="Jl. Jalan" required type="address" value="{{ $data->address }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="priceRoom">Harga <span class="text-danger">*</span></label>
											<input class="form-control" id="priceRoom" name="room_price" placeholder="10000" required type="number" value="{{ $data->price }}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="facilitiesRoom">Daftar Fasilitas <span class="text-danger">*</span></label>
											<input class="form-control form-tags" data-role="tagsinput" id="facilitiesRoom" name="room_facilities" placeholder="Alat Musik, Parkiran Luas" required type="text" value="{{ $data->facilities }}">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="imageRoom">Upload Gambar <span class="text-danger">*</span></label>
											<input accept="image/jpeg, image/png" class="form-control" data-size="5120" id="imageRoom" multiple name="room_image[]" onchange="validateUpload(this)" required type="file">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="descriptionRoom">Deskripsi Ruangan <span class="text-danger">*</span></label>
											<textarea class="form-control" id="descriptionRoom" name="room_description" required rows="8">{{ $data->description }}</textarea>
										</div>
									</div>
									<div class="row">
										<div class="col text-end">
											<button class="btn btn-primary" type="submit">Update</button>
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
	<script type="text/javascript" src="{{ asset('/js/slick.js') }}"></script>
	<script type="text/javascript">
		$('.scrollable-images').slick({
			infinite: true,
			slidesToShow: 3,
			slidesToScroll: 1
		});

		document.getElementById('forms').addEventListener('submit', function(e) {
			e.preventDefault();
			submitNotification(this, 'Apakah Anda yakin?', 'Data dapat diubah dilain waktu.', 'info');
		});

		function validateUpload(input) {
			checkFileCount(input);
			checkFileFormat(input);
			checkAspectRatio(input);
			checkMinResolution(input);
		}
	</script>
@endsection
