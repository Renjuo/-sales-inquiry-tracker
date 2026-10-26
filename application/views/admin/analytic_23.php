<?php
//include 'analytic_report.php';
include 'header.php';
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard Activity & Sales Progress 2023</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">table</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-12">
        <div id="columnchart_material" style="height:450px;"></div>
    </div>
</div>

<div class="col-md-12">
<br><br>
    <div class="d-flex align-items-center justify-content-between mb-3" style="gap: 12px;">
        <h4 class="mb-0" style="min-width: 0;">Detail Data Bulanan</h4>
        <!-- Pilih bulan: hanya tabel bulan terpilih yang tampil (default Desember) -->
        <div class="filter-grid" style="flex: 0 1 220px; min-width: 150px;">
            <select class="form-control" id="pilih_bulan_detail" aria-label="Pilih bulan">
                <?php foreach (["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"] as $n => $bln): ?>
                    <option value="<?= $n + 1; ?>" <?= ($n == 11) ? "selected" : ""; ?>><?= $bln; ?> 2023</option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <?php 
        
        for($x = 1; $x <= 12; $x++){ 
            $year = date("23");

    ?>
    <div class="bulan-detail" data-bulan="<?= $x; ?>" <?= ($x == 12) ? "" : "style=\"display: none;\""; ?>>
    <h6 style="font-weight: bold;">
    <?php 
        if($x == 1){$x = "01" ; echo "Januari";} 
        else if($x == 2){$x = "02" ; echo "Februari";}
        else if($x == 3){$x = "03" ; echo "Maret";} 
        else if($x == 4){$x = "04" ; echo "April";} 
        else if($x == 5){$x = "05" ; echo "Mei";} 
        else if($x == 6){$x = "06" ; echo "Juni";} 
        else if($x == 7){$x = "07" ; echo "Juli";} 
        else if($x == 8){$x = "08" ; echo "Agustus";} 
        else if($x == 9){$x = "09" ; echo "September";} 
        else if($x == 10){echo "Oktober";} 
        else if($x == 11){echo "November";} 
        else{echo "Desember";} 
    ?> 2023
    </h6>
    <table class="table table-striped table-bordered" style="font-size: 12px;">
        <thead>
            <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                <th scope="col" style="color:#fff;">#</th>
                <th scope="col" style="color:#fff;">INDIKATOR</th>
                <th scope="col" style="color:#fff;">Faoji</th>
                <th scope="col" style="color:#fff;">Hanifan</th>
                <th scope="col" style="color:#fff;">Ridwan</th>
                <th scope="col" style="color:#fff;">Redha</th>
                <th scope="col" style="color:#fff;">Andis</th>
                <th scope="col" style="color:#fff;">Bayu</th>
                <th scope="col" style="color:#fff;">Yovan</th>
                <th scope="col" style="color:#fff;">Rafael</th>
                <th scope="col" style="color:#fff;">Alfian</th>
                <th scope="col" style="color:#fff;">Reza</th>
                <th scope="col" style="color:#fff;">Anto</th>
                <th scope="col" style="color:#fff;">Zulfikri</th>
                <th scope="col" style="color:#fff;">Total</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>1</td>
                <td>Jumlah Inquiry</td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'faoji'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'hanifan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'ridwan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'redha'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'andis'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'Bayu'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'yovan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'Rafael'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'Alfian'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'Reza'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'anto'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and pic = 'zulfikri'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year'")->num_rows();?></td>
            </tr>

            <tr>
                <td>2</td>
                <td>Belum Quote</td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'faoji'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'hanifan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'ridwan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'redha'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'andis'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'Bayu'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'yovan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'rafael'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'alfian'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'reza'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'anto'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'  and pic = 'zulfikri'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Belum Quote'")->num_rows();?></td>
            </tr>

            <tr>
                <td>3</td>
                <td>Sudah Quote</td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'faoji'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'hanifan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'ridwan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'redha'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'andis'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'Bayu'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'yovan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'rafael'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'alfian'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'reza'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'anto'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'  and pic = 'zulfikri'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah Quote'")->num_rows();?></td>
            </tr>

            <tr>
                <td>4</td>
                <td>Jumlah PO</td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'faoji'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'hanifan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'ridwan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'redha'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'andis'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'Bayu'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'yovan'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'rafael'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'alfian'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'reza'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'anto'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'  and pic = 'zulfikri'")->num_rows();?></td>
                <td><?php echo $this->db->query("SELECT * FROM your_table where bulan = '$x$year' and status = 'Sudah PO'")->num_rows();?></td>
            </tr>
        </tbody>
    </table>
    </div>
    <?php } ?>
    <script>
        document.getElementById("pilih_bulan_detail").addEventListener("change", function() {
            var bulan = this.value;
            document.querySelectorAll(".bulan-detail").forEach(function(el) {
                el.style.display = el.dataset.bulan === bulan ? "" : "none";
            });
        });
    </script>
