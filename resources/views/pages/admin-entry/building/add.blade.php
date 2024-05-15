@extends('layouts.admin.app')

@section('title')
	Tambah Ruangan
@endsection

@section('pageName')
	Ruangan
@endsection

@section('subPageName')
	Tambah Ruangan
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-12">
				<div class="card mb-4">
					<div class="card-header pb-0">
						<h6>Daftarkan Ruangan</h6>
					</div>
					<div class="card-body px-0 pb-2 pt-0">
						<div class="table-responsive container mt-3">
							<form action="{{ route('addBuilding:admin-entry') }}" enctype="multipart/form-data" id="forms" method="POST">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="roomName">Nama Ruangan <span class="text-danger">*</span></label>
											<input class="form-control" id="roomName" name="room_name" placeholder="Ruangan A" required type="text">
										</div>
									</div>
									@if (Auth::user()->type_user === 'PEMILIK_GEDUNG')
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-control-label" for="ownerName">Nama Pemilik <span class="text-danger">*</span></label>
												<input class="form-control" disabled id="ownerName" name="owner_name" placeholder="Johnson" required type="name" value="{{ Auth::user()->name }}">
											</div>
										</div>
									@else
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-control-label" for="ownerName">Nama Pemilik <span class="text-danger">*</span></label>
												<input class="form-control" id="ownerName" name="owner_name" placeholder="Johnson" required type="name">
											</div>
										</div>
									@endif
								</div>
								<div class="row">
									@if (Auth::user()->type_user === 'PEMILIK_GEDUNG')
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-control-label" for="emailOwner">Email <span class="text-danger">*</span></label>
												<input class="form-control" disabled id="emailOwner" name="owner_email" placeholder="johnson@gmail.com" required type="email" value="{{ Auth::user()->email }}">
											</div>
										</div>
									@else
										<div class="col-md-6">
											<div class="form-group">
												<label class="form-control-label" for="emailOwner">Email <span class="text-danger">*</span></label>
												<input class="form-control" id="emailOwner" name="owner_email" placeholder="johnson@gmail.com" required type="email">
											</div>
										</div>
									@endif
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="addressRoom">Alamat Ruangan <span class="text-danger">*</span></label>
											<input class="form-control" id="addressRoom" name="room_address" placeholder="Jl. Jalan" required type="address">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="priceRoom">Harga <span class="text-danger">*</span></label>
											<input class="form-control" id="priceRoom" name="room_price" placeholder="10000" required type="number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="form-control-label" for="facilitiesRoom">Daftar Fasilitas <span class="text-danger">*</span></label>
											<input class="form-control form-tags" data-role="tagsinput" id="facilitiesRoom" name="room_facilities" placeholder="Alat Musik, Parkiran Luas" required type="text">
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
											<textarea class="form-control" id="descriptionRoom" name="room_description" required rows="8"></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col text-end">
											<button class="btn btn-primary" type="submit">Simpan</button>
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
	<script>
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			var token = '{{ Session::token() }}';
			var form_tags = $('.form-tags').tagsinput({
				trimValue: true
			})
		});

		document.getElementById('forms').addEventListener('submit', function(e) {
			e.preventDefault();
			submitNotification(this, 'Apakah Anda yakin?', 'Data dapat diubah dilain waktu.', 'info');
		});

		function validateUpload(input) {
			checkFileCount(input);
			checkFileFormat(input);
			checkAspectRatio(input);
			checkMinResolution(input, 1280, 720);
		}
	</script>
@endsection
