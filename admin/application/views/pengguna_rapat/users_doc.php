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
        <h2>Users List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Lengkap</th>
		<th>Unit Kerja</th>
		<th>No Telp</th>
		
            </tr><?php
            foreach ($pengguna_rapat_data as $pengguna_rapat)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $pengguna_rapat->nama_lengkap ?></td>
		      <td><?php echo $pengguna_rapat->unit_kerja ?></td>
		      <td><?php echo $pengguna_rapat->no_telp ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>