@extends('layouts.user.app')

@section('title')
	Profile
@endsection

@section('meta-link')
	{{-- <link href="{{ asset('/css/argon-dashboard.css?v=2.0.4') }}" id="pagestyle" rel="stylesheet" /> --}}
@endsection

@section('content')
	{{-- <div class="container-fluid">
        <div class="card card-profile-bottom mx-4 shadow-lg">
            <div class="card-body p-3">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img alt="profile_image" class="w-100 border-radius-lg shadow-sm" src="{{ asset('img/team-1.jpg') }}">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Sayo Kravits
                            </h5>
                            <p class="font-weight-bold mb-0 text-sm">
                                Public Relations
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-5 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">
                                <li class="nav-item">
                                    <a aria-selected="true" class="nav-link active d-flex align-items-center justify-content-center mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab">
                                        <i class="ni ni-app"></i>
                                        <span class="ms-2 pl-1">App</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a aria-selected="false" class="nav-link d-flex align-items-center justify-content-center mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab">
                                        <i class="ni ni-email-83"></i>
                                        <span class="ms-2 pl-2">Riwayat Transaksi</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a aria-selected="false" class="nav-link d-flex align-items-center justify-content-center mb-0 px-0 py-1" data-bs-toggle="tab" href="javascript:;" role="tab">
                                        <i class="ni ni-settings-gear-65"></i>
                                        <span class="ms-2 pl-1">Settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
	<div class="container-fluid py-5">
		<div class="row">
            <div class="col-md-4">
				<div class="card card-profile">
					<div class="row justify-content-center">
						<div class="col-lg-5 order-lg-2">
							<div class="mt-4">
								<a href="javascript:;">
									<img class="rounded-circle img-fluid border border-2 border-white" src="{{ asset('img/team-2.jpg') }}">
								</a>
							</div>
						</div>
					</div>
					<div class="card-header pt-lg-2 pb-lg-2 mt-3 border-0 text-center">
						<div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-primary btn-sm">
                                Ubah Profile
                            </button>
                            <button type="button" class="btn btn-info btn-sm">
                                Pilih Foto
                            </button>
                            <button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target=".bd-example-modal-lg">
                                Riwayat Transaksi
                            </button>
						</div>
					</div>
					<div class="card-body pt-0">
						<div class="mt-4 text-center">
							<h5>
								Mark Davis
							</h5>
						</div>
					</div>
				</div>
			</div>
            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Riwayat Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Kode Transaksi</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Nama Ruangan</th>
                                        <th scope="col">Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">TRX/20240521/4/DANIEL/20240510</th>
                                        <td>13 Mei 2024</td>
                                        <td>Hall A</td>
                                        <td>Rp 2.000.000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TRX/20240521/4/DANIEL/20240510</th>
                                        <td>13 Mei 2024</td>
                                        <td>Hall A</td>
                                        <td>Rp 2.000.000</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">TRX/20240521/4/DANIEL/20240510</th>
                                        <td>13 Mei 2024</td>
                                        <td>Hall A</td>
                                        <td>Rp 2.000.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<div class="align-items-center">
                            <p class="text-uppercase text-md" style="margin:0;"><b>Informasi Pengguna</b></p>
						</div>
					</div>
					<div class="card-body">
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="example-text-input">Username</label>
									<input class="form-control" type="text" value="lucky.jesse">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="example-text-input">Email</label>
									<input class="form-control" type="email" value="jesse@example.com">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="example-text-input">Nama Lengkap</label>
									<input class="form-control" type="text" value="Jesse">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="example-text-input">No Telp</label>
									<input class="form-control" type="text" value="082222222222">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="example-text-input">Alamat</label>
									<input class="form-control" type="text" value="Jl. Kenangan No.2">
								</div>
							</div>
                            <div class="col-md-6">
								<div class="form-group">
									<label class="form-control-label" for="example-text-input">Jenis Kelamin</label>
									<input class="form-control" type="text" value="Laki-laki">
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
