<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Jadwal_rapat List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Ruang</th>
		<th>Id Pengguna</th>
		<th>Tgl Usul</th>
		<th>Tgl Mulai</th>
		<th>Tgl Selesai</th>
		<th>Judul Rapat</th>
		<th>Deskripsi Rapat</th>
		<th>Pimpinan Rapat</th>
		<th>Peserta Rapat</th>
		<th>File Permohonan</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($rapat_data as $rapat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $rapat->id_ruang ?></td>
		      <td><?php echo $rapat->id_pengguna ?></td>
		      <td><?php echo $rapat->tgl_usul ?></td>
		      <td><?php echo $rapat->tgl_mulai ?></td>
		      <td><?php echo $rapat->tgl_selesai ?></td>
		      <td><?php echo $rapat->judul_rapat ?></td>
		      <td><?php echo $rapat->deskripsi_rapat ?></td>
		      <td><?php echo $rapat->pimpinan_rapat ?></td>
		      <td><?php echo $rapat->peserta_rapat ?></td>
		      <td><?php echo $rapat->file_permohonan ?></td>
		      <td><?php echo $rapat->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>