<style>
.str{
	mso-number-format : \@;
}
</style>

<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data tracer.xls");
?>

<table border="1">
	<tr>
		<th>No</th>
		<th>NIA</th>
		<th>Nama</th>
		<th>Jelaskan status Anda saat ini</th>
		<th>Dalam berapa bulan anda mendapatkan pekerjaan / Berapa bulan waktu untuk mendapatkan pekerjaan pertama ? </th>
		<th>Berapa rata-rata penghasilan Anda per bulan ?</th>
		<th>Kategori tempat bekerja</th>
		<th>Apa tingkat tempat kerja Anda</th>
		<th>Kesesuaian bidang kerja dengan kompetensi bidang studi yang ditamatkan</th>
	</tr>
	<?php $i=1; foreach ($data as $x): ?>
	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $x->nisn; ?></td>
		<td><?php echo $x->nama_alumni; ?></td>
		<td><?php echo $x->p1; ?></td>
		<td><?php echo $x->p2; ?></td>
		<td><?php echo $x->p3; ?></td>
		<td><?php echo $x->p4; ?></td>
		<td><?php echo $x->p5; ?></td>
		<td><?php echo $x->p6; ?></td>
	</tr>
	<?php endforeach; ?>
</table>