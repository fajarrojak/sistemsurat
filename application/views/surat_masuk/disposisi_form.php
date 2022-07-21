<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Disposisi Surat</h3>
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
                    <label for="varchar">Disposisi Kepada <?php echo form_error('kepada') ?></label>
                    <!-- <input type="text" class="form-control" name="kepada" id="kepada" placeholder="Disposisi Kepada" /> -->
                    <select name="kepada" id="" class="form-control select2">
                        <?php foreach ($users as $value) : ?>
                            <option value="<?php echo $value->id ?>"><?php echo $value->first_name . ' (' . cek_jabatan($value->id) . ')' ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="varchar">Catatan Disposisi <?php echo form_error('catatan') ?></label>
                    <textarea class="form-control" name="catatan_disposisi" id="catatan" placeholder="Catatan Disposisi"></textarea>
                </div>

                <input type="hidden" name="id_surat" value="<?php echo $id_surat; ?>" />
                <button type="submit" class="btn btn-primary">Disposisi</button>
                <a href="<?php echo site_url('surat_masuk') ?>" class="btn btn-default">Cancel</a>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>