</div>
<br>
<!--<div class="breadcrumbs" style="margin-top: 50px;">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Report / Summary on Graphs (Sales)</h1>
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
    
</div>-->
<form action="<?php echo base_url(). 'export_report_sales'; ?>" method="post">
                        <button id="save" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-save fa-lg"></i>&nbsp;
                            <span id="save">EXPORT</span>
                        </button>
                        </form>
</div><!-- /#right-panel -->
<!-- Right Panel -->
<?php
include 'footer.php';
?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/charts-theme.js?v=<?php echo filemtime(FCPATH . 'assets/js/charts-theme.js'); ?>"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bulan', 'Tim A', 'Tim B'],
          ['Januari', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0123' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0123' and team = 'B'")->num_rows();?>],
          ['Februari', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0223' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0223' and team = 'B'")->num_rows();?>],
          ['Maret', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0323' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0323' and team = 'B'")->num_rows();?>],
          ['April', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0423' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0423' and team = 'B'")->num_rows();?>],
          ['Mei', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0523' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0523' and team = 'B'")->num_rows();?>],
          ['Juni', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0623' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0623' and team = 'B'")->num_rows();?>],
          ['Juli', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0723' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0723' and team = 'B'")->num_rows();?>],
          ['Agustus', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0823' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0823' and team = 'B'")->num_rows();?>],
          ['September', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0923' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0923' and team = 'B'")->num_rows();?>],
          ['Oktober', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1023' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1023' and team = 'B'")->num_rows();?>],
          ['November', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1123' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1123' and team = 'B'")->num_rows();?>],
          ['Desember', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1223' and team = 'A'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1223' and team = 'B'")->num_rows();?>]
        ]);

        var options = {
          chart: {
            title: 'Perbandingan Inquiry Tim A & B',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        <?php $tanggal = date('Y-m-d') ?>
        var data = google.visualization.arrayToDataTable([
          ['Sales', 'Jumlah Inquiry Harian'],
          ['Anto', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Anto'")->num_rows();?>],
          ['Faoji', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Faoji'")->num_rows();?>],
          ['Hanifan', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Hanifan'")->num_rows();?>],
          ['Ridwan', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Ridwan'")->num_rows();?>],
          ['Redha', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Redha'")->num_rows();?>],
          ['Zulfikri', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Zulfikri'")->num_rows();?>],
          ['Andis', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Andis'")->num_rows();?>],
          ['Bayu', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Bayu'")->num_rows();?>],
          ['Yovan', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Yovan'")->num_rows();?>],
          ['Rafael', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Rafael'")->num_rows();?>],
          ['Alfian', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Alfian'")->num_rows();?>],
          ['Reza', <?php echo $this->db->query("SELECT * FROM your_table where tanggal_input = '$tanggal' and pic = 'Reza'")->num_rows();?>]
        ]);

        var options = {
          chart: {
            title: 'Inquiry Harian <?php echo date('d-m-Y'); ?>',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material2'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>