@extends('layouts.user.app')

@section('title')
	Cari Ruangan
@endsection

@section('meta-link')
@endsection

@section('content')
	@if (Auth::check())
		<form action="{{ route('buildingPage:user') }}" class="container-fluid mb-9" enctype="multipart/form-data" id="searchRoom" method="GET">
		@else
			<form action="{{ route('buildingWithoutLoginPage:user') }}" class="container-fluid mb-9" enctype="multipart/form-data" id="searchRoom" method="GET">
	@endif
	<div class="row mt-5">
		<div class="col-2">
			<div class="card">
				<div class="card-header">
					Filter
				</div>
				<div class="card-body">
					<h6 class="card-title">Harga</h6>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input class="form-control" id="priceStart" name="price_start" placeholder="Harga awal" type="number" value="{{ request()->get('price_start') }}">
					</div>
					<div class="input-group mb-4">
						<div class="input-group-prepend">
							<span class="input-group-text">Rp.</span>
						</div>
						<input class="form-control" id="priceEnd" name="price_end" placeholder="Harga akhir" type="number" value="{{ request()->get('price_end') }}">
					</div>
					<h6 class="card-title mt-3">Urutkan</h6>
					<div class="form-group">
						<div class="custom-control custom-checkbox">
							<input {{ request()->get('name_sort') === 'ASC' ? 'checked' : '' }} class="custom-control-input" id="nameASC" name="name_sort" type="checkbox" value="ASC">
							<label class="custom-control-label font-weight-bold" for="nameASC">Nama paling awal</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input {{ request()->get('name_sort') === 'DESC' ? 'checked' : '' }} class="custom-control-input" id="nameDESC" name="name_sort" type="checkbox" value="DESC">
							<label class="custom-control-label font-weight-bold" for="nameDESC">Nama paling akhir</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input {{ request()->get('price_sort') === 'ASC' ? 'checked' : '' }} class="custom-control-input" id="priceASC" name="price_sort" type="checkbox" value="ASC">
							<label class="custom-control-label font-weight-bold" for="priceASC">Harga paling murah</label>
						</div>
						<div class="custom-control custom-checkbox">
							<input {{ request()->get('price_sort') === 'DESC' ? 'checked' : '' }} class="custom-control-input" id="priceDESC" name="price_sort" type="checkbox" value="DESC">
							<label class="custom-control-label font-weight-bold" for="priceDESC">Harga paling mahal</label>
						</div>
					</div>
				</div>
				<button class="btn btn-primary btn-block" id="resetFilterButton" onclick="resetFilter()" type="button">Reset Filter</button>
			</div>
		</div>
		<div class="col-10">
			<div class="row">
				<div class="col">
					<div class="input-group mb-4">
						<input class="form-control" id="buildingName" name="name" placeholder="Cari Nama Ruangan ataupun Nama/Email Owner" type="text" value="{{ request()->get('name') }}">
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">Cari</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col">
					<span class="font-weight-small">Menampilkan Total {{ $getCountData }} Hasil Ruangan.</span>
				</div>
			</div>
			<div class="row">
				@foreach ($data as $key => $item)
					<div class="col-md-3 mb-3">
						<div class="card">
							<img alt="{{ $item->picture_1 }}" id="{{ $item->picture_1 }}" src="{{ asset('rooms/' . $item->owner_email . '/' . $item->name . '/' . $item->picture_1) }}">
							<div class="card-body">
								<h5 class="card-title text-center">{{ $item->name }}</h5>
								<p class="card-text">{{ Str::limit($item->description, 45, '...') }}</p>
								<p class="card-text"><b>Harga: Rp. {{ number_format($item->price, 0, ',', '.') }}</b></p>
								<div class="d-flex justify-content-center">
									@if (Auth::check())
										<a class="btn btn-primary" href="{{ route('buildingDetailPage:user', ['id' => $item->id]) }}">Booking</a>
									@else
										<a class="btn btn-primary" href="{{ route('buildingDetailWithoutLoginPage:user', ['id' => $item->id]) }}">Booking</a>
									@endif
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	</form>
@endsection

@section('script')
	<script>
		showLoadingNotification();

		const formForSearch = document.getElementById('searchRoom');

		const priceStartInput = document.getElementById('priceStart');
		const priceEndInput = document.getElementById('priceEnd');
		const nameASCCheckbox = document.getElementById('nameASC');
		const nameDESCCheckbox = document.getElementById('nameDESC');
		const priceASCCheckbox = document.getElementById('priceASC');
		const priceDESCCheckbox = document.getElementById('priceDESC');
		const nameSearch = document.getElementById('buildingName');

		function resetInputs() {
			priceStartInput.value = '';
			priceEndInput.value = '';
			nameASCCheckbox.checked = false;
			nameDESCCheckbox.checked = false;
			priceASCCheckbox.checked = false;
			priceDESCCheckbox.checked = false;
		}

		async function resetFilter() {
			const resetFilter = await showNotification('Reset Filter?', 'Filter yang akan direset: Rentang Harga dan Urutan nama atau harga.', 'info');
			if (resetFilter.isConfirmed) {
				resetInputs();
				showLoadingNotification();
				formForSearch.submit();
			}
		}

		nameASCCheckbox.addEventListener('change', function() {
			if (this.checked) {
				nameDESCCheckbox.checked = false;
			}
		});

		nameDESCCheckbox.addEventListener('change', function() {
			if (this.checked) {
				nameASCCheckbox.checked = false;
			}
		});

		priceASCCheckbox.addEventListener('change', function() {
			if (this.checked) {
				priceDESCCheckbox.checked = false;
			}
		});

		priceDESCCheckbox.addEventListener('change', function() {
			if (this.checked) {
				priceASCCheckbox.checked = false;
			}
		});

		document.addEventListener('DOMContentLoaded', (event) => {
			let typingTimer;
			nameSearch.addEventListener('input', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
			priceStartInput.addEventListener('input', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
			priceEndInput.addEventListener('input', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
			nameASCCheckbox.addEventListener('change', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
			nameDESCCheckbox.addEventListener('change', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
			priceASCCheckbox.addEventListener('change', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
			priceDESCCheckbox.addEventListener('change', () => {
				clearTimeout(typingTimer);
				typingTimer = setTimeout(() => {
					showLoadingNotification();
					formForSearch.submit();
				}, 500);
			});
		});

		$(document).ready(function() {
			hideLoadingNotification();
			var input = $('#buildingName');
			var inputVal = input.val();
			input.focus().val('').val(inputVal);
		});
	</script>
@endsection
