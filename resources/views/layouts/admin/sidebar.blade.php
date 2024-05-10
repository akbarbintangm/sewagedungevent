<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-xl fixed-start my-3 ms-4 border-0 bg-white" id="sidenav-main" style="z-index: 1000;">
	<div class="sidenav-header">
		<i aria-hidden="true" class="fas fa-times text-secondary position-absolute d-none d-xl-none end-0 top-0 cursor-pointer p-3 opacity-5" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.html " target="_blank">
			<img alt="main_logo" class="navbar-brand-img h-100" src="{{ asset('img/logo-ct-dark.png') }}" />
			<span class="font-weight-bold ms-1">Rental Gedung</span>
		</a>
	</div>
	<hr class="horizontal dark mt-0" />
	<div class="w-auto" id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="{{ route('dashboardPage:admin') }}">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Dashboard</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="text-uppercase font-weight-bolder opacity-6 ms-2 ps-4 text-xs">
					Ruangan
				</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('buildingPage:admin') }}">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="ni ni-app text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Daftar Ruangan</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="text-uppercase font-weight-bolder opacity-6 ms-2 ps-4 text-xs">
					Transaksi
				</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('orderPage:admin') }}">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="ni ni-app text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Daftar Order</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('transactionPage:admin') }}">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="ni ni-app text-primary text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Daftar Transaksi</span>
				</a>
			</li>
			<li class="nav-item mt-3">
				<h6 class="text-uppercase font-weight-bolder opacity-6 ms-2 ps-4 text-xs">
					User
				</h6>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('userPage:admin') }}">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Daftar User</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="{{ route('profilePage:admin') }}">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Profile</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-danger" onclick="window.location='{{ route('auth-logout') }}'" style="cursor: pointer;">
					<div class="icon icon-shape icon-sm border-radius-md d-flex align-items-center justify-content-center me-2 text-center">
						<i class="text-danger fa fa-door-open text-sm opacity-10"></i>
					</div>
					<span class="nav-link-text ms-1">Logout</span>
				</a>
			</li>
		</ul>
	</div>
</aside>
