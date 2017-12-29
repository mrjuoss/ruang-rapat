<div class="content-wrapper">

    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA JADWAL_RAPAT</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">

<table class='table table-bordered>'

	    <tr>
        <td width='200'>Ruang <?php echo form_error('id_ruang') ?></td>
        <td>
          <?php echo cmb_dinamis('id_ruang', 'ruangan', 'nama_ruang', 'id_ruangan', $id_ruang); ?>
          <!--
          <input type="text" class="form-control" name="id_ruang" id="id_ruang" placeholder="Id Ruang" value="<?php echo $id_ruang; ?>" /> -->
        </td>
      </tr>
	    <tr>
        <td width='200'>Pengguna <?php echo form_error('id_pengguna') ?></td>
        <td>
          <?php echo cmb_dinamis('id_pengguna', 'users', 'unit_kerja', 'id_pengguna', $id_pengguna); ?>
          <!--
          <input type="text" class="form-control" name="id_pengguna" id="id_pengguna" placeholder="Id Pengguna" value="<?php echo $id_pengguna; ?>" /> -->
        </td>
      </tr>
	    <tr><td width='200'>Tgl Usul <?php echo form_error('tgl_usul') ?></td><td><input type="datetime-local" class="form-control" name="tgl_usul" id="tgl_usul" placeholder="Tgl Usul" value="<?php echo $tgl_usul; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Mulai <?php echo form_error('tgl_mulai') ?></td><td><input type="datetime-local" class="form-control" name="tgl_mulai" id="tgl_mulai" placeholder="Tgl Mulai" value="<?php echo $tgl_mulai; ?>" /></td></tr>
	    <tr><td width='200'>Tgl Selesai <?php echo form_error('tgl_selesai') ?></td><td><input type="datetime-local" class="form-control" name="tgl_selesai" id="tgl_selesai" placeholder="Tgl Selesai" value="<?php echo $tgl_selesai; ?>" /></td></tr>
	    <tr><td width='200'>Judul Rapat <?php echo form_error('judul_rapat') ?></td><td><input type="text" class="form-control" name="judul_rapat" id="judul_rapat" placeholder="Judul Rapat" value="<?php echo $judul_rapat; ?>" /></td></tr>

        <tr><td width='200'>Deskripsi Rapat <?php echo form_error('deskripsi_rapat') ?></td><td> <textarea class="form-control" rows="3" name="deskripsi_rapat" id="deskripsi_rapat" placeholder="Deskripsi Rapat"><?php echo $deskripsi_rapat; ?></textarea></td></tr>
	    <tr><td width='200'>Pimpinan Rapat <?php echo form_error('pimpinan_rapat') ?></td><td><input type="text" class="form-control" name="pimpinan_rapat" id="pimpinan_rapat" placeholder="Pimpinan Rapat" value="<?php echo $pimpinan_rapat; ?>" /></td></tr>

        <tr><td width='200'>Peserta Rapat <?php echo form_error('peserta_rapat') ?></td><td> <textarea class="form-control" rows="3" name="peserta_rapat" id="peserta_rapat" placeholder="Peserta Rapat"><?php echo $peserta_rapat; ?></textarea></td></tr>
	    <tr><td width='200'>File Permohonan <?php echo form_error('file_permohonan') ?></td><td><input type="text" class="form-control" name="file_permohonan" id="file_permohonan" placeholder="File Permohonan" value="<?php echo $file_permohonan; ?>" /></td></tr>
	    <tr>
        <td width='200'>Status <?php echo form_error('status') ?></td>
        <td>
          <?php echo form_dropdown('status', array('0'=>'ON SCHEDULE', '1'=>'PROCESS', '2'=>'FINISH', '3'=>'CANCEL'), $status, array('class' => 'form-control')); ?>
          <!--
          <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> -->
        </td>
      </tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" />
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button>
	    <a href="<?php echo site_url('rapat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>
