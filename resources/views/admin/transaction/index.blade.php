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
							<table class="align-items-center table-transaction mb-0 table">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Kode Pembayaran</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tanggal Pembayaran</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Nama</th>
										{{-- <th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Durasi</th> --}}
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Tota Bayar</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Status Pembayaran</th>
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
			var tableVerified = $('.table-transaction').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('listTransaction:admin') }}",
				headers: {
					'CSRFToken': token
				},
				columns: [{
						data: 'code',
						name: 'transactions.code',
						orderable: true,
						searchable: true
					},
					{
						data: 'date_payment',
						name: 'transaction.updated_at',
						orderable: true,
						searchable: true
					},
					{
						data: 'tenant_name',
						name: 'tenant_name',
						orderable: true,
						searchable: true
					},
					// {
					// 	data: 'total_day',
					// 	name: 'transactions.total_day',
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
						data: 'status_transaction',
						name: 'status_transaction',
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
						$('.table-transaction').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}

		function verifyTransaction(data) {
			var url = '{{ route('updateTransaction:admin', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Verifikasi Order/Transaksi Booking Ini?', 'info', url)
				.then(replyResponse => {
					if (replyResponse) {
						$('.table-transaction').DataTable().ajax.reload(null, false);
					}
				})
				.catch(error => {
					console.error('Error:', error);
				});
		}
	</script>
@endsection
