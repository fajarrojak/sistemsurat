<div class="row">
    <div class="col-xs-12 col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Surat Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-12">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Nomor surat</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo $no_surat; ?>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Tanggal surat</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo date_surat($tanggal_surat); ?>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Tanggal terima</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo date_surat($tanggal_terima); ?>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Jumlah lampiran</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo $jumlah_lampiran; ?>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Perihal</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo $perihal; ?>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Pengirim</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo $pengirim; ?>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4">
                            <b>Penerima</b>
                        </div>
                        <div class="col-md-8">
                            <?php echo $penerima; ?>
                        </div>
                    </div>

                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <p><?php echo $isi_surat; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <b>File surat</b>
                        </div>
                        <div class="col-md-8">
                            <?php if ($file_surat != '') { ?>
                                <a href="<?php echo base_url('assets/uploads/files/surat/surat_keluar/' . $file_surat); ?>" target="_blank">
                                    <?php echo $file_surat; ?>
                                </a>
                            <?php } else { ?>
                                <span class="text-muted">Tidak ada file lampiran</span>
                            <?php } ?>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>