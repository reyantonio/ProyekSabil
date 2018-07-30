<html>
<head>
	<title>IMPORT EXCEL CI 3</title>
</head>
<body>
	<h1>Data Siswa</h1><hr>
	<a href="<?php echo base_url("spv/siswa/form"); ?>">Import Data</a><br><br>

	<table border="1" cellpadding="8">
	<tr>
		<th>NIK</th>
		<th>Tgl Absen</th>
		<th>Ref</th>
	</tr>

	<?php
	if( ! empty($siswa)){ // Jika data pada database tidak sama dengan empty (alias ada datanya)
		foreach($siswa as $data){ // Lakukan looping pada variabel siswa dari controller
			echo "<tr>";
			echo "<td>".$data->nik."</td>";
			echo "<td>".$data->tgl_absen."</td>";
			echo "<td>".$data->ref."</td>";
			echo "</tr>";
		}
	}else{ // Jika data tidak ada
		echo "<tr><td colspan='4'>Data tidak ada</td></tr>";
	}
	?>
	</table>
</body>
</html>
