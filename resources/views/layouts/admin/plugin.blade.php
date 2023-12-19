<div class="fixed-plugin">
		<a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
			<i class="fa fa-cog py-2"> </i>
		</a>
		<div class="card shadow-lg">
			<div class="card-header pb-0 pt-3">
				<div class="float-start">
					<h5 class="mb-0 mt-3">Argon Configurator</h5>
					<p>See our dashboard options.</p>
				</div>
				<div class="float-end mt-4">
					<button class="btn btn-link text-dark fixed-plugin-close-button p-0">
						<i class="fa fa-close"></i>
					</button>
				</div>
				<!-- End Toggle Button -->
			</div>
			<hr class="horizontal dark my-1">
			<div class="card-body pt-sm-3 overflow-auto pt-0">
				<!-- Sidebar Backgrounds -->
				<div>
					<h6 class="mb-0">Sidebar Colors</h6>
				</div>
				<a class="switch-trigger background-color" href="javascript:void(0)">
					<div class="badge-colors my-2 text-start">
						<span class="badge bg-gradient-primary active filter" data-color="primary" onclick="sidebarColor(this)"></span>
						<span class="badge bg-gradient-dark filter" data-color="dark" onclick="sidebarColor(this)"></span>
						<span class="badge bg-gradient-info filter" data-color="info" onclick="sidebarColor(this)"></span>
						<span class="badge bg-gradient-success filter" data-color="success" onclick="sidebarColor(this)"></span>
						<span class="badge bg-gradient-warning filter" data-color="warning" onclick="sidebarColor(this)"></span>
						<span class="badge bg-gradient-danger filter" data-color="danger" onclick="sidebarColor(this)"></span>
					</div>
				</a>
				<!-- Sidenav Type -->
				<div class="mt-3">
					<h6 class="mb-0">Sidenav Type</h6>
					<p class="text-sm">Choose between 2 different sidenav types.</p>
				</div>
				<div class="d-flex">
					<button class="btn bg-gradient-primary w-100 active mb-2 me-2 px-3" data-class="bg-white" onclick="sidebarType(this)">White</button>
					<button class="btn bg-gradient-primary w-100 mb-2 px-3" data-class="bg-default" onclick="sidebarType(this)">Dark</button>
				</div>
				<p class="d-xl-none d-block mt-2 text-sm">You can change the sidenav type just on desktop view.</p>
				<!-- Navbar Fixed -->
				<div class="d-flex my-3">
					<h6 class="mb-0">Navbar Fixed</h6>
					<div class="form-check form-switch my-auto ms-auto ps-0">
						<input class="form-check-input ms-auto mt-1" id="navbarFixed" onclick="navbarFixed(this)" type="checkbox">
					</div>
				</div>
				<hr class="horizontal my-sm-4 dark">
				<div class="d-flex mb-5 mt-2">
					<h6 class="mb-0">Light / Dark</h6>
					<div class="form-check form-switch my-auto ms-auto ps-0">
						<input class="form-check-input ms-auto mt-1" id="dark-version" onclick="darkMode(this)" type="checkbox">
					</div>
				</div>
				<a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free Download</a>
				<a class="btn btn-outline-dark w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View documentation</a>
				<div class="w-100 text-center">
					<a aria-label="Star creativetimofficial/argon-dashboard on GitHub" class="github-button" data-icon="octicon-star" data-show-count="true" data-size="large" href="https://github.com/creativetimofficial/argon-dashboard">Star</a>
					<h6 class="mt-3">Thank you for sharing!</h6>
					<a class="btn btn-dark mb-0 me-2" href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard" target="_blank">
						<i aria-hidden="true" class="fab fa-twitter me-1"></i> Tweet
					</a>
					<a class="btn btn-dark mb-0 me-2" href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard" target="_blank">
						<i aria-hidden="true" class="fab fa-facebook-square me-1"></i> Share
					</a>
				</div>
			</div>
		</div>
	</div>
