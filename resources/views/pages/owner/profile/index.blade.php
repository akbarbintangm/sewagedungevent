@extends('layouts.admin.app')

@section('title')
	Profile
@endsection

@section('pageName')
	{{ Auth::user()->name }}
@endsection

@section('subPageName')
	Profile
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="card card-profile-bottom mx-4 shadow-lg">
		<div class="card-body p-3">
			<div class="row gx-4">
				<div class="col-auto">
					<div class="avatar avatar-xl position-relative">
						<img class="w-100 border-radius-lg shadow-sm" src="{{ asset('img/team-2.jpg') }}">
					</div>
				</div>
				<div class="col-auto my-auto">
					<div class="h-100">
						<h5 class="mb-1">
							{{ $dataUser->name }}
						</h5>
						<p class="font-weight-bold mb-0 text-sm">
							Tipe User: {{ \Illuminate\Support\Str::title(str_replace('_', ' ', $dataUser->type_user)) }}
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header pb-0">
						<div class="d-flex align-items-center">
							<p class="mb-0">Edit Profile</p>
						</div>
					</div>
					<div class="card-body">
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
									{{-- <div class="card-header pt-lg-2 pb-lg-2 mt-3 border-0 text-center">
										<div class="d-flex justify-content-between">
											<button class="btn btn-primary" disabled type="button">
												Ubah Profile
											</button>
											<button class="btn btn-info" disabled type="button">
												Pilih Foto
											</button>
										</div>
									</div> --}}
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
									<form action="{{ route('updateProfile:owner') }}" class="card-body" enctype="multipart/form-data" id="forms" method="POST">
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
												@if (Auth::user()->type_user === 'PEMILIK_GEDUNG')
													<div class="row">
														<div class="col-4">
															<div class="form-group">
																<label class="form-control-label" for="bankTenant">Nama Bank<span class="text-danger"> *</span></label>
																<input class="form-control" id="bankTenant" name="tenant_bank" placeholder="Masukkan Nama Bank" type="name" value="{{ $dataUser->bank_name }}">
															</div>
														</div>
														<div class="col-8">
															<div class="form-group">
																<label class="form-control-label" for="bankNumberTenant">Nomor Rekening Bank<span class="text-danger"> *</span></label>
																<input class="form-control" id="bankNumberTenant" name="tenant_bank_number" placeholder="Masukkan Nomor Bank" type="number" value="{{ $dataUser->bank_number }}">
															</div>
														</div>
													</div>
												@endif
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
				</div>
			</div>
		</div>
		@include('layouts.admin.footer')
	</div>
@endsection

@section('script')
	<script>
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

		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'csrftoken': '{{ csrf_token() }}'
				}
			});
			var token = '{{ Session::token() }}';
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
