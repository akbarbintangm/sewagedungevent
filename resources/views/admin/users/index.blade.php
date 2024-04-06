@extends('layouts.admin.app')

@section('title')
	Daftar User
@endsection

@section('pageName')
	User
@endsection

@section('subPageName')
	List
@endsection

@section('meta-link')
@endsection

@section('content')
	<div class="container-fluid py-4">
		<div class="row">
			<div class="col-12">
				<div class="card mb-4">
					<div class="card-header pb-0">
						<h6>Authors table</h6>
					</div>
					<div class="card-body px-0 pb-2 pt-0">
						<div class="table-responsive p-0">
							<table class="align-items-center mb-0 table">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-xs">Author</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 ps-2 text-xs">Function</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Status</th>
										<th class="text-uppercase text-secondary font-weight-bolder opacity-7 text-center text-xs">Employed</th>
										<th class="text-secondary opacity-7"></th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img alt="user1" class="avatar avatar-sm me-3" src="../assets/img/team-2.jpg">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm">John Michael</h6>
													<p class="text-secondary mb-0 text-xs">john@creative-tim.com</p>
												</div>
											</div>
										</td>
										<td>
											<p class="font-weight-bold mb-0 text-xs">Manager</p>
											<p class="text-secondary mb-0 text-xs">Organization</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-success">Online</span>
										</td>
										<td class="text-center align-middle">
											<span class="text-secondary font-weight-bold text-xs">23/04/18</span>
										</td>
										<td class="align-middle">
											<a class="text-secondary font-weight-bold text-xs" data-original-title="Edit user" data-toggle="tooltip" href="javascript:;">
												Edit
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img alt="user2" class="avatar avatar-sm me-3" src="../assets/img/team-3.jpg">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm">Alexa Liras</h6>
													<p class="text-secondary mb-0 text-xs">alexa@creative-tim.com</p>
												</div>
											</div>
										</td>
										<td>
											<p class="font-weight-bold mb-0 text-xs">Programator</p>
											<p class="text-secondary mb-0 text-xs">Developer</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-secondary">Offline</span>
										</td>
										<td class="text-center align-middle">
											<span class="text-secondary font-weight-bold text-xs">11/01/19</span>
										</td>
										<td class="align-middle">
											<a class="text-secondary font-weight-bold text-xs" data-original-title="Edit user" data-toggle="tooltip" href="javascript:;">
												Edit
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img alt="user3" class="avatar avatar-sm me-3" src="../assets/img/team-4.jpg">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm">Laurent Perrier</h6>
													<p class="text-secondary mb-0 text-xs">laurent@creative-tim.com</p>
												</div>
											</div>
										</td>
										<td>
											<p class="font-weight-bold mb-0 text-xs">Executive</p>
											<p class="text-secondary mb-0 text-xs">Projects</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-success">Online</span>
										</td>
										<td class="text-center align-middle">
											<span class="text-secondary font-weight-bold text-xs">19/09/17</span>
										</td>
										<td class="align-middle">
											<a class="text-secondary font-weight-bold text-xs" data-original-title="Edit user" data-toggle="tooltip" href="javascript:;">
												Edit
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img alt="user4" class="avatar avatar-sm me-3" src="../assets/img/team-3.jpg">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm">Michael Levi</h6>
													<p class="text-secondary mb-0 text-xs">michael@creative-tim.com</p>
												</div>
											</div>
										</td>
										<td>
											<p class="font-weight-bold mb-0 text-xs">Programator</p>
											<p class="text-secondary mb-0 text-xs">Developer</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-success">Online</span>
										</td>
										<td class="text-center align-middle">
											<span class="text-secondary font-weight-bold text-xs">24/12/08</span>
										</td>
										<td class="align-middle">
											<a class="text-secondary font-weight-bold text-xs" data-original-title="Edit user" data-toggle="tooltip" href="javascript:;">
												Edit
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img alt="user5" class="avatar avatar-sm me-3" src="../assets/img/team-2.jpg">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm">Richard Gran</h6>
													<p class="text-secondary mb-0 text-xs">richard@creative-tim.com</p>
												</div>
											</div>
										</td>
										<td>
											<p class="font-weight-bold mb-0 text-xs">Manager</p>
											<p class="text-secondary mb-0 text-xs">Executive</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-secondary">Offline</span>
										</td>
										<td class="text-center align-middle">
											<span class="text-secondary font-weight-bold text-xs">04/10/21</span>
										</td>
										<td class="align-middle">
											<a class="text-secondary font-weight-bold text-xs" data-original-title="Edit user" data-toggle="tooltip" href="javascript:;">
												Edit
											</a>
										</td>
									</tr>
									<tr>
										<td>
											<div class="d-flex px-2 py-1">
												<div>
													<img alt="user6" class="avatar avatar-sm me-3" src="../assets/img/team-4.jpg">
												</div>
												<div class="d-flex flex-column justify-content-center">
													<h6 class="mb-0 text-sm">Miriam Eric</h6>
													<p class="text-secondary mb-0 text-xs">miriam@creative-tim.com</p>
												</div>
											</div>
										</td>
										<td>
											<p class="font-weight-bold mb-0 text-xs">Programtor</p>
											<p class="text-secondary mb-0 text-xs">Developer</p>
										</td>
										<td class="text-center align-middle text-sm">
											<span class="badge badge-sm bg-gradient-secondary">Offline</span>
										</td>
										<td class="text-center align-middle">
											<span class="text-secondary font-weight-bold text-xs">14/09/20</span>
										</td>
										<td class="align-middle">
											<a class="text-secondary font-weight-bold text-xs" data-original-title="Edit user" data-toggle="tooltip" href="javascript:;">
												Edit
											</a>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		@include('layouts.admin.footer')
	</div>
@endsection

@section('script')
@endsection
