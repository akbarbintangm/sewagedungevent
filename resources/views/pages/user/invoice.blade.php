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
	<h4>Kode Transaksi: {{ $data->code }}</h4>
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
				<tr>
					<td>{{ $data->code }}</td>
					<td>{{ $data->building_name }}</td>
					<td>{{ $data->date_start }}</td>
					<td>Rp. {{ $data->total_pay }}</td>
					<td>
						@if ($data->status_order === 0)
							Belum Booking / Booking Dibatalkan
						@elseif ($data->status_order === 1)
							Sudah Booking, Belum Bayar/Transfer
						@elseif ($data->status_order === 2)
							Sudah Booking dan Bayar Transfer, Menunggu Konfirmasi
						@elseif ($data->status_order === 3)
							Booking Terkonfirmasi
						@endif
					</td>
					<td>
						@if ($data->status_transaction === 0)
							Belum Transfer
						@elseif ($data->status_transaction === 1)
							Sudah Transfer
						@elseif ($data->status_transaction === 2)
							Sudah Kadaluarsa / Tanggal Booking Berakhir
						@endif
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

</html>
