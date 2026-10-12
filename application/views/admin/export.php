<?php
// Menggunakan MIME type spreadsheet yang lebih universal untuk format HTML-to-Excel
header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");

// Definisikan nama file otomatis (ekstensi tetap .xls agar kompatibel dengan pembacaan tabel HTML)
header("Content-Disposition: attachment; filename=Advanced_Export_" . date('Ymd_His') . ".xls");
header("Cache-Control: max-age=0");
header("Pragma: public");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        /* Mengatur agar teks di dalam excel rapi dan tidak berantakan */
        table {  border-collapse: collapse; width: 100%; font-family: sans-serif; font-size: 12px; }
        th { background-color: #f2f2f2; text-align: center; vertical-align: middle; }
        th, td { border: 1px solid #000000; padding: 5px; }
    </style>
</head>
<body>

<div class="page-header">
    <h3>Sales name : <?php echo $this->session->userdata('username') ? $this->session->userdata('username') : $_SESSION['username']; ?></h3>
    <h3>Export date : <?php echo date('Y-m-d H:i:s'); ?></h3>
</div>

<br>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>No. Surat</th>
            <th>No Reff Quotation</th>
            <th>Kebutuhan</th>
            <th>Kategori</th>
            <th>Perusahaan</th>
            <th>Alamat Perusahaan</th>
            <th>Nama</th>
            <th>Telepon Kantor</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Tanggal Input</th>
            <th>Tanggal Update</th>
            <th>Sumber Inquiry</th>
            <th>Sumber Inquiry Website</th>
            <th>Sales</th>
            <th>Team</th>
            <th>Fup Quote</th>
            <th>Progress History Follow Up</th>
            <th>Status</th>
            <th>Nilai Quo</th>
            <th>File Quo</th>
            <th>No PO dari Cust</th>
            <th>Nilai PO</th>
            <th>File PO</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        if (!empty($table)) {
            foreach($table as $u) {
        ?>
        <tr>
            <td style="text-align: center;"><?php echo $no++; ?></td>
            <td><?php echo $u->nomor_surat; ?></td>
            <td><?php echo $u->no_quotation; ?></td>
            <td><?php echo $u->kebutuhan_klien; ?></td>
            <td><?php echo $u->kategori; ?></td>
            <td><?php echo $u->nama_perusahaan_klien; ?></td>
            <td><?php echo $u->alamat_kantor_klien; ?></td>
            <td><?php echo $u->nama_klien; ?></td>
            <td><?php echo $u->telepon_office_klien; ?></td>
            <td><?php echo $u->telepon_klien; ?></td>
            <td><?php echo $u->email_klien; ?></td>
            <td><?php echo $u->tanggal_input; ?></td>
            <td><?php echo $u->tanggal_update; ?></td>
            <td><?php echo $u->sumber_inq; ?></td>
            <td><?php echo $u->sumber_inq_web ?></td>
            <td><?php echo $u->pic; ?></td>
            <td><?php echo $u->team; ?></td>
            <td><?php echo $u->fup_quote; ?></td>
            <td><?php echo $u->progress_hist_foll_up; ?></td>
            <td><?php echo $u->status; ?></td>
            
            <td style="text-align: right;"><?php echo "Rp " . number_format($u->nilai_quotation, 0, ',', '.'); ?></td>
            
            <td><?php echo $u->file_quotation; ?></td>
            <td><?php echo $u->no_po ?></td>
            
            <td style="text-align: right;"><?php echo "Rp " . number_format($u->nilai_po, 0, ',', '.'); ?></td>
            
            <td><?php echo $u->file_po; ?></td>
        </tr>
        <?php 
            } 
        } else { ?>
        <tr>
            <td colspan="25" style="text-align: center;">Tidak ada data yang sesuai dengan filter.</td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>