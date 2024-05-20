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

	<div aria-hidden="true" aria-labelledby="detailModalLabel" class="modal fade" id="detailModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="detailModalLabel">Detail Transaksi <br><span id="codeTransaction"></span></h5>
					<button aria-label="Close" class="btn-danger" data-bs-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<ul>
						<li class="font-weight-bold">Code: <span class="font-weight-normal" id="codeBook"></span></li>
						<li class="font-weight-bold">Nama Ruangan: <span class="font-weight-normal" id="roomName"></span></li>
						<li class="font-weight-bold">Date Booking: <span class="font-weight-normal" id="dateBook"></span></li>
						<li class="font-weight-bold">Total Bayar: <span class="font-weight-normal" id="totalPay"></span></li>
						<li class="font-weight-bold">Status Order: <span class="font-weight-normal" id="statusOrder"></span></li>
						<li class="font-weight-bold">Status Transaction: <span class="font-weight-normal" id="statusTransaction"></span></li>
						<li class="font-weight-bold">Bukti Transfer:
							<span class="font-weight-normal" id="transferImageNotNull">
								<img alt="Transfer Image" class="w-100" id="transferImages">
							</span>
							<span class="text-danger" id="transferImageNull">Belum Bayar</span>
						</li>
					</ul>
				</div>
				<div class="modal-footer">
					<button class="btn bg-gradient-secondary" data-bs-dismiss="modal" type="button">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		const urlImageTransferPathBase = "{{ asset('transfer_payments') }}";

		var modalDetail = $('#detailModalLabel');
		var codeTransaction = $('#codeTransaction');
		var codeBook = $("#codeBook");
		var roomName = $("#roomName");
		var dateBook = $("#dateBook");
		var totalPay = $("#totalPay");
		var statusOrder = $("#statusOrder");
		var statusTransaction = $("#statusTransaction");
		var transferImagesNotNull = $("#transferImageNotNull");
		var transferImagesNull = $("#transferImageNull");
		var transferImages = $('#transferImages');

		function clearDataDetail() {
			codeTransaction.html('');
			codeBook.html('');
			roomName.html('');
			dateBook.html('');
			totalPay.html('');
			statusOrder.html('');
			statusTransaction.html('');
			transferImagesNotNull.hide();
			transferImagesNull.hide();
			transferImages.removeAttr('src');
		}

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

		function cancelOrder(data) {
			var url = '{{ route('cancelOrder:admin', ['id' => ':data']) }}';
			url = url.replace(':data', data);
			submitNotification(null, 'Apakah Anda yakin', 'Batalkan Order Booking Ini?', 'info', url)
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

		async function getDetailTransaction(data) {
			clearDataDetail();
			showLoadingNotification();
			try {
				var url = '{{ route('detailTransaction:admin', ['id' => ':data']) }}';
				url = url.replace(':data', data);
				const response = await axios.get(url);
				if (response.data.status === 200) {
					const data = response.data.data;
					const newPathImageTransferURL = urlImageTransferPathBase + '/' + data.building_name + '/' + data.transfer_image;
					hideLoadingNotification();
					codeTransaction.html(data.code);
					codeBook.html(data.code)
					roomName.html(data.building_name)
					dateBook.html(new Date(data.date_start).toLocaleDateString('id-ID', {
						day: 'numeric',
						month: 'long',
						year: 'numeric'
					}));
					totalPay.html('Rp. ' + data.total_pay.toLocaleString('id-ID'));
					if (data.status_order === 0) {
						statusOrder.html('Belum Booking / Booking Dibatalkan');
					} else if (data.status_order === 1) {
						statusOrder.html('Sudah Booking, Belum Bayar/Transfer');
					} else if (data.status_order === 2) {
						statusOrder.html('Sudah Booking dan Bayar Transfer, Menuggu Konfirmasi');
					} else if (data.status_order === 3) {
						statusOrder.html('Booking Terkonfirmasi');
					}
					if (data.status_transaction === 0) {
						statusTransaction.html('Belum Diverifikasi');
					} else if (data.status_transaction === 1) {
						statusTransaction.html('Sudah Transfer / Diverifikasi');
					} else if (data.status_transaction === 2) {
						statusTransaction.html('Sudah Kadaluarsa / Tanggal Booking Berakhir');
					}
					if (data.transfer_image !== null) {
						transferImagesNull.hide();
						transferImagesNotNull.show();
						transferImages.removeAttr('src').attr('src', newPathImageTransferURL);
					} else {
						transferImagesNull.show();
						transferImagesNotNull.hide();
						transferImages.removeAttr('src');
					}
				}
			} catch {
				hideLoadingNotification();
				const failedFetch = await alertNotification('Server Error!', 'Tidak bisa mengambil data detail transaksi!', 'warning');
				if (failedFetch.isConfirmed) {
					modalDetail.modal('hide');
				}
			}
		}

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
	</script>
@endsection
