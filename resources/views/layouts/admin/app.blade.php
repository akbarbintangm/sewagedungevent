<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link href="{{ asset('/img/apple-icon.png') }}" rel="apple-touch-icon" sizes="76x76">
	<link href="{{ asset('/img/favicon.png') }}" rel="icon" type="image/png">
	<title>
		@yield('title') - Sewa Gedung Dashboard
	</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('/css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/argon-dashboard.css?v=2.0.4') }}" id="pagestyle" rel="stylesheet" />
	<link href="{{ asset('/css/plugins/sweetalert2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/plugins/tagsinput.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/plugins/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	@yield('meta-link')
</head>

<body class="g-sidenav-show bg-gray-100">
	<div class="min-height-300 bg-primary position-absolute w-100"></div>
	@include('layouts.admin.sidebar')
	<main class="main-content position-relative border-radius-lg">
		@include('layouts.admin.navbar')
		@yield('content')
	</main>
	@include('layouts.admin.plugin')
	<script src="{{ asset('/js/core/jquery.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/perfect-scrollbar.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/smooth-scrollbar.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/datetimepicker.js') }}" type="text/javascript"></script>
	<script src="{{ asset('/js/plugins/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/tagsinput.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/dataTables.bootstrap4.min.js') }}"></script>
	<script>
		var win = navigator.platform.indexOf('Win') > -1;
		if (win && document.querySelector('#sidenav-scrollbar')) {
			var options = {
				damping: '0.5'
			}
			Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
		}
	</script>
	<script async defer src="https://buttons.github.io/buttons.js"></script>
	<script src="{{ asset('/js/argon-dashboard.min.js?v=2.0.4') }}"></script>
	<script src="{{ asset('/js/plugins/axios.min.js') }}"></script>
	@include('layouts.utils')
	@yield('script')
	@if ($message = Session::get('success'))
		<script>
			$(document).ready(function() {
				Swal.fire({
					icon: 'success',
					title: 'Well done!',
					text: '{{ $message }}',
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 5000
				});
			});
		</script>
	@endif

	@if ($message = Session::get('error') || ($message = Session::get('danger')))
		<script>
			$(document).ready(function() {
				Swal.fire({
					icon: 'error',
					title: 'Error!',
					text: '{{ $message }}',
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 5000
				});
			});
		</script>
	@endif

	@if ($message = Session::get('warning'))
		<script>
			$(document).ready(function() {
				Swal.fire({
					icon: 'warning',
					title: 'Warning!',
					text: '{{ $message }}',
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 5000
				});
			});
		</script>
	@endif

	@if ($message = Session::get('info'))
		<script>
			$(document).ready(function() {
				Swal.fire({
					icon: 'info',
					title: 'Info!',
					text: '{{ $message }}',
					toast: true,
					position: 'top-end',
					showConfirmButton: false,
					timer: 5000
				});
			});
		</script>
	@endif
</body>

</html>
