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
        <h2 style="margin-top:0px">Ruangan Read</h2>
        <table class="table">
	    <tr><td>Nama Ruang</td><td><?php echo $nama_ruang; ?></td></tr>
	    <tr><td>Lokasi</td><td><?php echo $lokasi; ?></td></tr>
	    <tr><td>Kapasitas</td><td><?php echo $kapasitas; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('ruangan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>