<?php 

require __DIR__.'/library/config.php';

$id = $_GET['id'];

$detailRapat = "SELECT * FROM jadwal_rapat WHERE id = $id";

$resultRapat = mysqli_query($koneksi, $detailRapat) or die (mysqli_error());

$row = $resultRapat->fetch_object();

?>

<table>
	<tr>
		<td>Judul</td>
		<td>:</td>
		<td><?=$row->judul_rapat;?></td>
	</tr>
	<tr>
		<td>Jadwal Rapat</td>
		<td>:</td>
		<td><?=substr($row->tgl_mulai,0,15)." - ".substr($row->tgl_selesai,11,5) ." WIB";?></td>
	</tr>
	<tr>
		<td>Deskripsi Rapat</td>
		<td>:</td>
		<td><?=$row->deskripsi_rapat;?></td>
	</tr>
	<tr>
		<td>Pimpinan Rapat</td>
		<td>:</td>
		<td><?=$row->pimpinan_rapat;?></td>
	</tr>
	<tr>
		<td>Peserta Rapat</td>
		<td>:</td>
		<td><?=$row->peserta_rapat;?></td>
	</tr>
	<tr>
		<td>Kontak Person</td>
		<td>:</td>
		<td><?=$row->kontak_person;?></td>
	</tr>
</table>

