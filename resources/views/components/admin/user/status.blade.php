@if ($status === 1)
	<span class="badge badge-sm bg-gradient-success">Terverifikasi</span>
@elseif ($status === 0)
	<span class="badge badge-sm bg-gradient-warning">Belum Verifikasi</span>
@else
	<span class="badge badge-sm bg-gradient-danger">Belum Diketahui</span>
@endif
