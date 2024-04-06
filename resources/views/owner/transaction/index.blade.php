@extends('layouts.admin.app')

@section('title')
	Daftar Transaksi
@endsection

@section('pageName')
	Transaksi
@endsection

@section('subPageName')
	Transaksi
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
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Kode Pembayaran</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tanggal Pembayaran</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Durasi</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tota Bayar</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Status Pembayaran</th>
										<th class="text-secondary opacity-7"></th>
										<th class="text-secondary opacity-7"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold mb-0 text-sm">TRX0012</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">10/02/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Alejandro Bimbim</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-success">Lunas</span>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Konfirmasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold mb-0 text-sm">TRX0013</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">10/02/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Sergio Perez</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">3 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-warning">Diproses</span>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Konfirmasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold mb-0 text-sm">TRX0014</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">10/02/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Yuki Sunoda</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">2 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-warning">Diproses</span>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Konfirmasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold mb-0 text-sm">TRX0015</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">10/02/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Zhou Guanyou</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">1 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-success">Lunas</span>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Konfirmasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold mb-0 text-sm">TRX0016</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">10/02/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Valteri Bottas</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">2 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-warning">Diproses</span>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Konfirmasi</button>
										</td>
									</tr>
									<tr>
										<td class="text-center align-middle">
											<p class="text-dark font-weight-bold mb-0 text-sm">TRX0017</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">10/02/2024</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Lance Stroll</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">1 Hari</p>
										</td>
										<td class="text-center align-middle">
											<p class="font-weight-bold mb-0 text-sm">Rp. 20.000.000</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-success">Lunas</span>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button>
										</td>
										<td class="align-middle">
											<button class="btn btn-outline-success btn-sm mb-0" type="button">Konfirmasi</button>
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
