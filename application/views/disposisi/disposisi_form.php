<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button;?> Disposisi</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                    <i class="fa fa-minus"></i></button>
                     <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
              <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Surat <?php echo form_error('id_surat') ?></label>
            <input type="text" class="form-control" name="id_surat" id="id_surat" placeholder="Id Surat" value="<?php echo $id_surat; ?>" />
        </div>
	    <div class="form-group">
            <label for="catatan_disposisi">Catatan Disposisi <?php echo form_error('catatan_disposisi') ?></label>
            <textarea class="form-control" rows="3" name="catatan_disposisi" id="catatan_disposisi" placeholder="Catatan Disposisi"><?php echo $catatan_disposisi; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="int">Penerima Disposisi <?php echo form_error('penerima_disposisi') ?></label>
            <input type="text" class="form-control" name="penerima_disposisi" id="penerima_disposisi" placeholder="Penerima Disposisi" value="<?php echo $penerima_disposisi; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Disposisi <?php echo form_error('tanggal_disposisi') ?></label>
            <input type="text" class="form-control" name="tanggal_disposisi" id="tanggal_disposisi" placeholder="Tanggal Disposisi" value="<?php echo $tanggal_disposisi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Pembuat Disposisi <?php echo form_error('pembuat_disposisi') ?></label>
            <input type="text" class="form-control" name="pembuat_disposisi" id="pembuat_disposisi" placeholder="Pembuat Disposisi" value="<?php echo $pembuat_disposisi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('disposisi') ?>" class="btn btn-default">Cancel</a>
	</form>
         </div>
        </div>
    </div>
</div>