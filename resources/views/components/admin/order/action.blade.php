{{-- <button class="btn btn-outline-primary btn-sm mb-0" type="button">Details</button> --}}
@if ($status_order === 1)
	<button class="btn btn-outline-warning btn-sm btn-disabled mb-0" disabled type="button">Belum Bayar</button>
@endif
@if ($status_order === 2)
	<button class="btn btn-success btn-sm mb-0" data-id="{{ $id }}" onclick="verifyOrder({{ $id }})" type="button">Validasi</button>
@endif
