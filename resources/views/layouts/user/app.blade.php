<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
	<link href="{{ asset('/img/apple-icon.png') }}" rel="apple-touch-icon" sizes="76x76">
	<link href="{{ asset('/img/favicon.png') }}" rel="icon" type="image/png">
	<title>
		@yield('title') - Sewa Gedung
	</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{ asset('/css/fontawesome5.all.css') }}" rel="stylesheet">
	<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
	<link href="{{ asset('/css/nucleo-icons.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/nucleo-svg.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet" />
	<link href="{{ asset('/css/plugins/sweetalert2.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/plugins/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/argon-design-system.css?v=1.2.2') }}" rel="stylesheet" />
	<link href="{{ asset('/vendor/lightgallery/css/lightgallery-bundle.min.css') }}" rel="stylesheet">
	@yield('meta-link')
</head>

<body class="landing-page">
	@include('layouts.user.navbar')
	<div class="wrapper">
		@yield('content')
		@include('layouts.user.footer')
	</div>
	<script src="{{ asset('/js/core/jquery.min.js') }}"></script>
	<script src="{{ asset('/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('/js/core/bootstrap.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/fontawesome5.all.js') }}"></script>
	<script src="{{ asset('/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/bootstrap-switch.js') }}"></script>
	<script src="{{ asset('/js/plugins/nouislider.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/moment.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/datetimepicker.js') }}"></script>
	<script src="{{ asset('/js/plugins/bootstrap-datepicker.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/sweetalert2.all.min.js') }}"></script>
	<script src="{{ asset('/js/plugins/datatables/datatables.min.js') }}"></script>
	{{-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}
	<script src="{{ asset('/js/argon-design-system.min.js?v=1.2.2') }}"></script>
	{{-- <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script> --}}
	<script src="{{ asset('/vendor/lightgallery/lightgallery.min.js') }}"></script>
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

	@if (($message = Session::get('error')) || ($message = Session::get('danger')))
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
