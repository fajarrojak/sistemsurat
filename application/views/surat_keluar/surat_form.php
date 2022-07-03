<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $button; ?> Surat</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Collapse">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php echo form_open_multipart($action); ?>

                <div class="form-group">
                    <label for="varchar">No Surat <?php echo form_error('no_surat') ?></label>
                    <input type="text" class="form-control" name="no_surat" id="no_surat" placeholder="No Surat" value="<?php echo $no_surat; ?>" />
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="int">Jumlah Lampiran <?php echo form_error('jumlah_lampiran') ?></label>
                            <input type="text" class="form-control" name="jumlah_lampiran" id="jumlah_lampiran" placeholder="Jumlah Lampiran" value="<?php echo $jumlah_lampiran; ?>" />
                        </div>
                        <div class="col-md-6">
                            <label for="varchar">Perihal <?php echo form_error('perihal') ?></label>
                            <input type="text" class="form-control" name="perihal" id="perihal" placeholder="Perihal" value="<?php echo $perihal; ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="date">Tanggal Surat <?php echo form_error('tanggal_surat') ?></label>
                            <input type="text" class="form-control formdate" name="tanggal_surat" id="tanggal_surat" placeholder="Tanggal Surat" value="<?php echo $tanggal_surat; ?>" />
                        </div>
                        <div class="col-md-6">
                            <label for="date">Tanggal dikirim <?php echo form_error('tanggal_dikirim') ?></label>
                            <input type="text" class="form-control formdate" name="tanggal_dikirim" id="tanggal_dikirim" placeholder="Tanggal dikirim" value="<?php echo $tanggal_dikirim; ?>" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="varchar">Pengirim <?php echo form_error('pengirim') ?></label>
                            <input type="text" class="form-control" name="pengirim" id="pengirim" placeholder="Pengirim" value="<?php echo $pengirim; ?>" />
                        </div>
                        <div class="col-md-6">
                            <label for="varchar">Penerima <?php echo form_error('penerima') ?></label>
                            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Penerima" value="<?php echo $penerima; ?>" />
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label for="isi_surat">Isi Surat <?php echo form_error('isi_surat') ?></label>
                    <textarea class="form-control" rows="3" name="isi_surat" id="isi_surat" placeholder="Isi Surat"><?php echo $isi_surat; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="varchar">File Surat <?php echo form_error('file_surat') ?></label>
                    <input type="file" class="form-control" name="file_surat" id="file_surat" placeholder="File Surat" value="<?php echo $file_surat; ?>" />
                    <label for="formFile" class="form-label">
                        File : <a class="text-light" href="<?= base_url('/assets/uploads/files/surat/surat_keluar'); ?><?php echo $file_surat; ?>"><?php echo $file_surat; ?></a>
                    </label>
                </div>






                <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" />
                <input type="hidden" name="jenis_surat" value="<?php echo $jenis_surat; ?>" />
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
                <a href="<?php echo site_url('surat_keluar') ?>" class="btn btn-default">Cancel</a>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>