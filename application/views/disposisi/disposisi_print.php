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
    <h3 align="center">DATA Disposisi</h3>
    <h4>Tanggal Cetak : <?= date("d/M/Y");?> </h4>
    <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Id Surat</th>
		<th>Catatan Disposisi</th>
		<th>Penerima Disposisi</th>
		<th>Tanggal Disposisi</th>
		<th>Pembuat Disposisi</th>
		
            </tr><?php
            foreach ($disposisi_data as $disposisi)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $disposisi->id_surat ?></td>
		      <td><?php echo $disposisi->catatan_disposisi ?></td>
		      <td><?php echo $disposisi->penerima_disposisi ?></td>
		      <td><?php echo $disposisi->tanggal_disposisi ?></td>
		      <td><?php echo $disposisi->pembuat_disposisi ?></td>	
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