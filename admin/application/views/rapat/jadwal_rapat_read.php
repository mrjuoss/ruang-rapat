<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Jadwal_rapat Read</h2>
        <table class="table">
	    <tr><td>Id Ruang</td><td><?php echo $id_ruang; ?></td></tr>
	    <tr><td>Id Pengguna</td><td><?php echo $id_pengguna; ?></td></tr>
	    <tr><td>Tgl Usul</td><td><?php echo $tgl_usul; ?></td></tr>
	    <tr><td>Tgl Mulai</td><td><?php echo $tgl_mulai; ?></td></tr>
	    <tr><td>Tgl Selesai</td><td><?php echo $tgl_selesai; ?></td></tr>
	    <tr><td>Judul Rapat</td><td><?php echo $judul_rapat; ?></td></tr>
	    <tr><td>Deskripsi Rapat</td><td><?php echo $deskripsi_rapat; ?></td></tr>
	    <tr><td>Pimpinan Rapat</td><td><?php echo $pimpinan_rapat; ?></td></tr>
	    <tr><td>Peserta Rapat</td><td><?php echo $peserta_rapat; ?></td></tr>
	    <tr><td>File Permohonan</td><td><?php echo $file_permohonan; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('rapat') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>