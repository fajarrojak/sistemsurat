<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Kelola Surat Masuk</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" onclick="location.reload()" title="Refresh">
                        <i class="fa fa-refresh"></i></button>
                </div>
            </div>

            <div class="box-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-4">
                        <?php echo anchor(site_url('surat_masuk/create'), '<i class="fa fa-plus"></i> Tambah', 'class="btn bg-purple"'); ?>
                    </div>
                    <div class="col-md-4 text-center">
                        <div style="margin-top: 8px" id="message">

                        </div>
                    </div>
                    <div class="col-md-1 text-right">
                    </div>
                    <div class="col-md-3 text-right">
                        <form action="<?php echo site_url('surat_masuk/index'); ?>" class="form-inline" method="get" style="margin-top:10px">
                            <div class="input-group">
                                <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                <span class="input-group-btn">
                                    <?php
                                    if ($q <> '') {
                                    ?>
                                        <a href="<?php echo site_url('surat_masuk'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <form method="post" action="<?= site_url('surat_masuk/deletebulk'); ?>" id="formbulk">
                    <table class="table table-bordered" style="margin-bottom: 10px" style="width:100%">
                        <tr>
                            <th style="width: 10px;"><input type="checkbox" name="selectall" /></th>
                            <th>No</th>
                            <th>Pengirim</th>
                            <th>Perihal</th>
                            <th>No Surat</th>
                            <th>Tanggal Surat</th>
                            <th>Tanggal Terima</th>
                            <th>Penerima</th>
                            <th>Action</th>
                        </tr><?php
                                foreach ($surat_masuk_data as $surat_masuk) {
                                ?>
                            <tr>

                                <td style="width: 10px;padding-left: 8px;"><input type="checkbox" name="id" value="<?= $surat_masuk->id_surat; ?>" />&nbsp;</td>

                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $surat_masuk->pengirim ?></td>
                                <td><?php echo $surat_masuk->perihal ?></td>
                                <td><?php echo $surat_masuk->no_surat ?></td>
                                <td><?php echo date_surat($surat_masuk->tanggal_surat) ?></td>
                                <td><?php echo date_surat($surat_masuk->tanggal_terima) ?></td>
                                <td><?php echo cek_nama($surat_masuk->penerima) ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php
                                    echo anchor(site_url('surat_masuk/read/' . $surat_masuk->id_surat), '<i class="fa fa-search"></i>', 'class="btn btn-xs btn-primary"  data-toggle="tooltip" title="Detail"');
                                    echo ' ';
                                    echo anchor(site_url('surat_masuk/update/' . $surat_masuk->id_surat), ' <i class="fa fa-edit"></i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit"');
                                    echo ' ';
                                    if (!cek_disposisi($surat_masuk->id_surat)) {
                                        echo anchor(site_url('surat_masuk/disposisi/' . $surat_masuk->id_surat), ' <i class="fa fa-mail">Disposisi</i>', 'class="btn btn-xs btn-warning" data-toggle="tooltip" title="Disposisi"');
                                        echo ' ';
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php
                                }
                        ?>
                    </table>
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-12">
                            <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Hapus Data Terpilih</button> <a href="#" class="btn bg-yellow">Total Record : <?php echo $total_rows ?></a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-6 text-right">
                        <?php echo $pagination ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function confirmdelete(linkdelete) {
        alertify.confirm("Apakah anda yakin akan  menghapus data tersebut?", function() {
            location.href = linkdelete;
        }, function() {
            alertify.error("Penghapusan data dibatalkan.");
        });
        $(".ajs-header").html("Konfirmasi");
        return false;
    }
    $(':checkbox[name=selectall]').click(function() {
        $(':checkbox[name=id]').prop('checked', this.checked);
    });

    $("#formbulk").on("submit", function() {
        var rowsel = [];
        $.each($("input[name='id']:checked"), function() {
            rowsel.push($(this).val());
        });
        if (rowsel.join(",") == "") {
            alertify.alert('', 'Tidak ada data terpilih!', function() {});

        } else {
            var prompt = alertify.confirm('Apakah anda yakin akan menghapus data tersebut?',
                'Apakah anda yakin akan menghapus data tersebut?').set('labels', {
                ok: 'Yakin',
                cancel: 'Batal!'
            }).set('onok', function(closeEvent) {

                $.ajax({
                    url: "surat_masuk/deletebulk",
                    type: "post",
                    data: "msg = " + rowsel.join(","),
                    success: function(response) {
                        if (response == true) {
                            location.reload();
                        }
                        //console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                });

            });
            $(".ajs-header").html("Konfirmasi");
        }
        return false;
    });
</script>