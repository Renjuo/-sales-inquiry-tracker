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
<br><br>
    <h4>Detail Data Bulanan</h4>
    <br>
    <?php 
        
        for($x = 1; $x <= 12; $x++){ 
            $year = date("24");

    ?>
    <h6>
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
    ?>
    </h6><br>
    <table class="table table-striped table-borde#cc3300" style="font-size: 12px;">
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
    <?php } ?>
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
          ['Bulan', 'Tim Kholid Bin Walid', 'Tim Abu Ubaidah', 'Alfin', 'Anto', 'Zulfikri'],
          ['Januari', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0125' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0125' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0125' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0125' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0125' and pic = 'Zulfikri'")->num_rows();?>],
          ['Februari', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0225' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0225' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0225' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0225' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0225' and pic = 'Zulfikri'")->num_rows();?>],
          ['Maret', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0325' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0325' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0325' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0325' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0325' and pic = 'Zulfikri'")->num_rows();?>],
          ['April', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0425' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0425' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0425' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0425' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0425' and pic = 'Zulfikri'")->num_rows();?>],
          ['Mei', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0525' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0525' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0525' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0525' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0525' and pic = 'Zulfikri'")->num_rows();?>],
          ['Juni', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0625' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0625' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0625' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0625' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0625' and pic = 'Zulfikri'")->num_rows();?>],
          ['Juli', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0725' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0725' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0725' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0725' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0725' and pic = 'Zulfikri'")->num_rows();?>],
          ['Agustus', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825' and pic = 'Zulfikri'")->num_rows();?>],
          ['September', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0925' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0925' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0925' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0825' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '0925' and pic = 'Zulfikri'")->num_rows();?>],
          ['Oktober', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1025' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1025' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1025' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1025' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1025' and pic = 'Zulfikri'")->num_rows();?>],
          ['November', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1125' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1125' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1125' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1125' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1125' and pic = 'Zulfikri'")->num_rows();?>],
          ['Desember', <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1225' and team = 'Kholid Bin Walid'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1225' and team = 'Abu Ubaidah'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1225' and pic = 'Alfin'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1225' and pic = 'Anto'")->num_rows();?>, <?php echo $this->db->query("SELECT * FROM your_table where bulan = '1225' and pic = 'Zulfikri'")->num_rows();?>]
        ]);

        var options = {
          chart: {
            title: 'Perbandingan Inquiry Tim Kholid Bin Walid & Abu Ubaidah',
            //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>