<?php
//include 'analytic_report.php';
include 'header.php';
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Report / Summary on Graphs (Inquiry)</h1>
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
    <div class="col-md-12">
        <div id="columnchart_material_inq_pertahun" style="height:450px;"></div>
    </div>
</div>
<!-- /#right-panel -->
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
          ['Tahun', '2023', '2024', '2025'],
          ['Jumlah Inquiry', <?php echo $this->db->query("SELECT * FROM your_table where bulan like '%%23'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan like '%%24'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan like '%%25'")->num_rows();?>]
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
        var data = google.visualization.arrayToDataTable([
          ['Bulan', '2023', '2024', '2025'],
          ['Januari', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0123'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0124'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0125'")->num_rows();?>],
          ['Februari', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0223'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0224'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0225'")->num_rows();?>],
          ['Maret', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0323'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0324'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0325'")->num_rows();?>],
          ['April', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0423'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0424'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0425'")->num_rows();?>],
          ['Mei', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0523'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0524'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0525'")->num_rows();?>],
          ['Juni', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0623'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0624'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0625'")->num_rows();?>],
          ['Juli', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0723'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0724'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0725'")->num_rows();?>],
          ['Agustus', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0823'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0824'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825'")->num_rows();?>],
          ['September', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0923'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0924'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0925'")->num_rows();?>],
          ['Oktober', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1023'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1024'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1025'")->num_rows();?>],
          ['November', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1123'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1124'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1125'")->num_rows();?>],
          ['Desember', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1223'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1224'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1225'")->num_rows();?>]
        ]);

        var options = {
          chart: {
            title: 'Perbandingan Inquiry Perbulan',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material_inq_pertahun'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    
