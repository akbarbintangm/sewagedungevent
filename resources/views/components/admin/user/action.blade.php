<button class="btn btn-outline-primary btn-sm mb-0" data-bs-target="#detailModal" data-bs-toggle="modal" data-id="{{ $id }}" id="detailButton" onclick="getDetailUser({{ $id }})" type="button">Details</button>
@if ($status === 0)
	<button class="btn btn-success btn-sm mb-0" data-id="{{ $id }}" onclick="verifyUser({{ $id }})" type="button">Verifikasi</button>
@else
	<button class="btn btn-warning btn-sm mb-0" data-id="{{ $id }}" onclick="unverifyUser({{ $id }})" type="button">Batal Verifikasi</button>
@endif
<button class="btn btn-danger btn-sm mb-0" data-id="{{ $id }}" onclick="deleteUser({{ $id }})" type="button">Hapus</button>
