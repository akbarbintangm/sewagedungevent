@extends('layouts.user.app')

@section('title')
	Cari Ruangan
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid mb-9 pl-9 pr-9">
		{{-- <div class="input-group pb-4 pt-4" style="width: 40%; left: 60%;">
			<input class="form-control" placeholder="Cari Ruangan" type="text">
			<div class="input-group-append">
				<button class="btn btn-primary" type="button">Cari</button>
			</div>
		</div> --}}
		<div class="row mt-5">
			{{-- <div class="col-md-3">
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
			</div> --}}
			<div class="col-12">
				<div class="row">
					<div class="col-md-8">
						<div class="gambar">
							<img alt="{{ $data->picture_1 }}" class="w-100" id="{{ $data->picture_1 }}" src="{{ asset('rooms/' . $data->owner_email . '/' . $data->name . '/' . $data->picture_1) }}">
						</div>
					</div>
					{{-- <div class="col-md-4">
                        <div class="detail-hotel">
                            <h2 id="namaHotel">Hotel Bintang Lima</h2>
                            <p><strong>Lokasi :</strong> <span id="lokasiHotel">Jl. Sudirman No. 123, Jakarta</span></p>
                            <p><strong>Rating :</strong> <span id="ratingHotel">9.0</span></p>
                            <p><strong>Harga per Malam :</strong> <span id="hargaHotel"><strong>Rp 1.000.000</strong></span></p>
                            <button class="btn btn-primary btn-block">Pesan Sekarang</button>
                        </div>
                    </div> --}}
				</div>
				<div class="row mt-5">
					<div class="col-md-8">
						<h3>Deskripsi</h3>
						<p class="text-justify" id="deskripsiHotel">
							{{ $data->description }}
						</p>
					</div>
					<div class="col-md-4 pl-5">
						<div class="detail-hotel">
							<h2 id="namaHotel">{{ $data->name }}</h2>
							<p><strong>Lokasi :</strong> <span id="lokasi"> {{ $data->address }} </span></p>
							<p><strong>Email :</strong> <span id="email"> {{ $data->owner_email }} </span></p>
							<p><strong>Rating :</strong> <span id="rating">??/10</span></p>
							<p><strong>Harga per Hari :</strong> <span id="harga"><strong>Rp {{ $data->price }}</strong></span></p>
							<button class="btn btn-primary btn-block" data-bs-target="#bookingModal" data-bs-toggle="modal" id="bookingButton" type="button">
								Sewa Sekarang
							</button>
							<button class="btn btn-primary btn-block disabled d-none" disabled id="bookedButton" type="button">
								Menunggu Konfirmasi
							</button>
							<button class="btn btn-primary btn-block disabled d-none" disabled id="bookButton" type="button">
								Telah Disewa
							</button>
						</div>
					</div>
				</div>
				<div class="row mt-5">
					<div class="col">
						<h3>Fasilitas</h3>
						<ul class="" id="fasilitiesRoom">
							@php
								$facility = explode(',', $data->facilities);
							@endphp
							@foreach ($facility as $item)
								<li>{{ $item }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div aria-hidden="true" aria-labelledby="bookingModalLabel" class="modal fade" id="bookingModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="bookingModalLabel">Form Penyewaan</h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" id="bookingData">
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="nameTenant">Nama Penyewa<span class="text-danger"> *</span></label>
									<input class="form-control" id="nameTenant" name="tenant_name" placeholder="Masukkan Nama" type="name" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="emailTenant">Email<span class="text-danger"> *</span></label>
									<input class="form-control" id="emailTenant" name="tenant_email" placeholder="Masukkan Email" type="email" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="phoneTenant">No Telp<span class="text-danger"> *</span></label>
									<input class="form-control" id="phoneTenant" name="tenant_phone" placeholder="Masukkan Telepon" type="number" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="passwordTenant">Password<span class="text-danger"> *</span></label>
									<input class="form-control" id="passwordTenant" name="tenant_password" placeholder="Masukkan Password" type="password" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="repasswordTenant">Masukkan Ulang Password<span class="text-danger"> *</span></label>
									<input class="form-control" id="repasswordTenant" name="tenant_repassword" placeholder="Ulangi Password" type="password" value="">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="bookingDate">Tanggal Booking<span class="text-danger"> *</span></label>
									<input class="form-control" id="bookingDate" name="booking_date" placeholder="6/6/2026" type="date" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="bookingInfoDate">Tanggal Yang Sudah Booking<span class="text-danger"> *</span></label>
									<ul class="" id="">
										{{-- @php
                                        $facility = explode(',', $data->facilities);
                                    @endphp
                                    @foreach ($facility as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach --}}
										<li class="text-danger">23 April 2023</li>
										{{-- disini di isi date yang sudah dibooking --}}
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
						<button class="btn btn-primary" type="submit">Bayar</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div aria-hidden="true" aria-labelledby="checkoutModalLabel" class="modal fade" id="checkoutModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="checkoutModalLabel">Checkout Booking</h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" id="checkoutData">
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="imageTransfer">Upload Bukti Transfer <span class="text-danger">*</span></label>
									<input accept="image/jpeg, image/png" class="form-control" data-size="5120" id="imageTransfer" name="transfer_image" onchange="validateUpload(this)" type="file">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
						<button class="btn btn-primary" type="submit">Kirim Bukti Pembayaran</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div aria-hidden="true" aria-labelledby="confirmationModalLabel" class="modal fade" id="confirmationModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Booking</h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data" id="confirmationData">
					<div class="modal-body">
						<div class="row text-center" id="awaitConfirmation">
							<div class="col text-center">
								<i class="fas fa-hourglass-half fa-5x text-warning mb-3"></i>
								<p class="font-weight-bold">Sedang menunggu konfirmasi dari admin. Harap tunggu.</p>
							</div>
						</div>
						<div class="row text-center" id="statusConfirmed">
							<div class="col text-center">
								<i class="fas fa-check-circle fa-5x text-success mb-3"></i>
								<p class="font-weight-bold">Booking Anda telah terverifikasi oleh admin.</p>
							</div>
						</div>
						<div class="row text-center" id="statusUnconfirmed">
							<div class="col text-center">
								<i class="fas fa-times-circle fa-5x text-danger mb-3"></i>
								<p class="font-weight-bold">Booking Anda tidak terverifikasi oleh admin.</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		var modalBooking = $('#bookingModal');
		var modalCheckout = $('#checkoutModal');
		var modalConfirmation = $('#confirmationModal');

		$('#awaitConfirmation').hide();
		$('#statusConfirmed').hide();
		$('#statusUnconfirmed').hide();

		$('#bookingButton').show();
		$('#bookedButton').hide();
		$('#bookButton').hide();

		document.getElementById('bookingData').addEventListener('submit', async function(e) {
			e.preventDefault();
			modalBooking.modal('hide');
			const result = await showNotification('Apakah Anda yakin?', 'Data Akun dapat diubah dilain waktu. Namun untuk booking ulang, data tanggal tidak dapat diganti.', 'info')
			if (!result.isConfirmed) {
				modalBooking.modal('show');
			} else {
				showLoadingNotification();
				try {
					const response = await $.ajax({
						url: '/',
						type: 'get',
					});
					if (response) {
						const successBooking = await alertNotification('Booking Berhasil!', 'Mohon kirim bukti pembayaran transfer!', 'success');
						if (successBooking.isConfirmed) {
							modalCheckout.modal('show');
						}
					}
					hideLoadingNotification();
				} catch (error) {
					hideLoadingNotification();
					const failedBooking = await alertNotification('Server Error!', 'Mohon ulangi pengisian data akun dan tanggal booking!', 'warning');
					if (failedBooking.isConfirmed) {
						modalBooking.modal('show');
					}
				}
			}
		});

		document.getElementById('checkoutData').addEventListener('submit', async function(e) {
			e.preventDefault();
			modalCheckout.modal('hide');
			const result = await showNotification('Apakah Anda yakin?', 'Bukti Transfer tidak dapat diunggah ulang. Anda dapat menggunggahnya ulang setelah status verifikasi dari Admin.', 'info')
			if (!result.isConfirmed) {
				modalCheckout.modal('show');
			} else {
				showLoadingNotification();
				try {
					const response = await $.ajax({
						url: '/',
						type: 'get',
					});
					if (response) {
						const successCheckout = await alertNotification('Unggah Bukti Transfer Berhasil!', 'Mohon tunggu konfirmasi pembayaran dari Admin.', 'success');
						if (successCheckout.isConfirmed) {
							modalConfirmation.modal('show');
							$('#awaitConfirmation').show();
							$('#bookingButton').hide();
							$('#bookedButton').show().removeClass('d-none');
						}
					}
					hideLoadingNotification();
				} catch (error) {
					hideLoadingNotification();
					const failedCheckout = await alertNotification('Server Error!', 'Mohon ulangi upload bukti transfer!', 'warning');
					if (failedCheckout.isConfirmed) {
						modalCheckout.modal('show');
					}
				}
			}
		});

		function validateUpload(input) {
			checkFileFormat(input);
			checkMinResolution(input, 640, 360);
		}
	</script>
@endsection
