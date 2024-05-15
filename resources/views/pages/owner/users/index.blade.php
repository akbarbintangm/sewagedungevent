@extends('layouts.admin.app')

@section('title')
	Daftar User
@endsection

@section('pageName')
	User
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
				<div class="card mb-4">
					<div class="card-header pb-0">
						<h6>List User</h6>
					</div>
					<div class="card-body pb-3 pt-3">
						<div class="table-responsive p-0">
							<table class="align-items-center table-user mb-0 table">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-xs">Nama</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2 text-xs">Tipe User</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Status</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Aksi</th>
									</tr>
								</thead>
								<tbody></tbody>
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
	<script>
		function verifyUser(data) {
			var url = '{{ route('verifyUser:owner', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Verifikasi User Ini?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-user').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}

		function unverifyUser(data) {
			var url = '{{ route('unverifyUser:owner', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Batal Verifikasi User Ini?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-user').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}

		function deleteUser(data) {
			var url = '{{ route('deleteUser:owner', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Hapus User Ini?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-user').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}

		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			var token = '{{ Session::token() }}';
			var tableVerified = $('.table-user').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('listUser:owner') }}",
				headers: {
					'CSRFToken': token
				},
				columns: [{
						data: 'name',
						name: 'users.name',
						orderable: true,
						searchable: true
					},
					{
						data: 'type_user',
						name: 'users.type_user',
						orderable: true,
						searchable: true
					},
					{
						data: 'status',
						name: 'users.status',
						orderable: true,
						searchable: true
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
