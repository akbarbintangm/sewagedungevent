<a class="btn btn-outline-primary btn-sm mb-0" href="{{ route('detailPageBuilding:admin', ['id' => $id]) }}" type="button">Details</a>
@if (Auth::user()->type_user !== 'PEMILIK_GEDUNG')
	<button class="btn btn-outline-success btn-sm mb-0" data-id="{{ $id }}" onclick="verifyRoom({{ $id }})" type="button">Verifikasi</button>
@endif
<button class="btn btn-outline-danger btn-sm mb-0" data-id="{{ $id }}" onclick="deleteRoom({{ $id }})" type="button">Hapus</button>
