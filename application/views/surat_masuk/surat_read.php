<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Surat Detail</h3>
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
	    <tr><td>Isi Surat</td><td><?php echo $isi_surat; ?></td></tr>
	    <tr><td>File Surat</td><td><?php echo $file_surat; ?></td></tr>
	    <tr><td>Jenis Surat</td><td><?php echo $jenis_surat; ?></td></tr>
	    <tr><td>No Surat</td><td><?php echo $no_surat; ?></td></tr>
	    <tr><td>Tanggal Surat</td><td><?php echo $tanggal_surat; ?></td></tr>
	    <tr><td>Tanggal Dikirim</td><td><?php echo $tanggal_dikirim; ?></td></tr>
	    <tr><td>Tanggal Terima</td><td><?php echo $tanggal_terima; ?></td></tr>
	    <tr><td>Jumlah Lampiran</td><td><?php echo $jumlah_lampiran; ?></td></tr>
	    <tr><td>Pengirim</td><td><?php echo $pengirim; ?></td></tr>
	    <tr><td>Penerima</td><td><?php echo $penerima; ?></td></tr>
	    <tr><td>Perihal</td><td><?php echo $perihal; ?></td></tr>
	    <tr><td><a href="<?php echo site_url('surat_masuk') ?>" class="btn bg-purple">Cancel</a></td></tr>
	</table>
            </div>
        </div>
    </div>
</div>