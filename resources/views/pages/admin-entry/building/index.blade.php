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
									<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" href="#ruanganTerdaftar" role="button">
										Ruangan Terdaftar
									</a>
									<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" href="#ruanganBelumTerdaftar" role="button">
										Ruangan Belum Terdaftar
									</a>
									<a aria-controls="collapseExample" aria-expanded="false" class="btn btn-outline-primary mb-0" href="#ruanganDitolak" role="button">
										Ruangan Ditolak/Dibatalkan
									</a>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md">
				<div id="ruanganTerdaftar">
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
				<div id="ruanganBelumTerdaftar">
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
		<div class="row">
			<div class="col-md">
				<div id="ruanganDitolak">
					<div class="card mb-4">
						<div class="card-header pb-0">
							<h6>Daftar Ruang Yang Ditolak / Dibatalkan</h6>
						</div>
						<div class="card-body pb-3 pt-2">
							<div class="table-responsive-lg p-0">
								<table class="w-100 align-items-center table-canceled mb-0 table">
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
				ajax: "{{ route('listBuildingVerified:admin-entry') }}",
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
				ajax: "{{ route('listBuildingUnverified:admin-entry') }}",
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
			var tableCanceled = $('.table-canceled').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('listBuildingCanceled:admin-entry') }}",
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

		function deleteRoom(data) {
			var url = '{{ route('deleteBuilding:admin-entry', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Data tidak dapat dikembalikan, Yakin?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-verified').DataTable().ajax.reload(null, false);
						$('.table-unverified').DataTable().ajax.reload(null, false);
						$('.table-canceled').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}

		function verifyRoom(data) {
			var url = '{{ route('verifyBuilding:admin-entry', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Data Ruangan akan dikonfirmasi, Yakin?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-verified').DataTable().ajax.reload(null, false);
						$('.table-unverified').DataTable().ajax.reload(null, false);
						$('.table-canceled').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}

		function cancelRoom(data) {
			var url = '{{ route('cancelBuilding:admin-entry', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Data Ruangan akan dibatalkan, Yakin?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-verified').DataTable().ajax.reload(null, false);
						$('.table-unverified').DataTable().ajax.reload(null, false);
						$('.table-canceled').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}
	</script>
@endsection
