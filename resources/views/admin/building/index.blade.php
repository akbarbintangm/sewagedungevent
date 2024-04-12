@extends('layouts.admin.app')

@section('title')
	Daftar Ruangan
@endsection

@section('pageName')
	Ruangan
@endsection

@section('subPageName')
	List
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-12">
				<div class="card mb-4 pb-0">
					<div class="card-body mb-0 pt-4">
						<p class="mb-0">
							<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" data-bs-toggle="collapse" href="#ruanganterdaftar" role="button">
								Ruangan Terdaftar
							</a>
							<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" data-bs-toggle="collapse" href="#ruanganbelumterdaftar" role="button">
								Ruangan Belum Terdaftar
							</a>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<div class="collapse" id="ruanganterdaftar">
					<div class="card mb-4">
						<div class="card-header pb-0">
							<h6>Daftar Ruangan Terdaftar</h6>
						</div>
						<div class="card-body pb-3 pt-2">
							<div class="table-responsive p-0">
								<table class="align-items-center mb-0 table">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Ruangan</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Pemilik</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Alamat</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Range Harga</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Suparmen</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Suwito</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button> <!-- LINK ROUTE detail-ruangan.html-->
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Fabiano</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Eseteban</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Charles</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Verstapen</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<div class="collapse" id="ruanganbelumterdaftar">
					<div class="card mb-4">
						<div class="card-header pb-0">
							<h6>Daftar Ruang Yang Didaftarkan</h6>
						</div>
						<div class="card-body pb-3 pt-2">
							<div class="table-responsive p-0">
								<table class="align-items-center mb-0 table">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Ruangan</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Pemilik</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Alamat</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Range Harga</th>
											<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Status</th>
											<th class="text-secondary opacity-7"></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Bayu</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="badge badge-sm bg-gradient-danger">Butuh Verifikasi</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-success btn-sm mb-0" type="button">Verifikasi</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Bimo</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="badge badge-sm bg-gradient-danger">Butuh Verifikasi</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-success btn-sm mb-0" type="button">Verifikasi</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Andre</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="badge badge-sm bg-gradient-danger">Butuh Verifikasi</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-success btn-sm mb-0" type="button">Verifikasi</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Elena</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="badge badge-sm bg-gradient-danger">Butuh Verifikasi</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-success btn-sm mb-0" type="button">Verifikasi</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Leonor</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="badge badge-sm bg-gradient-danger">Butuh Verifikasi</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-success btn-sm mb-0" type="button">Verifikasi</button>
											</td>
										</tr>
										<tr>
											<td class="text-center align-middle">
												<p class="text-dark font-weight-bold text mb-0 text-sm">Ruang Renungan</p>
											</td>
											<td class="text-center align-middle">
												<p class="font-weight-bold mb-0 text-sm">Vrancis</p>
											</td>
											<td class="text-center align-middle text-sm">
												<p class="font-weight-bold mb-0 text-sm">Jl. Buntu No.89</p>
											</td>
											<td class="text-center align-middle">
												<span class="font-weight-bold text-sm">Rp. 3.000.000</span>
											</td>
											<td class="text-center align-middle text-sm">
												<span class="badge badge-sm bg-gradient-danger">Butuh Verifikasi</span>
											</td>
											<td class="align-middle">
												<button class="btn btn-outline-success btn-sm mb-0" type="button">Verifikasi</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
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
