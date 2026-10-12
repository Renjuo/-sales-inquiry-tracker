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
                                    <th>Kebutuhan</th>
                                    <th>Perusahaan</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Nama</th>
                                    <th>Telepon Kantor</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Tanggal Input</th>
                                    <th>Tanggal Update</th>
                                    <th>Progress</th>
                                    <th>Keterangan</th>
                                    <th>Nilai Quote</th>
                                    <th>Sales</th>
                                    <th>Klasifikasi</th>
                                    <th>Fup Quote</th>
                                    <th>Merk</th>
                                    <th>Durasi Hari Quotation</th>
                                    <th>Option</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach($table_2 as $u){
                                ?>
                                <?php
                                $tanggal= date("Y-m-d");
                                $mulai =date_create($u->tanggal_update); // waktu mulai
                                $exp = date_create($tanggal); // batas waktu
                                $diff =  date_diff($mulai, $exp);
                                $hasil_diff = $diff->format("%a");
                                $mulais =date_create($u->tanggal_input); // waktu mulai
                                $exps = date_create($u->tanggal_quotation); // batas waktu
                                if($exps < $mulais){
                                    $diffs =  date_diff($mulais, $mulais);
                                }else{
                                    $diffs =  date_diff($mulais, $exps);
                                }
                                
                                $days = $diffs->format("%a");
                                $telepon = $u->telepon_klien;
                                $sub_telepon = substr($telepon,0,4);
                                $sub_telepon_2 = substr($telepon,4,4);
                                $sub_telepon_3 = substr($telepon,8,4);
                                $sub_telepon_0 = substr($telepon,0,1);
                                $sub_telepon_all = substr($telepon,1,12);
                                $teleponbaru = str_replace(' ', '', $sub_telepon_all);
                                $sub_telepon_62 = 62;
                                if($sub_telepon_0 == 0 ){
                                $telepon = $sub_telepon_62 .''.$teleponbaru;
                                }
                                if($u->tanggal_input == $u->tanggal_update and $u->tanggal_update != $u->tanggal_update+1 and $u->tanggal_input != $tanggal  and $u->progress_status == 'Belum Quote' and $u->keterangan == '' and $u->nilai_quote == '')
                                {
                                ?>
                                <tr>
                                    <td style="background: #cc3300;"><?php echo $no++ ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->nomor_surat ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->kebutuhan_klien ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->nama_perusahaan_klien ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->alamat_kantor_klien ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->nama_klien ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->telepon_office_klien ?></td>
                                    <td style="background: #cc3300;"><a href="https://web.whatsapp.com/send?phone=<?php echo $telepon ?>" target="_blank"><?php echo $u->telepon_klien ?></a></td>
                                    <td style="background: #cc3300;"><a href="https://mail.google.com/mail/#search/<?php echo $u->email_klien ?>" target="_blank"><?php echo $u->email_klien ?></a></td>
                                    <td style="background: #cc3300;"><?php echo $u->tanggal_input ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->tanggal_update ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->progress_status ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->keterangan ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->nilai_quote ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->pic ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->klasifikasi ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->fup_quote ?></td>
                                    <td style="background: #cc3300;"><?php echo $u->merk ?></td>
                                    <td style="background: #cc3300;"><?php echo $days ?></td>
                                    <td>
                                        <div align="center">
                                            <a title="Ubah Data" href="<?php echo 'admin/edit_data_2/'.$u->id_surat?>" target="_blank">
                                            <img src="<?php echo base_url();?>assets/img/edit.gif" width="18" height="18"/></a><br>
                                            <?php
                                            if ($_SESSION['username'] == "admin") {
                                            ?>
                                            <a title="Hapus Data" onclick="javascript: return confirm('Anda yakin hapus ?')" href="<?php echo 'admin/hapus_data_2/'.$u->id_surat?>"><img src="<?php echo base_url();?>assets/img/delete.gif" width="18" height="18" /></a>
                                            <?php
                                            } else {}
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                elseif($hasil_diff > 5 and $u->progress_status != 'Sudah PO' and $u->progress_status != "Close/Gagal" and $u->tanggal_input != $tanggal)
                                {
                                ?>
                                <!-- Sudah Quote -->
                                <tr>
                                    <td style="background: aqua;"><?php echo $no++ ?></td>
                                    <td style="background: aqua;"><?php echo $u->nomor_surat ?></td>
                                    <td style="background: aqua;"><?php echo $u->kebutuhan_klien ?></td>
                                    <td style="background: aqua;"><?php echo $u->nama_perusahaan_klien ?></td>
                                    <td style="background: aqua;"><?php echo $u->alamat_kantor_klien ?></td>
                                    <td style="background: aqua;"><?php echo $u->nama_klien ?></td>
                                    <td style="background: aqua;"><?php echo $u->telepon_office_klien ?></td>
                                    <td style="background: aqua;"><a href="https://web.whatsapp.com/send?phone=<?php echo $telepon ?>" target="_blank"><?php echo $u->telepon_klien ?></a></td>
                                    <td style="background: aqua;"><a href="https://mail.google.com/mail/#search/<?php echo $u->email_klien ?>" target="_blank"><?php echo $u->email_klien ?></a></td>
                                    <td style="background: aqua;"><?php echo $u->tanggal_input ?></td>
                                    <td style="background: aqua;"><?php echo $u->tanggal_update ?></td>
                                    <td style="background: aqua;"><?php echo $u->progress_status ?></td>
                                    <td style="background: aqua;"><?php echo $u->keterangan ?></td>
                                    <td style="background: aqua;"><?php echo $u->nilai_quote ?></td>
                                    <td style="background: aqua;"><?php echo $u->pic ?></td>
                                    <td style="background: aqua;"><?php echo $u->klasifikasi ?></td>
                                    <td style="background: aqua;"><?php echo $u->fup_quote ?></td>
                                    <td style="background: aqua;"><?php echo $u->merk ?></td>
                                    <td style="background: aqua;"><?php echo $days ?></td>
                                    <td>
                                        <div align="center">
                                            <a title="Ubah Data" href="<?php echo 'admin/edit_data_2/'.$u->id_surat?>" target="_blank">
                                            <img src="<?php echo base_url();?>assets/img/edit.gif" width="18" height="18"/></a><br>
                                            <?php
                                            if ($_SESSION['username'] == "admin") {
                                            ?>
                                            <a title="Hapus Data" onclick="javascript: return confirm('Anda yakin hapus ?')" href="<?php echo 'admin/hapus_data_2/'.$u->id_surat?>"><img src="<?php echo base_url();?>assets/img/delete.gif" width="18" height="18" /></a>
                                            <?php
                                            } else {}
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                }
                                else
                                {
                                ?>
                                <!-- Dashboard Data Table / Sudah PO / Close/Gagal -->
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $u->nomor_surat ?></td>
                                    <td><?php echo $u->kebutuhan_klien ?></td>
                                    <td><?php echo $u->nama_perusahaan_klien ?></td>
                                    <td><?php echo $u->alamat_kantor_klien ?></td>
                                    <td><?php echo $u->nama_klien ?></td>
                                    <td><?php echo $u->telepon_office_klien ?></td>
                                    <td><a href="https://web.whatsapp.com/send?phone=<?php echo $telepon ?>" target="_blank"><?php echo $u->telepon_klien ?></a></td>
                                    <td><a href="https://mail.google.com/mail/#search/<?php echo $u->email_klien ?>" target="_blank"><?php echo $u->email_klien ?></a></td>
                                    <td><?php echo $u->tanggal_input ?></td>
                                    <td><?php echo $u->tanggal_update ?></td>
                                    <td><?php echo $u->progress_status ?></td>
                                    <td><?php echo $u->keterangan ?></td>
                                    <td><?php echo $u->nilai_quote ?></td>
                                    <td><?php echo $u->pic ?></td>
                                    <td><?php echo $u->klasifikasi ?></td>
                                    <td><?php echo $u->fup_quote ?></td>
                                    <td><?php echo $u->merk ?></td>
                                    <td><?php echo $days ?></td>
                                    <td>
                                        <div align="center">
                                            <a title="Ubah Data" href="<?php echo 'admin/edit_data_2/'.$u->id_surat?>" target="_blank">
                                            <img src="<?php echo base_url();?>assets/img/edit.gif" width="18" height="18"/></a><br>
                                            <?php
                                            if ($_SESSION['username'] == "admin") {
                                            ?>
                                            <a title="Hapus Data" onclick="javascript: return confirm('Anda yakin hapus ?')" href="<?php echo 'admin/hapus_data_2/'.$u->id_surat?>"><img src="<?php echo base_url();?>assets/img/delete.gif" width="18" height="18" /></a>
                                            <?php
                                            } else {}
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php }} ?>
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