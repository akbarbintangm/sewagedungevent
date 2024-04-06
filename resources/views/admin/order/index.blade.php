@extends('layouts.admin.app')

@section('title')
	Daftar Order
@endsection

@section('pageName')
	Transaksi
@endsection

@section('subPageName')
	Order
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-md">
				<div class="card mb-4">
					<div class="card-header pb-0">
						<h6>Daftar Sewa Masuk</h6>
					</div>
					<div class="card-body pb-3 pt-3">
						<div class="table-responsive p-0">
							<table class="align-items-center mb-0 table">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Penyewa</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Ruangan</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tanggal Sewa</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Durasi</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tanggal Selesai</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Total Bayar</th>
										<th class="text-secondary opacity-7"></th>
										<th class="text-secondary opacity-7"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold text mb-0 text-sm">Bimantoro Bayu</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Ruang Renungan 1</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">21/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">23/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Validasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold text mb-0 text-sm">Bimantoro Bayu</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Ruang Renungan 2</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">21/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">23/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Validasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold text mb-0 text-sm">Bimantoro Bayu</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Ruang Renungan 3</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">21/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">23/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Validasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold text mb-0 text-sm">Bimantoro Bayu</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Ruang Renungan 4</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">21/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">23/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Validasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold text mb-0 text-sm">Bimantoro Bayu</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Ruang Renungan 5</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">21/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">23/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Validasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold text mb-0 text-sm">Bimantoro Bayu</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Ruang Renungan 6</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">21/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">23/01/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold text mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Validasi</button>
										</td>
									</tr>
								</tbody>
							</table>
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
