<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Rekap Guru</title>
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
		<h2>Rekap Guru Tahun {{ now()->format('Y') }}</h2>
	</div>
	<table class="table" border="1">
		<thead>
			<tr>
				<th rowspan="2">
					No.
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
			<tr>
				<td>
					
				</td>
				<td>
					{{ $guru_laki_laki }}
				</td>
				<td>
					{{ $guru_perempuan }}
				</td>
				<td>
				</td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td>
					Jumlah
				</td>
				<td colspan="3">
					{{ $guru }}
				</td>
			</tr>
		</tfoot>
	</table>
</body>
</html>