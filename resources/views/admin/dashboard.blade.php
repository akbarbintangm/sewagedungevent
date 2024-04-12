@extends('layouts.admin.app')

@section('title')
	Dashboard
@endsection

@section('pageName')
	Dashboard
@endsection

@section('subPageName')
	Dashboard
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-xl col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">User</p>
									<h5 class="font-weight-bolder">
										$53,000
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary rounded-circle text-center">
									<i aria-hidden="true" class="fa fa-users text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">Jumlah Ruangan</p>
									<h5 class="font-weight-bolder">
										2,300
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-danger shadow-danger rounded-circle text-center">
									<i aria-hidden="true" class="fa fa-box text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">Jumlah Fasilitas</p>
									<h5 class="font-weight-bolder">
										+3,462
									</h5>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-success shadow-success rounded-circle text-center">
									<i aria-hidden="true" class="fa fa-broom text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- <div class="row mt-4">
			<div class="col mb-lg-0 mb-4">
				<div class="card">
					<div class="card-header p-3 pb-0">
						<div class="row">
							<div class="col-6 align-items-center">
								<h6 class="mt-2">Ruangan Yang Dimiliki</h6>
							</div>
							<div class="col-6 text-end">
								<a class="btn bg-gradient-dark active mb-0" href="{{ Auth::user()->type_user === 'ADMINISTRATOR' ? route('buildingPage:admin') : route('buildingPage:owner') }}"><i class="fas fa-plus"></i> Tambah Ruangan</a>
							</div>
						</div>
					</div>
					<div class="card-body p-3 pt-4">
						<ul class="list-group">
							<li class="list-group-item d-flex border-radius-lg mb-2 border-0 bg-gray-100 p-4">
								<div class="d-flex flex-column">
									<h6 class="mb-3 text-sm">NAMA RUANGAN</h6>
									<span class="mb-2 text-xs">Nama: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
									<span class="mb-2 text-xs">Pemilik: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
									<span class="text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
								</div>
								<div class="ms-auto text-end">
									<a class="btn btn-link text-danger text-gradient mb-0 px-3" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
									<a class="btn btn-link text-dark mb-0 px-3" href="javascript:;"><i aria-hidden="true" class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
								</div>
							</li>
							<li class="list-group-item d-flex border-radius-lg mb-2 border-0 bg-gray-100 p-4">
								<div class="d-flex flex-column">
									<h6 class="mb-3 text-sm">NAMA RUANGAN</h6>
									<span class="mb-2 text-xs">Nama: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
									<span class="mb-2 text-xs">Pemilik: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
									<span class="text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
								</div>
								<div class="ms-auto text-end">
									<a class="btn btn-link text-danger text-gradient mb-0 px-3" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
									<a class="btn btn-link text-dark mb-0 px-3" href="javascript:;"><i aria-hidden="true" class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
								</div>
							</li>
							<li class="list-group-item d-flex border-radius-lg mb-2 border-0 bg-gray-100 p-4">
								<div class="d-flex flex-column">
									<h6 class="mb-3 text-sm">NAMA RUANGAN</h6>
									<span class="mb-2 text-xs">Nama: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
									<span class="mb-2 text-xs">Pemilik: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
									<span class="text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
								</div>
								<div class="ms-auto text-end">
									<a class="btn btn-link text-danger text-gradient mb-0 px-3" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
									<a class="btn btn-link text-dark mb-0 px-3" href="javascript:;"><i aria-hidden="true" class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
								</div>
							</li>
							<li class="list-group-item d-flex border-radius-lg mb-2 border-0 bg-gray-100 p-4">
								<div class="d-flex flex-column">
									<h6 class="mb-3 text-sm">NAMA RUANGAN</h6>
									<span class="mb-2 text-xs">Nama: <span class="text-dark font-weight-bold ms-sm-2">Viking Burrito</span></span>
									<span class="mb-2 text-xs">Pemilik: <span class="text-dark ms-sm-2 font-weight-bold">oliver@burrito.com</span></span>
									<span class="text-xs">Alamat: <span class="text-dark ms-sm-2 font-weight-bold">FRB1235476</span></span>
								</div>
								<div class="ms-auto text-end">
									<a class="btn btn-link text-danger text-gradient mb-0 px-3" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Delete</a>
									<a class="btn btn-link text-dark mb-0 px-3" href="javascript:;"><i aria-hidden="true" class="fas fa-pencil-alt text-dark me-2"></i>Edit</a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div> --}}
		@include('layouts.admin.footer')
	</div>
@endsection

@section('script')
@endsection
