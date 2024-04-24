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
                            <img class="w-100" src="{{ asset('rooms/stefanus@gmail.com/Hall G/room_1.png') }}">
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
                        <p class="text-justify" id="deskripsiHotel">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ultrices quam eu orci pulvinar, et hendrerit turpis blandit. Aliquam non lacinia lacus, et vulputate metus. Sed vel mauris molestie, condimentum velit eu, feugiat quam. Nam nisi eros, laoreet ornare lectus in, eleifend commodo enim. Etiam aliquam a mauris sit amet congue. Sed mi mi, mollis et est ac, maximus viverra felis. Praesent venenatis vehicula justo non maximus. Mauris sit amet leo sit amet purus tincidunt imperdiet et vel nulla. Aliquam ullamcorper sem non consectetur condimentum. Sed lacinia, ligula at interdum consectetur, leo sapien mattis arcu, vel hendrerit nisi nibh ut ligula. In pretium feugiat tempus. Duis blandit tortor at ipsum placerat mollis.
                        </p>
                    </div>
                    <div class="col-md-4 pl-5">
                        <div class="detail-hotel">
                            <h2 id="namaHotel">Ballroom XYZ</h2>
                            <p><strong>Lokasi :</strong> <span id="lokasi">Jl. Sudirman No. 123, Jakarta</span></p>
                            <p><strong>Email :</strong> <span id="email">Asple@gmail.com</span></p>
                            <p><strong>Rating :</strong> <span id="rating">9.0</span></p>
                            <p><strong>Harga per Hari :</strong> <span id="harga"><strong>Rp 1.000.000</strong></span></p>
                            <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Sewa Sekarang
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Penyewaan</h5>
                                            <button type="button" class="btn-danger" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="form-control-label" for="addressRoom">Nama Penyewa<span class="text-danger">*</span></label>
                                                <input class="form-control" id="addressRoom" name="room_address" placeholder="Asple" required type="address" value="">
                                                <label class="form-control-label" for="addressRoom">Email<span class="text-danger">*</span></label>
                                                <input class="form-control" id="addressRoom" name="room_address" placeholder="Asple" required type="address" value="">
                                                <label class="form-control-label" for="addressRoom">No Telp<span class="text-danger">*</span></label>
                                                <input class="form-control" id="addressRoom" name="room_address" placeholder="Asple" required type="date" value="">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <h3>Fasilitas</h3>
                        <ul id="fasilitasHotel" class="">
                            <li>Fasilitas 1</li>
                            <li>Fasilitas 2</li>
                            <li>Fasilitas 3</li>
                            <li>Fasilitas 4</li>
                            <li>Fasilitas 5</li>
                            <li>Fasilitas 6</li>
                            <li>Fasilitas 7</li>
                        </ul>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('script')
@endsection
