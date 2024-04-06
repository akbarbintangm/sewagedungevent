<nav class="navbar navbar-main navbar-expand-lg border-radius-xl mx-4 px-0 shadow-none" data-scroll="false" id="navbarBlur">
	<div class="container-fluid px-3 py-1">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb me-sm-6 mb-0 me-5 bg-transparent px-0 pb-0 pt-1">
				<li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
				<li aria-current="page" class="breadcrumb-item active text-sm text-white">@yield('pageName')</li>
			</ol>
			<h6 class="font-weight-bolder mb-0 text-white">@yield('subPageName')</h6>
		</nav>
		<div class="navbar-collapse mt-sm-0 me-md-0 me-sm-4 collapse mt-2" id="navbar">
			<ul class="ms-md-auto pe-md-3 d-flex navbar-nav justify-content-end">
				<li class="nav-item dropdown d-flex align-items-center pe-2">
					<a aria-expanded="false" class="nav-link p-0 text-white" data-bs-toggle="dropdown" href="javascript:;" id="dropdownMenuButton">
						<i class="fa fa-bell cursor-pointer"></i>
					</a>
					<ul aria-labelledby="dropdownMenuButton" class="dropdown-menu dropdown-menu-end me-sm-n4 px-2 py-3">
						<li class="mb-2">
							<a class="dropdown-item border-radius-md" href="javascript:;">
								<div class="d-flex py-1">
									<div class="my-auto">
										<img class="avatar avatar-sm me-3" src="{{ asset('/img/team-2.jpg') }}">
									</div>
									<div class="d-flex flex-column justify-content-center">
										<h6 class="font-weight-normal mb-1 text-sm">
											<span class="font-weight-bold">New message</span> from Laur
										</h6>
										<p class="text-secondary mb-0 text-xs">
											<i class="fa fa-clock me-1"></i>
											13 minutes ago
										</p>
									</div>
								</div>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item d-flex align-items-center px-3">
					<a class="nav-link p-0 text-white" href="">
						<i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
					</a>
				</li>
				<li class="nav-item d-flex align-items-center">
					<a class="nav-link font-weight-bold px-0 text-white" href="javascript:;">
						<i class="fa fa-user me-sm-1"></i>
						<span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
					</a>
				</li>
				<li class="nav-item d-xl-none d-flex align-items-center ps-3">
					<a class="nav-link p-0 text-white" href="javascript:;" id="iconNavbarSidenav">
						<div class="sidenav-toggler-inner">
							<i class="sidenav-toggler-line bg-white"></i>
							<i class="sidenav-toggler-line bg-white"></i>
							<i class="sidenav-toggler-line bg-white"></i>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
