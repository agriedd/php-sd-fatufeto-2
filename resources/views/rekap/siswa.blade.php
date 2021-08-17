<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rekap Siswa</title>
	<style>
		.table{
			width: 100%;
			border-collapse: collapse;
			border: 1px solid #000;
			font-family: 'Courier New', Courier, monospace;
			font-size: 90%;
		}
		.table th,
		.table td{
			padding: 1rem;
			border-bottom: 1px solid #000;
		}
		tfoot td{
			background: yellow
		}
	</style>
</head>
<body>
	<div class="padding: 2rem">
		<h2>Rekap Siswa Tahun {{ now()->format('Y') }}</h2>
	</div>
	<table class="table" border="1">
		<thead>
			<tr>
				<th rowspan="2">
					No.
				</th>
				<th rowspan="2">
					Kelas
				</th>
				<th colspan="2">
					Jumlah
				</th>
				<th rowspan="">
					Ket.
				</th>
			</tr>
			<tr>
				<th>
					Laki-laki
				</th>
				<th>
					Perempuan
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($kelas_list as $key => $kelas)
				<tr>
					<td>
						{{ $key+1 }}
					</td>
					<td>
						{{ $kelas->nama }}
					</td>
					<td>
						{{ $kelas->siswa_laki_laki_count }}
					</td>
					<td>
						{{ $kelas->siswa_perempuan_count }}
					</td>
					<td>
						{{ $kelas->keterangan }}
					</td>
				</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2">
					Jumlah
				</td>
				<td>
					{{ $kelas_list->sum('siswa_laki_laki_count') }}
				</td>
				<td>
					{{ $kelas_list->sum('siswa_perempuan_count') }}
				</td>
				<td>
					{{ $kelas_list->sum('siswa_count') }}
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>