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
							<table class="w-100 align-items-center table-order mb-0 table">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Penyewa</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama Ruangan</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tanggal Sewa</th>
										{{-- <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Durasi</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tanggal Selesai</th> --}}
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Total Bayar</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Action</th>
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
		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			var token = '{{ Session::token() }}';
			var tableVerified = $('.table-order').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('listOrder:admin') }}",
				headers: {
					'CSRFToken': token
				},
				columns: [{
						data: 'tenant_name',
						name: 'tenant_name',
						orderable: true,
						searchable: true
					},
					{
						data: 'building_name',
						name: 'building_name',
						orderable: true,
						searchable: true
					},
					{
						data: 'date_start',
						name: 'transactions.date_start',
						orderable: true,
						searchable: true
					},
					// {
					// 	data: 'total_day',
					// 	name: 'transactions.total_day',
					// 	orderable: true,
					// 	searchable: true
					// },
					// {
					// 	data: 'date_end',
					// 	name: 'transactions.date_end',
					// 	orderable: true,
					// 	searchable: true
					// },
					{
						data: 'total_pay',
						name: 'transactions.total_pay',
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

		function verifyOrder(data) {
			var url = '{{ route('updateOrder:admin', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Verifikasi Order Booking Ini?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-order').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}
	</script>
@endsection
