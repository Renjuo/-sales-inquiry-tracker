<?php
include 'header.php';
?>
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Table</a></li>
                    <li class="active">Data table</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <!-- <div class="tabs"> -->
                        <table id="bootstrap-data-table" class="table table-striped table-borde#cc3300" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>No. Surat</th>
                                    <th>Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Nama</th>
                                    <th>Telepon Kantor</th>
                                    <th>Email</th>
                                    <th>Kebutuhan</th>
                                    <th>Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach($table_2 as $u){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u->nomor_surat ?></td>
                                    <td><?php echo $u->nama_perusahaan_klien ?></td>
                                    <td><?php echo $u->alamat_kantor_klien ?></td>
                                    <td><?php echo $u->nama_klien ?></td>
                                    <td><?php echo $u->telepon_office_klien ?></td>
                                    <td><a href="https://mail.google.com/mail/#search/<?php echo $u->email_klien ?>" target="_blank"><?php echo $u->email_klien ?></a></td>
                                    <td><?php echo $u->kebutuhan_klien ?></td>
                                    <td>
                                        <?php echo $u->pic ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
</div><!-- /#right-panel -->
        <!-- Right Panel -->
        <?php
        include 'footer.php';
        ?>