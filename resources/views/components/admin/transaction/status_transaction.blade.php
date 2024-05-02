@if ($status_order === 1 && $status_transaction === 0)
	<span class="badge badge-sm bg-gradient-warning">Belum Bayar</span>
@elseif ($status_order === 2 && $status_transaction === 0)
	<span class="badge badge-sm bg-gradient-warning">Diproses</span>
@elseif ($status_order === 3 && $status_transaction === 1)
	<span class="badge badge-sm bg-gradient-success">Lunas</span>
@elseif ($status_order === 0 && $status_transaction === 0)
	<span class="badge badge-sm bg-gradient-danger">Dibatalkan</span>
@else
	<span class="badge badge-sm bg-gradient-info">Belum ada info</span>
@endif
