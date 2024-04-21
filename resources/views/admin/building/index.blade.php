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
						<div class="row">
							<div class="col">
								<p class="mb-0">
									<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" data-bs-toggle="collapse" href="#ruanganterdaftar" role="button">
										Ruangan Terdaftar
									</a>
									<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" data-bs-toggle="collapse" href="#ruanganbelumterdaftar" role="button">
										Ruangan Belum Terdaftar
									</a>
								</p>
							</div>
							<div class="col text-end">
								<a class="btn bg-gradient-dark active mb-0" href="{{ Auth::user()->type_user === 'ADMINISTRATOR' ? route('addPageBuilding:admin') : route('addPageBuilding:owner') }}"><i class="fas fa-plus"></i> Tambah Ruangan</a>
							</div>
						</div>
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
							<div class="table-responsive-lg p-0">
								<table class="w-100 align-items-center table-verified mb-0 table">
									<thead>
										<tr>
											<th>Nama Ruangan</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Range Harga</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody></tbody>
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
							<div class="table-responsive-lg p-0">
								<table class="w-100 align-items-center table-unverified mb-0 table">
									<thead>
										<tr>
											<th>Nama Ruangan</th>
											<th>Nama Pemilik</th>
											<th>Alamat</th>
											<th>Range Harga</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody></tbody>
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
	<script>
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			var token = '{{ Session::token() }}';
			var tableVerified = $('.table-verified').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('listBuildingVerified:admin') }}",
				headers: {
					'CSRFToken': token
				},
				columns: [{
						data: 'name',
						name: 'buildings.name',
						orderable: true,
						searchable: true
					},
					{
						data: 'owner_name',
						name: 'owner_name',
						orderable: true,
						searchable: true
					},
					{
						data: 'address',
						name: 'buildings.address',
						orderable: true,
						searchable: false
					},
					{
						data: 'price',
						name: 'buildings.price',
						orderable: true,
						searchable: false
					},
					{
						data: 'action',
						name: 'action',
						orderable: false,
						searchable: false
					}
				]
			});
			var tableUnverified = $('.table-unverified').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('listBuildingUnverified:admin') }}",
				headers: {
					'CSRFToken': token
				},
				columns: [{
						data: 'name',
						name: 'buildings.name',
						orderable: true,
						searchable: true
					},
					{
						data: 'owner_name',
						name: 'owner_name',
						orderable: true,
						searchable: true
					},
					{
						data: 'address',
						name: 'buildings.address',
						orderable: true,
						searchable: false
					},
					{
						data: 'price',
						name: 'buildings.price',
						orderable: true,
						searchable: false
					},
					{
						data: 'status',
						name: 'buildings.status',
						orderable: true,
						searchable: false
					},
					{
						data: 'action',
						name: 'action',
						orderable: false,
						searchable: false
					}
				]
			});
		});
	</script>
@endsection
