<nav class="navbar navbar-main navbar-expand-lg bg-primary navbar-light position-sticky top-0 py-2 shadow" id="navbar-main">
	<div class="container">
		<a class="navbar-brand mr-lg-5" href="../index.html">
			<img src="{{ asset('img/brand/white.png') }}" />
		</a>
		<button aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbar_global" data-toggle="collapse" type="button">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="navbar-collapse collapse" id="navbar_global">
			<div class="navbar-collapse-header">
				<div class="row">
					<div class="col-6 collapse-brand">
						<a href="../../../index.html">
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
					<a class="nav-link" data-toggle="tooltip" href="#" role="button">
						<i class="ni ni-ui-04 d-lg-none"></i>
						<span class="nav-link-inner--text text-white">Beranda</span>
					</a>
				</li>
			</ul>
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <li class="nav-item">
					<a class="nav-link nav-link-icon" data-toggle="tooltip" href="#" title="">
						<i class="fa fa-list-alt fa-lg text-white"></i>
						<span class="nav-link-inner--text d-lg-none">Riwayat Transaksi</span>
					</a>
				</li>
                <li class="nav-item dropdown">
					<a class="nav-link nav-link-icon" data-toggle="dropdown" href="#" title="User">
						<i class="fa fa-user fa-lg text-white"></i>
						<span class="nav-link-inner--text d-lg-none">User</span>
					</a>
                    <div class="dropdown-menu">
						<a class="dropdown-item" href="../examples/profile.html">Profile</a>
						<a class="dropdown-item text-danger" href="../examples/login.html">Logout</a>
						<a class="dropdown-item" href="../examples/register.html">Register</a>
					</div>
				</li>
            </ul>
		</div>
	</div>
</nav>
