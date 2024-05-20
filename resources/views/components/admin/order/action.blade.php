<button class="btn btn-outline-primary btn-sm mb-0" data-bs-target="#detailModal" data-bs-toggle="modal" data-id="{{ $id }}" id="detailButton" onclick="getDetailTransaction({{ $id }})" type="button">Details</button>
@if ($status_order === 1)
	<button class="btn btn-outline-warning btn-sm btn-disabled mb-0" disabled type="button">Belum Bayar</button>
@elseif ($status_order === 0)
	<button class="btn btn-outline-danger btn-sm btn-disabled mb-0" disabled type="button">Dibatalkan</button>
@endif
@if ($status_order === 2)
	<button class="btn btn-success btn-sm mb-0" data-id="{{ $id }}" onclick="verifyOrder({{ $id }})" type="button">Validasi</button>
	<button class="btn btn-warning btn-sm mb-0" data-id="{{ $id }}" onclick="cancelOrder({{ $id }})" type="button">Batalkan</button>
@endif
