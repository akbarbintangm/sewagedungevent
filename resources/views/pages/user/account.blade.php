@extends('layouts.user.app')

@section('title')
	Profile
@endsection

@section('meta-link')
@endsection

@section('content')
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
							<button class="btn btn-primary btn-sm" disabled type="button">
								Ubah Profile
							</button>
							<button class="btn btn-info btn-sm" disabled type="button">
								Pilih Foto
							</button>
							<button class="btn btn-dark btn-sm" data-target="#historyTransactionModal" data-toggle="modal" onclick="reloadTable()" type="button">
								Riwayat Transaksi
							</button>
						</div>
					</div>
					<div class="card-body pt-0">
						<div class="mt-4 text-center">
							<h5>
								{{ $dataUser->name }}
							</h5>
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
					<form action="{{ route('updateProfile:user') }}" class="card-body" enctype="multipart/form-data" id="forms" method="POST">
						@csrf
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="nameTenant">Nama<span class="text-danger"> *</span></label>
									<input class="form-control" id="nameTenant" name="tenant_name" placeholder="Masukkan Nama" type="name" value="{{ $dataUser->name }}">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="emailTenant">Email<span class="text-danger"> *</span></label>
									<input class="form-control" id="emailTenant" name="tenant_email" placeholder="Masukkan Email" type="email" value="{{ $dataUser->email }}">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="phoneTenant">No Telp<span class="text-danger"> *</span></label>
									<input class="form-control" id="phoneTenant" name="tenant_phone" placeholder="Masukkan Telepon" type="number" value="{{ $dataUser->phone }}">
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label class="form-control-label" for="passwordTenant">Password<span class="text-danger"> * isi jika ingin mengganti password</span></label>
									<input class="form-control" id="passwordTenant" name="tenant_password" placeholder="Masukkan Password" type="password" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="repasswordTenant">Masukkan Ulang Password<span class="text-danger"> * isi jika ingin mengganti password</span></label>
									<input class="form-control" id="repasswordTenant" name="tenant_repassword" placeholder="Ulangi Password" type="password" value="">
								</div>
							</div>
						</div>
						<div class="dropdown-divider"></div>
						<div class="row">
							<div class="col">
								<button class="btn btn-primary" type="submit">
									Update Profil
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div aria-hidden="true" aria-labelledby="historyTransactionLabel" class="modal fade" id="historyTransactionModal" role="dialog">
		<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="historyTransactionLabel">Riwayat Transaksi</h5>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="table-responsive p-0">
						<table class="table-history-transaction w-100 table">
							<thead>
								<tr>
									<th>Kode Transaksi</th>
									<th>Tanggal</th>
									<th>Nama Ruangan</th>
									<th>Total Bayar</th>
									<th>Invoice</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
				<div class="modal-footer">
					{{-- onclick="downloadAllInvoice()" --}}
					<button class="btn btn-primary" id="downloadAllInvoicePDF" type="button">Download Semua Invoice</button>
					<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		var modalTransaction = $('#historyTransactionModal');

		modalTransaction.modal('hide');

		document.getElementById('downloadAllInvoicePDF').addEventListener('click', async function(e) {
			e.preventDefault();
			modalTransaction.modal('hide');
			const result = await showNotification('Apakah Anda yakin?', 'Semua histori transaksi akan didownload berformat PDF.', 'info')
			if (!result.isConfirmed) {
				modalTransaction.modal('show');
			} else {
				try {
					var url = '{{ route('transactionAllInvoice:user') }}';
					window.location.href = url;
					showAlertToast('Download Berhasil!', 'Semua invoice berhasil didownload!', 'success');
					$('.table-history-transaction').DataTable().ajax.reload(null, false);
					modalTransaction.modal('show');
				} catch (error) {
					showAlertToast('Download Gagal!', 'Semua invoice gagal didownload!', 'error');
					$('.table-history-transaction').DataTable().ajax.reload(null, false);
					modalTransaction.modal('show');
				}
			}
		});

		async function downloadInvoice(data) {
			modalTransaction.modal('hide');
			const result = await showNotification('Apakah Anda yakin?', 'Histori transaksi yang dipilih akan didownload berformat PDF.', 'info')
			if (!result.isConfirmed) {
				modalTransaction.modal('show');
			} else {
				try {
					var url = '{{ route('transactionInvoice:user', ['id' => ':id']) }}';
					url = url.replace(':id', data);
					window.location.href = url;
					showAlertToast('Download Berhasil!', 'Semua invoice berhasil didownload!', 'success');
					$('.table-history-transaction').DataTable().ajax.reload(null, false);
					modalTransaction.modal('show');
				} catch (error) {
					showAlertToast('Download Gagal!', 'Semua invoice gagal didownload!', 'error');
					$('.table-history-transaction').DataTable().ajax.reload(null, false);
					modalTransaction.modal('show');
				}
			}
		}

		async function blurPasswordTenant(repassword, password) {
			if (password.val() === repassword.val()) {
				repassword.addClass('is-valid').removeClass('is-invalid');
				password.addClass('is-valid').removeClass('is-invalid');
			} else {
				repassword.removeClass('is-valid').addClass('is-invalid').val('');
				password.removeClass('is-valid').addClass('is-invalid').val('');
				const result = await alertNotification('Password Tidak Sama!', 'Mohon isikan password yang sama!', 'warning');
			}
		}

		async function keyUpPasswordTenant(repassword, password) {
			if (password.val() === repassword.val()) {
				repassword.addClass('is-valid').removeClass('is-invalid');
				password.addClass('is-valid').removeClass('is-invalid');
			} else {
				repassword.removeClass('is-valid').addClass('is-invalid');
				password.removeClass('is-valid').addClass('is-invalid');
			}
		}

		function reloadTable() {
			$('.table-history-transaction').DataTable().ajax.reload(null, false);
		}

		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			var token = '{{ Session::token() }}';
			var tableHistoryTransaction = $('.table-history-transaction').DataTable({
				autoWidth: true,
				processing: true,
				serverSide: true,
				ajax: "{{ route('dataHistoryTransactionUser:user') }}",
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
						data: 'date_start',
						name: 'transactions.date_start',
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
						data: 'total_pay',
						name: 'transactions.total_pay',
						orderable: true,
						searchable: true
					},
					{
						data: 'download',
						name: 'download',
						orderable: false,
						searchable: false
					},
				]
			});
			$('#repasswordTenant').on('blur', async function() {
				blurPasswordTenant($('#repasswordTenant'), $('#passwordTenant'));
			}).on('keyup', async function() {
				keyUpPasswordTenant($('#repasswordTenant'), $('#passwordTenant'));
			});
			$('#passwordTenant').on('keyup', async function() {
				keyUpPasswordTenant($('#repasswordTenant'), $('#passwordTenant'));
			});
		});

		document.getElementById('forms').addEventListener('submit', function(e) {
			e.preventDefault();
			submitNotification(this, 'Apakah Anda yakin?', 'Data Akun dapat diubah dilain waktu.', 'info');
		});
	</script>
@endsection
