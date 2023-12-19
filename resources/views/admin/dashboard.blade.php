@extends('layouts.admin.app')

@section('title')
	Main
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">Today's Money</p>
									<h5 class="font-weight-bolder">
										$53,000
									</h5>
									<p class="mb-0">
										<span class="text-success font-weight-bolder text-sm">+55%</span>
										since yesterday
									</p>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-primary shadow-primary rounded-circle text-center">
									<i aria-hidden="true" class="ni ni-money-coins text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">Today's Users</p>
									<h5 class="font-weight-bolder">
										2,300
									</h5>
									<p class="mb-0">
										<span class="text-success font-weight-bolder text-sm">+3%</span>
										since last week
									</p>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-danger shadow-danger rounded-circle text-center">
									<i aria-hidden="true" class="ni ni-world text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">New Clients</p>
									<h5 class="font-weight-bolder">
										+3,462
									</h5>
									<p class="mb-0">
										<span class="text-danger font-weight-bolder text-sm">-2%</span>
										since last quarter
									</p>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-success shadow-success rounded-circle text-center">
									<i aria-hidden="true" class="ni ni-paper-diploma text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-sm-6">
				<div class="card">
					<div class="card-body p-3">
						<div class="row">
							<div class="col-8">
								<div class="numbers">
									<p class="text-uppercase font-weight-bold mb-0 text-sm">Sales</p>
									<h5 class="font-weight-bolder">
										$103,430
									</h5>
									<p class="mb-0">
										<span class="text-success font-weight-bolder text-sm">+5%</span> than last month
									</p>
								</div>
							</div>
							<div class="col-4 text-end">
								<div class="icon icon-shape bg-gradient-warning shadow-warning rounded-circle text-center">
									<i aria-hidden="true" class="ni ni-cart text-lg opacity-10"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-lg-7 mb-lg-0 mb-4">
				<div class="card z-index-2 h-100">
					<div class="card-header bg-transparent pb-0 pt-3">
						<h6 class="text-capitalize">Sales overview</h6>
						<p class="mb-0 text-sm">
							<i class="fa fa-arrow-up text-success"></i>
							<span class="font-weight-bold">4% more</span> in 2021
						</p>
					</div>
					<div class="card-body p-3">
						<div class="chart">
							<canvas class="chart-canvas" height="300" id="chart-line"></canvas>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="card card-carousel h-100 overflow-hidden p-0">
					<div class="carousel slide h-100" data-bs-ride="carousel" id="carouselExampleCaptions">
						<div class="carousel-inner border-radius-lg h-100">
							<div class="carousel-item h-100 active" style="background-image: url('{{ asset('/img/carousel-1.jpg') }}');
      background-size: cover;">
								<div class="carousel-caption d-none d-md-block bottom-0 start-0 ms-5 text-start">
									<div class="icon icon-shape icon-sm border-radius-md mb-3 bg-white text-center">
										<i class="ni ni-camera-compact text-dark opacity-10"></i>
									</div>
									<h5 class="mb-1 text-white">Get started with Argon</h5>
									<p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
								</div>
							</div>
							<div class="carousel-item h-100" style="background-image: url('{{ asset('/img/carousel-2.jpg') }}');
      background-size: cover;">
								<div class="carousel-caption d-none d-md-block bottom-0 start-0 ms-5 text-start">
									<div class="icon icon-shape icon-sm border-radius-md mb-3 bg-white text-center">
										<i class="ni ni-bulb-61 text-dark opacity-10"></i>
									</div>
									<h5 class="mb-1 text-white">Faster way to create web pages</h5>
									<p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
								</div>
							</div>
							<div class="carousel-item h-100" style="background-image: url('{{ asset('/img/carousel-3.jpg') }}');
      background-size: cover;">
								<div class="carousel-caption d-none d-md-block bottom-0 start-0 ms-5 text-start">
									<div class="icon icon-shape icon-sm border-radius-md mb-3 bg-white text-center">
										<i class="ni ni-trophy text-dark opacity-10"></i>
									</div>
									<h5 class="mb-1 text-white">Share with us your design tips!</h5>
									<p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
								</div>
							</div>
						</div>
						<button class="carousel-control-prev me-3 w-5" data-bs-slide="prev" data-bs-target="#carouselExampleCaptions" type="button">
							<span aria-hidden="true" class="carousel-control-prev-icon"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						<button class="carousel-control-next me-3 w-5" data-bs-slide="next" data-bs-target="#carouselExampleCaptions" type="button">
							<span aria-hidden="true" class="carousel-control-next-icon"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-4">
			<div class="col-lg-7 mb-lg-0 mb-4">
				<div class="card">
					<div class="card-header p-3 pb-0">
						<div class="d-flex justify-content-between">
							<h6 class="mb-2">Sales by Country</h6>
						</div>
					</div>
					<div class="table-responsive">
						<table class="align-items-center table">
							<tbody>
								<tr>
									<td class="w-30">
										<div class="d-flex align-items-center px-2 py-1">
											<div>
												<img alt="Country flag" src="{{ asset('/img/icons/flags/US.png') }}">
											</div>
											<div class="ms-4">
												<p class="font-weight-bold mb-0 text-xs">Country:</p>
												<h6 class="mb-0 text-sm">United States</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Sales:</p>
											<h6 class="mb-0 text-sm">2500</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Value:</p>
											<h6 class="mb-0 text-sm">$230,900</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="font-weight-bold mb-0 text-xs">Bounce:</p>
											<h6 class="mb-0 text-sm">29.9%</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td class="w-30">
										<div class="d-flex align-items-center px-2 py-1">
											<div>
												<img alt="Country flag" src="{{ asset('/img/icons/flags/DE.png') }}">
											</div>
											<div class="ms-4">
												<p class="font-weight-bold mb-0 text-xs">Country:</p>
												<h6 class="mb-0 text-sm">Germany</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Sales:</p>
											<h6 class="mb-0 text-sm">3.900</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Value:</p>
											<h6 class="mb-0 text-sm">$440,000</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="font-weight-bold mb-0 text-xs">Bounce:</p>
											<h6 class="mb-0 text-sm">40.22%</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td class="w-30">
										<div class="d-flex align-items-center px-2 py-1">
											<div>
												<img alt="Country flag" src="{{ asset('/img/icons/flags/GB.png') }}">
											</div>
											<div class="ms-4">
												<p class="font-weight-bold mb-0 text-xs">Country:</p>
												<h6 class="mb-0 text-sm">Great Britain</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Sales:</p>
											<h6 class="mb-0 text-sm">1.400</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Value:</p>
											<h6 class="mb-0 text-sm">$190,700</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="font-weight-bold mb-0 text-xs">Bounce:</p>
											<h6 class="mb-0 text-sm">23.44%</h6>
										</div>
									</td>
								</tr>
								<tr>
									<td class="w-30">
										<div class="d-flex align-items-center px-2 py-1">
											<div>
												<img alt="Country flag" src="{{ asset('/img/icons/flags/BR.png') }}">
											</div>
											<div class="ms-4">
												<p class="font-weight-bold mb-0 text-xs">Country:</p>
												<h6 class="mb-0 text-sm">Brasil</h6>
											</div>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Sales:</p>
											<h6 class="mb-0 text-sm">562</h6>
										</div>
									</td>
									<td>
										<div class="text-center">
											<p class="font-weight-bold mb-0 text-xs">Value:</p>
											<h6 class="mb-0 text-sm">$143,960</h6>
										</div>
									</td>
									<td class="align-middle text-sm">
										<div class="col text-center">
											<p class="font-weight-bold mb-0 text-xs">Bounce:</p>
											<h6 class="mb-0 text-sm">32.14%</h6>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="card">
					<div class="card-header p-3 pb-0">
						<h6 class="mb-0">Categories</h6>
					</div>
					<div class="card-body p-3">
						<ul class="list-group">
							<li class="list-group-item d-flex justify-content-between border-radius-lg mb-2 border-0 ps-0">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm bg-gradient-dark me-3 text-center shadow">
										<i class="ni ni-mobile-button text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="text-dark mb-1 text-sm">Devices</h6>
										<span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i aria-hidden="true" class="ni ni-bold-right"></i></button>
								</div>
							</li>
							<li class="list-group-item d-flex justify-content-between border-radius-lg mb-2 border-0 ps-0">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm bg-gradient-dark me-3 text-center shadow">
										<i class="ni ni-tag text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="text-dark mb-1 text-sm">Tickets</h6>
										<span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i aria-hidden="true" class="ni ni-bold-right"></i></button>
								</div>
							</li>
							<li class="list-group-item d-flex justify-content-between border-radius-lg mb-2 border-0 ps-0">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm bg-gradient-dark me-3 text-center shadow">
										<i class="ni ni-box-2 text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="text-dark mb-1 text-sm">Error logs</h6>
										<span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i aria-hidden="true" class="ni ni-bold-right"></i></button>
								</div>
							</li>
							<li class="list-group-item d-flex justify-content-between border-radius-lg border-0 ps-0">
								<div class="d-flex align-items-center">
									<div class="icon icon-shape icon-sm bg-gradient-dark me-3 text-center shadow">
										<i class="ni ni-satisfied text-white opacity-10"></i>
									</div>
									<div class="d-flex flex-column">
										<h6 class="text-dark mb-1 text-sm">Happy users</h6>
										<span class="font-weight-bold text-xs">+ 430</span>
									</div>
								</div>
								<div class="d-flex">
									<button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i aria-hidden="true" class="ni ni-bold-right"></i></button>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<footer class="footer pt-3">
			<div class="container-fluid">
				<div class="row align-items-center justify-content-lg-between">
					<div class="col-lg-6 mb-lg-0 mb-4">
						<div class="copyright text-muted text-lg-start text-center text-sm">
							©
							<script>
								document.write(new Date().getFullYear())
							</script>,
							made with <i class="fa fa-heart"></i> by
							<a class="font-weight-bold" href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
							for a better web.
						</div>
					</div>
					<div class="col-lg-6">
						<ul class="nav nav-footer justify-content-center justify-content-lg-end">
							<li class="nav-item">
								<a class="nav-link text-muted" href="https://www.creative-tim.com" target="_blank">Creative Tim</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-muted" href="https://www.creative-tim.com/presentation" target="_blank">About Us</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-muted" href="https://www.creative-tim.com/blog" target="_blank">Blog</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-muted pe-0" href="https://www.creative-tim.com/license" target="_blank">License</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</div>
@endsection

@section('script')
@endsection
