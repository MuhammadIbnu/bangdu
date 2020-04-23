<html>
<head>
	<title>Laporan</title>
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Daftar Pengesahan Bantuan Uang Duka Kota Tegal</h4>
	</center>
 
	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Telepon</th>
                <th>Pekerjaan</th>
                <th>Petugas</th>
			</tr>
		</thead>
		<tbody>
			@foreach($report_data as $row)
			<tr>
				<td>{{$loop->iteration + ($report_data->perPage() *($report_data->currentPage()-1))}}</td>
				<td>{{$row->waris->nik}}</td>
				<td>{{$p->waris->kk}}</td>
				<td>{{$p->waris->nama}}</td>
				<td>{{$row->updated_at->format('d/m/Y')}}</td>
				<td>@if ($row->confirmed_III == 1)<p>sukses</p>   
                    @endif</td>
                <td>{{$row->kd_petugas->nama}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    {{$report_data->appends(Request::All())->links()}}
</body>
</html>