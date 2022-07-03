<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Disposisi Detail</h3>
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
        <table class="table">
	    <tr><td>Id Surat</td><td><?php echo $id_surat; ?></td></tr>
	    <tr><td>Catatan Disposisi</td><td><?php echo $catatan_disposisi; ?></td></tr>
	    <tr><td>Penerima Disposisi</td><td><?php echo $penerima_disposisi; ?></td></tr>
	    <tr><td>Tanggal Disposisi</td><td><?php echo $tanggal_disposisi; ?></td></tr>
	    <tr><td>Pembuat Disposisi</td><td><?php echo $pembuat_disposisi; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('disposisi') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>