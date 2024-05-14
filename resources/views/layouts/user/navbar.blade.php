<nav class="navbar navbar-main navbar-expand-lg bg-primary navbar-light position-sticky top-0 py-2 shadow" id="navbar-main">
	<div class="container">
		@if (Auth::check())
			<a class="navbar-brand mr-lg-5" href="{{ route('homePage:user') }}">
			@else
				<a class="navbar-brand mr-lg-5" href="{{ route('landingWithoutLoginPage:user') }}">
		@endif
		<img src="{{ asset('img/brand/white.png') }}" />
		</a>
		<button aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbar_global" data-toggle="collapse" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbar_global">
			<div class="navbar-collapse-header">
				<div class="row">
					<div class="col-6 collapse-brand">
						@if (Auth::check())
							<a href="{{ route('homePage:user') }}">
							@else
								<a href="{{ route('landingWithoutLoginPage:user') }}">
						@endif
						<img src="{{ asset('img/brand/blue.png') }}" />
						</a>
					</div>
					<div class="col-6 collapse-close">
						<button aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbar_global" data-toggle="collapse" type="button">
							<span></span>
							<span></span>
						</button>
					</div>
				</div>
			</div>
			<ul class="navbar-nav navbar-nav-hover align-items-lg-center">
				<li class="nav-item">
					@if (Auth::check())
						<a class="nav-link" data-toggle="tooltip" href="{{ route('homePage:user') }}" role="button">
						@else
							<a class="nav-link" data-toggle="tooltip" href="{{ route('landingWithoutLoginPage:user') }}" role="button">
					@endif
					<i class="ni ni-ui-04 d-lg-none"></i>
					<span class="nav-link-inner--text text-white">Beranda</span>
					</a>
				</li>
			</ul>
			<ul class="navbar-nav align-items-lg-center ml-lg-auto">
				@if (Auth::check())
					<li class="nav-item" style="cursor: pointer;">
						<a class="nav-link nav-link-icon" data-target="#historyTransaction" data-toggle="modal" onclick="reloadTable()" title="">
							<i class="fa fa-list-alt fa-lg text-white"></i>
							<span class="nav-link-inner--text d-lg-none">Riwayat Transaksi</span>
						</a>
					</li>
				@endif
				<li class="nav-item dropdown">
					<a class="nav-link nav-link-icon" data-toggle="dropdown" href="#" title="User">
						<i class="fa fa-user fa-lg text-white"></i>
						<span class="nav-link-inner--text d-lg-none">User</span>
					</a>
					<div class="dropdown-menu">
						@if (Auth::check())
							<a class="dropdown-item" href="{{ route('profilePage:user') }}">Profile</a>
							<a class="dropdown-item text-danger" href="{{ route('auth-logout') }}">Logout</a>
						@else
							<a class="dropdown-item" href="{{ route('login') }}">Login</a>
						@endif
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>
