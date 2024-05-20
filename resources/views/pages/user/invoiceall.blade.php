<!DOCTYPE html>
<html>

<head>
	<title>Semua Invoice {{ $userName }}</title>
</head>

<style>
	/* taruh css disini, kkkalau sudah, hapus saja comment ini */
</style>

<body>
	<h1>Semua Invoice {{ $userName }}</h1>
	<div class="">
		<table border="1" class="" style="width: 100%;">
			<thead class="">
				<tr>
					<th>Code</th>
					<th>Nama Ruangan</th>
					<th>Date Booking</th>
					<th>Total Bayar</th>
					<th>Status Order</th>
					<th>Status Transaksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($data as $item)
					<tr>
						<td>{{ $item->code }}</td>
						<td>{{ $item->building_name }}</td>
						<td>{{ $item->date_start }}</td>
						<td>Rp. {{ $item->total_pay }}</td>
						<td>
							@if ($item->status_order === 0)
								Belum Booking / Booking Dibatalkan
							@elseif ($item->status_order === 1)
								Sudah Booking, Belum Bayar/Transfer
							@elseif ($item->status_order === 2)
								Sudah Booking dan Bayar Transfer, Menunggu Konfirmasi
							@elseif ($item->status_order === 3)
								Booking Terkonfirmasi
							@endif
						</td>
						<td>
							@if ($item->status_transaction === 0)
								Belum Transfer
							@elseif ($item->status_transaction === 1)
								Sudah Transfer
							@elseif ($item->status_transaction === 2)
								Sudah Kadaluarsa / Tanggal Booking Berakhir
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</body>

</html>
