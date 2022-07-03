<!DOCTYPE html>
<html>
<head>
    <title>Tittle</title>
    <style type="text/css" media="print">
    @page {
        margin: 0;  /* this affects the margin in the printer settings */
    }
      table{
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
      }
      table th{
          -webkit-print-color-adjust:exact;
        border: 1px solid;

                padding-top: 11px;
    padding-bottom: 11px;
    background-color: #a29bfe;
      }
   table td{
        border: 1px solid;

   }
        </style>
</head>
<body>
    <h3 align="center">DATA Surat</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Isi Surat</th>
		<th>File Surat</th>
		<th>Jenis Surat</th>
		<th>No Surat</th>
		<th>Tanggal Surat</th>
		<th>Tanggal Dikirim</th>
		<th>Tanggal Terima</th>
		<th>Jumlah Lampiran</th>
		<th>Pengirim</th>
		<th>Penerima</th>
		<th>Perihal</th>
		
            </tr><?php
            foreach ($surat_keluar_data as $surat_keluar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $surat_keluar->isi_surat ?></td>
		      <td><?php echo $surat_keluar->file_surat ?></td>
		      <td><?php echo $surat_keluar->jenis_surat ?></td>
		      <td><?php echo $surat_keluar->no_surat ?></td>
		      <td><?php echo $surat_keluar->tanggal_surat ?></td>
		      <td><?php echo $surat_keluar->tanggal_dikirim ?></td>
		      <td><?php echo $surat_keluar->tanggal_terima ?></td>
		      <td><?php echo $surat_keluar->jumlah_lampiran ?></td>
		      <td><?php echo $surat_keluar->pengirim ?></td>
		      <td><?php echo $surat_keluar->penerima ?></td>
		      <td><?php echo $surat_keluar->perihal ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
</body>
<script type="text/javascript">
      window.print()
    </script>
</html>