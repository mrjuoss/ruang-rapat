<div class="content-wrapper">
    
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">INPUT DATA RUANGAN</h3>
            </div>
            <form action="<?php echo $action; ?>" method="post">
            
<table class='table table-bordered>'        

	    <tr><td width='200'>Nama Ruang <?php echo form_error('nama_ruang') ?></td><td><input type="text" class="form-control" name="nama_ruang" id="nama_ruang" placeholder="Nama Ruang" value="<?php echo $nama_ruang; ?>" /></td></tr>
	    <tr><td width='200'>Lokasi <?php echo form_error('lokasi') ?></td><td><input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi" value="<?php echo $lokasi; ?>" /></td></tr>
	    <tr><td width='200'>Kapasitas <?php echo form_error('kapasitas') ?></td><td><input type="text" class="form-control" name="kapasitas" id="kapasitas" placeholder="Kapasitas" value="<?php echo $kapasitas; ?>" /></td></tr>
	    <tr><td></td><td><input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
	    <a href="<?php echo site_url('ruangan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a></td></tr>
	</table></form>        </div>
</div>
</div>