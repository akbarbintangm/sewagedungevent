@extends('layouts.user.app')

@section('title')
	Register
@endsection

@section('meta-link')
@endsection

@section('content')
	<section class="section section-shaped section-lg">
		<div class="shape shape-style-1 bg-gradient-default">
		</div>
		<div class="pt-lg-10 container">
			<div class="row justify-content-center">
				<div class="col-lg-8">
					<div class="card bg-secondary border-0 shadow">
						<div class="card-header bg-white pb-5">
						</div>
						<div class="card-body px-lg-5 py-lg-5">
							<div class="text-muted mb-4 text-center">
								<small>Sign up with credentials</small>
							</div>
							@if ($message = Session::get('success'))
								<div class="alert alert-dismissible fade show alert-success alert-block shadow-sm" data-alerts=”alerts” data-dismiss="alert" data-fade=”5000″ role="alert">
									<strong>Well done!</strong> {{ $message }}
									<button class="close" data-dismiss="alert" type="button">×</button>
								</div>
							@endif
							@if (($message = Session::get('error')) || ($message = Session::get('danger')))
								<div class="alert alert-dismissible fade show alert-danger alert-block shadow-sm" data-alerts=”alerts” data-dismiss="alert" data-fade=”5000″ role="alert">
									<strong>Error!</strong> {{ $message }}
									<button class="close" data-dismiss="alert" type="button">×</button>
								</div>
							@endif
							@if ($message = Session::get('warning'))
								<div class="alert alert-dismissible fade show alert-warning alert-block shadow-sm" data-alerts=”alerts” data-dismiss="alert" data-fade=”5000″ role="alert">
									<strong>Warning!</strong> {{ $message }}
									<button class="close" data-dismiss="alert" type="button">×</button>
								</div>
							@endif
							@if ($message = Session::get('info'))
								<div class="alert alert-dismissible fade show alert-info alert-block shadow-sm" data-alerts=”alerts” data-dismiss="alert" data-fade=”5000″ role="alert">
									<strong>Info!</strong> {{ $message }}
									<button class="close" data-dismiss="alert" type="button">×</button>
								</div>
							@endif
							<form action="{{ route('auth-register') }}" enctype="multipart/form-data" id="forms" method="POST" role="form">
								@csrf
								<div class="form-group">
									<label class="form-control-label" for="nameUser">Nama<span class="text-danger"> *</span></label>
									<input class="form-control" id="nameUser" name="user_name" placeholder="Masukkan Nama" required="required" type="name" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="emailUser">Email<span class="text-danger"> *</span></label>
									<input class="form-control" id="emailUser" name="user_email" placeholder="Masukkan Email" required="required" type="email" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="phoneUser">No Telp<span class="text-danger"> *</span></label>
									<input class="form-control" id="phoneUser" name="user_phone" placeholder="Masukkan Telepon" required="required" type="number" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="passwordUser">Password<span class="text-danger"> *</span></label>
									<input class="form-control" id="passwordUser" name="user_password" placeholder="Masukkan Password" required="required" type="password" value="">
								</div>
								<div class="form-group">
									<label class="form-control-label" for="repasswordUser">Masukkan Ulang Password<span class="text-danger"> *</span></label>
									<input class="form-control" id="repasswordUser" name="user_repassword" placeholder="Ulangi Password" required="required" type="password" value="">
								</div>
								<div class="form-group m-0">
									<label class="form-control-label">Type User<span class="text-danger"> *</span></label>
									<div class="custom-control custom-control-alternative custom-checkbox">
										<input class="custom-control-input" id="typeUserCustomer" name="user_customer" type="checkbox">
										<label class="custom-control-label" for="typeUserCustomer"><span>Customer / Penyewa</span></label>
									</div>
									<div class="custom-control custom-control-alternative custom-checkbox">
										<input class="custom-control-input" id="typeUserOwner" name="user_owner" type="checkbox">
										<label class="custom-control-label" for="typeUserOwner"><span>Owner / Pemilik Ruangan</span></label>
									</div>
								</div>
								<div class="custom-control custom-control-alternative custom-checkbox mt-3">
									<input class="custom-control-input" id="checkRegister" name="remember" required="required" type="checkbox">
									<label class="custom-control-label" for="checkRegister"><span>Saya menaati peraturan yang ada.</span></label>
								</div>
								<div class="text-center">
									<button class="btn btn-primary disabled my-4" disabled="disabled" id="registerSubmit" type="submit">Register</button>
								</div>
							</form>
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-6">
							<a class="text-light" href="#"><small>Forgot password?</small></a>
						</div>
						<div class="col-6 text-right">
							<a class="text-light" href="{{ route('login') }}"><small>Punya akun? Ya login lah bang!</small></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
	<script>
		async function blurPasswordUser(repassword, password) {
			if (password.val() === repassword.val()) {
				repassword.addClass('is-valid').removeClass('is-invalid');
				password.addClass('is-valid').removeClass('is-invalid');
			} else {
				repassword.removeClass('is-valid').addClass('is-invalid').val('');
				password.removeClass('is-valid').addClass('is-invalid');
				const result = await alertNotification('Password Tidak Sama!', 'Mohon isikan password yang sama!', 'warning');
				if (result.isConfirmed) {}
			}
		}

		async function keyUpPasswordUser(repassword, password) {
			if (password.val() === repassword.val()) {
				repassword.addClass('is-valid').removeClass('is-invalid');
				password.addClass('is-valid').removeClass('is-invalid');
			} else {
				repassword.removeClass('is-valid').addClass('is-invalid');
				password.removeClass('is-valid').addClass('is-invalid');
			}
		}

		$(document).ready(function() {
			$('#repasswordUser').on('blur', async function() {
				blurPasswordUser($('#repasswordUser'), $('#passwordUser'));
			}).on('keyup', async function() {
				keyUpPasswordUser($('#repasswordUser'), $('#passwordUser'));
			});
			$('#passwordUser').on('keyup', async function() {
				keyUpPasswordUser($('#repasswordUser'), $('#passwordUser'));
			});
			$('#typeUserCustomer').change(function() {
				if ($(this).prop('checked')) {
					$('#typeUserOwner').prop('checked', false);
				}
			});
			$('#typeUserOwner').change(function() {
				if ($(this).prop('checked')) {
					$('#typeUserCustomer').prop('checked', false);
				}
			});
			$('#checkRegister').click(function() {
				if ($(this).prop('checked')) {
					$('#registerSubmit').removeAttr('disabled', 'disabled').removeClass('disabled');
				} else {
					$('#registerSubmit').attr('disabled', 'disabled').addClass('disabled');
				}
			});
		});

		document.getElementById('forms').addEventListener('submit', function(e) {
			e.preventDefault();
			submitNotification(this, 'Apakah Anda yakin untuk register?', 'Data dapat diubah dilain waktu.', 'info');
		});
	</script>
@endsection
) ?> ?> ?>
