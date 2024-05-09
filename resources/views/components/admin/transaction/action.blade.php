<button class="btn btn-outline-primary btn-sm mb-0" data-bs-target="#detailModal" data-bs-toggle="modal" data-id="{{ $id }}" id="detailButton" onclick="getDetailTransaction({{ $id }})" type="button">Details</button>
@if ($status_order === 1 && $status_transaction === 0)
	<button class="btn btn-outline-warning btn-sm btn-disabled mb-0" disabled type="button">Belum Bayar</button>
@elseif ($status_order === 2 && $status_transaction === 0)
	<button class="btn btn-success btn-sm mb-0" data-id="{{ $id }}" onclick="verifyOrder({{ $id }})" type="button">Validasi</button>
@elseif ($status_order === 3 && $status_transaction === 1)
	<button class="btn btn-success btn-sm mb-0" data-id="{{ $id }}" onclick="verifyTransaction({{ $id }})" type="button">Konfirmasi</button>
@elseif ($status_order === 0 && $status_transaction === 0)
	<button class="btn btn-waning btn-sm btn-disabled mb-0" disabled type="button">Dibatalkan</button>
@else
@endif
