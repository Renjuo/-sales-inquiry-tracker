<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=data.xls");
?>
<?php
include 'analytic_report.php';
?>
<a class="navbar-brand" href="./" style="margin-bottom: 50px;"><img src="<?php echo base_url(); ?>images/testindo_logo.png" alt="Logo"></a>
	
</style></a>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1 style="color:#fff;">A</h1>
                <h1>Report / Summary on Graphs (Inquiry)</h1>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <table>
        <caption>Jumlah Semua Inquiry</caption>
        <thead>
            <tr>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Sudah PO</th>
                <td><?php echo $query_po->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Sudah Quote</th>
                <td><?php echo $query_sudah_quote->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Sudah Belum Quote</th>
                <td><?php echo $query_belum_quote->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Close/gagal</th>
                <td><?php echo $query_close->num_rows(); ?></td> 
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <caption>Jumlah Semua Inquiry Per-Tahun</caption>
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Tahun 2018</th>
                <td><?php echo $query_y_1->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Tahun 2019</th>
                <td><?php echo $query_y_2->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Tahun 2020</th>
                <td><?php echo $query_y_3->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Tahun 2021</th>
                <td><?php echo $query_y_4->num_rows(); ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <caption>Jumlah Inquiry Di Bulan <?php echo date('M'); ?></caption>
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Sudah PO</th>
                <td><?php echo $query_po_m->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Sudah Quote</th>
                <td><?php echo $query_sudah_quote_m->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Sudah Belum Quote</th>
                <td><?php echo $query_belum_quote_m->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Close/gagal</th>
                <td><?php echo $query_close_m->num_rows(); ?></td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <caption>Jumlah Semua Inquiry Di Bulan <?php echo date('M'); ?></caption>
        <thead>
            <tr>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Januari</th>
                <td><?php echo $query_01->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Februari</th>
                <td><?php echo $query_02->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Maret</th>
                <td><?php echo $query_03->num_rows(); ?></td>
            </tr>
            <tr>
                <th>April</th>
                <td><?php echo $query_04->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Mei</th>
                <td><?php echo $query_05->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Juni</th>
                <td><?php echo $query_06->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Juli</th>
                <td><?php echo $query_07->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Agustus</th>
                <td><?php echo $query_08->num_rows(); ?></td>
            </tr>
            <tr>
                <th>September</th>
                <td><?php echo $query_09->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Oktober</th>
                <td><?php echo $query_10->num_rows(); ?></td>
            </tr>
            <tr>
                <th>November</th>
                <td><?php echo $query_11->num_rows(); ?></td>
            </tr>
            <tr>
                <th>Desember</th>
                <td><?php echo $query_12->num_rows(); ?></td>
            </tr>
        </tbody>
    </table>
</div>
<!-- Right Panel -->
<?php
include 'footer.php';
?>