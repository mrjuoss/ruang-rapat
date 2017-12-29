<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA USERS</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Lengkap <?php echo form_error('nama_lengkap') ?></td><td><input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" /></td></tr>
	    <tr><td width='200'>Unit Kerja <?php echo form_error('unit_kerja') ?></td><td><input type="text" class="form-control" name="unit_kerja" id="unit_kerja" placeholder="Unit Kerja" value="<?php echo $unit_kerja; ?>" /></td></tr>
	    <tr><td width='200'>No Telp <?php echo form_error('no_telp') ?></td><td><input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="No Telp" value="<?php echo $no_telp; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('pengguna_rapat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>