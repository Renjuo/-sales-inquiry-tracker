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
<div class="breadcrumbs" style="margin-top: 50px;">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1 style="color:#fff;">A</h1>
                <h1>Report / Summary on Graphs (Sales)</h1>
            </div>
        </div>
    </div>
</div>
<div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"></a></li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
</div>
<div class="tabs">
        <?php
        $t=date('Y');
        ?>
        <style>
            table, th, td {
                border: 0.5px solid black;
                border-collapse: collapse;
            }
        </style>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>JANUARI <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_01->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_01->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_01->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_01->num_rows(); ?></td>
                    <td><?php echo $query_Okta_01->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_01->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_01->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_01->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_01->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_01->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_01->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_01->num_rows(); ?></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_01->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_01->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_01->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_01->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_01->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_01->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_01->num_rows(); ?></td>
                </tr>
                 <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_12->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>FEBRUARI <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_02->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_02->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_02->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_02->num_rows(); ?></td>
                    <td><?php echo $query_Okta_02->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_02->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_02->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_02->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_02->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_02->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_02->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_02->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_02->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_02->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_02->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_02->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_02->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_02->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_02->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_01->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_01->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>MARET <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                ?>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_03->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_03->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_03->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_03->num_rows(); ?></td>
                    <td><?php echo $query_Okta_03->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_03->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_03->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_03->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_03->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_03->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_03->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_03->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_03->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_03->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_03->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_03->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_03->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_03->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_03->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td style="background:#cc3300;color:white;">5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_02->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_02->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>APRIL <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_04->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_04->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_04->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_04->num_rows(); ?></td>
                    <td><?php echo $query_Okta_04->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_04->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_04->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_04->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_04->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_04->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_04->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_04->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_04->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_04->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_04->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_04->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_04->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_04->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_04->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_03->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_03->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>MEI <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                ?>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_05->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_05->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_05->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_05->num_rows(); ?></td>
                    <td><?php echo $query_Okta_05->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_05->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_05->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_05->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_05->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_05->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_05->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_05->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_05->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_05->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_05->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_05->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_05->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_05->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_05->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_04->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_04->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>JUNI <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_06->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_06->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_06->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_06->num_rows(); ?></td>
                    <td><?php echo $query_Okta_06->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_06->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_06->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_06->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_06->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_06->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_06->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_06->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_06->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_06->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_06->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_06->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_06->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_06->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_06->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_05->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_05->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>JULI <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_07->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_07->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_07->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_07->num_rows(); ?></td>
                    <td><?php echo $query_Okta_07->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_07->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_07->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_07->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_07->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_07->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_07->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_07->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_07->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_07->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_07->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_07->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_07->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_07->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_07->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_06->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_06->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>AGUSTUS <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_08->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_08->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_08->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_08->num_rows(); ?></td>
                    <td><?php echo $query_Okta_08->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_08->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_08->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_08->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_08->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_08->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_08->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_08->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_08->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_08->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_08->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_08->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_08->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_08->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_08->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_07->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_07->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>SEPTEMBER <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_09->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_09->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_09->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_09->num_rows(); ?></td>
                    <td><?php echo $query_Okta_09->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_09->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_09->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_09->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_09->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_09->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_09->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_09->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_09->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_09->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_09->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_09->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_09->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_09->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_09->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_08->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_08->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>OKTOBER <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_10->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_10->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_10->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_10->num_rows(); ?></td>
                    <td><?php echo $query_Okta_10->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_10->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_10->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_10->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_10->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_10->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_10->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_10->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_10->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_10->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_10->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_10->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_10->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_10->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_10->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_09->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_09->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>NOVEMBER <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_11->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_11->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_11->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_11->num_rows(); ?></td>
                    <td><?php echo $query_Okta_11->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_11->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah Quote</td>
                    <td><?php echo $query_quote_11; ?></td>
                    <td><?php echo $query_quote_Fajar_11; ?></td>
                    <td><?php echo $query_quote_Faoji_11; ?></td>
                    <td><?php echo $query_quote_Mashudy_11; ?></td>
                    <td><?php echo $query_quote_Okta_11; ?></td>
                    <td><?php echo $query_quote_Zulfikri_11; ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_11->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_11->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_11->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_11->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_11->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_11->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_11->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>5</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_11->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_11->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_11->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_11->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_11->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_11->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_10->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_10->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
        <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
            <h6>DESEMBER <?php echo $t; ?></h6><br>
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#000;">#</th>
                    <th scope="col" style="color:#000;">INDIKATOR</th>
                    <th scope="col" style="color:#000;">TOTAL</th>
                    <th scope="col" style="color:#000;">Fajar</th>
                    <th scope="col" style="color:#000;">Faoji</th>
                    <th scope="col" style="color:#000;">Mashudy</th>
                    <th scope="col" style="color:#000;">Okta</th>
                    <th scope="col" style="color:#000;">Zulfikri</th>
                </tr>
            </thead>
            <tbody>
                <!-- panggil data di database -->
                <tr>
                    
                    <td>1</td>
                    <td>Jumlah Inquiry</td>
                    <td><?php echo $query_12->num_rows(); ?></td>
                    <td><?php echo $query_Fajar_12->num_rows(); ?></td>
                    <td><?php echo $query_Faoji_12->num_rows(); ?></td>
                    <td><?php echo $query_Mashudy_12->num_rows(); ?></td>
                    <td><?php echo $query_Okta_12->num_rows(); ?></td>
                    <td><?php echo $query_Zulfikri_12->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>2</td>
                    <td>Jumlah Quote</td>
                    <td><?php echo $query_quote_12; ?></td>
                    <td><?php echo $query_quote_Fajar_12; ?></td>
                    <td><?php echo $query_quote_Faoji_12; ?></td>
                    <td><?php echo $query_quote_Mashudy_12; ?></td>
                    <td><?php echo $query_quote_Okta_12; ?></td>
                    <td><?php echo $query_quote_Zulfikri_12; ?></td>
                </tr>
                <tr>
                    
                    <td>3</td>
                    <td>Jumlah PO</td>
                    <td><?php echo $query_po_12->num_rows(); ?></td>
                    <td><?php echo $query_po_Fajar_12->num_rows(); ?></td>
                    <td><?php echo $query_po_Faoji_12->num_rows(); ?></td>
                    <td><?php echo $query_po_Mashudy_12->num_rows(); ?></td>
                    <td><?php echo $query_po_Okta_12->num_rows(); ?></td>
                    <td><?php echo $query_po_Zulfikri_12->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>4</td>
                    <td>Belum Quote</td>
                    <td><?php echo $query_belum_quote_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_12->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_12->num_rows(); ?></td>
                </tr>
                <tr>
                    
                    <td>5</td>
                    <td>Sudah Quote</td>
                    <td><?php echo $query_sudah_quote_12->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Fajar_12->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Faoji_12->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Mashudy_12->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Okta_12->num_rows(); ?></td>
                    <td><?php echo $query_sudah_quote_Zulfikri_12->num_rows(); ?></td>
                </tr>
                <tr style="background:#cc3300;color:white;">
                    
                    <td>5</td>
                    <td>Jumlah Belum Quote Bulan Sebelumnya</td>
                    <td><?php echo $query_belum_quote_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Fajar_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Faoji_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Mashudy_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Okta_11->num_rows(); ?></td>
                    <td><?php echo $query_belum_quote_Zulfikri_11->num_rows(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
<!-- Right Panel -->
<?php
include 'footer.php';
?>