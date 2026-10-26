<?php
include 'header.php';
?>
<div class="card">
  <div class="card-header">
    <strong class="card-title">Edit Data</strong>
  </div>
  <div class="card-body">
    <!-- Credit Card -->
    <?php foreach($your_table as $u){ ?>
    <div id="pay-invoice">
      <div class="card-body">
        <div class="card-title">
          <h3 class="text-center">Edit Data dengan Nomor Surat <?php echo $u->id_surat; ?></h3>
        </div>
        <hr>
        <form action="<?php echo base_url(). 'ubah_data'; ?>" method="post">
          <div class="card-body card-block">
            <div class="form-group" style="display:none;"><label class=" form-control-label">ID Surat</label><input type="text" id="id_surat" name="id_surat" class="form-control" value="<?php echo $u->id_surat  ?>"></div>
            <div class="form-group">
              <label for="select" class=" form-control-label">Jenis Dokumen</label>
              <!--<select name="kode_jenis" id="kode_jenis" class="form-control" onchange="jenis(kode_jenis)" required="">-->
              <!--?php
              //foreach ($your_table as $u) 
                ?>-->
              <!--  <option value="?php echo $u->kode_jenis ?>">?php echo $u->keterangan_jenis ?></option>-->
              <!-- ?php } ?>-->
              <!--</select>-->
              <!--<script>-->
              <!--function jenis(opt){-->
              <!--var jenis=opt.value;-->
              <!--document.getElementById('kode_jenis_2').value = jenis;-->
              <!--document.getElementById('kode_jenis_3').value = jenis;-->
              <!--}-->
              <!--</script>-->
              <label class=" form-control-label"></label><input type="text" id="kode_jenis_2" name="kode_jenis_2" class="form-control" readonly="" value="<?php echo $u->kode_jenis ?>">
            </div>
            <div class="form-group">
              <label for="select" class=" form-control-label">Web Terkait</label>
              <!--<select name="kode_website" id="kode_website" class="form-control" onchange="website(kode_website)" required="">-->
              <!-- ?php>
              //  foreach ($your_table as $u) {-->
              <!--  ?>-->
              <!--  <option value="?php echo $u->kode_website ?>">?php echo $u->keterangan_website ?></option>-->
              <!--?php } ?>-->
              <!--</select>-->
              <!--<script>-->
              <!--function website(opt){-->
              <!--var website=opt.value;-->
              <!--document.getElementById('kode_website_2').value = website;-->
              <!--document.getElementById('kode_website_3').value = website;-->
              <!--}-->
              <!--</script>-->
              <label class=" form-control-label"></label><input type="text" id="kode_website_2" name="kode_website_2" class="form-control" readonly=""  value="<?php echo $u->kode_website ?>">
            </div>
            <?php
                foreach ($your_table as $u) {
                    $aw = "000";
                    $a = $u->nomor_urut;
                    if($a > "999"){
                        $aw = "";
                    }elseif($a > "99"){ 
                        $aw = "0";
                    }elseif($a > "9"){
                        $aw = "00";
                    }
            ?>
            <div class="form-group"><label class=" form-control-label">Bulan - Tahun</label><input type="text" id="bulan" name="bulan" class="form-control" value="<?php echo $u->bulan;?>" readonly=""></div>
            <div class="form-group">
              <label class=" form-control-label">Nomor Surat</label><Br>
              <div class="col-md-3">
                <input class="form-control" type="text" id="kode_jenis_3" name="kode_jenis_3" readonly=""  value="<?php echo $u->kode_jenis ?>">
              </div>
              <div class="col-md-3">
                <input class="form-control" type="text" id="kode_website_3" name="kode_website_3" readonly="" value="<?php echo $u->kode_website ?>">
              </div>
              <div class="col-md-3">
                <input class="form-control" type="text" id="bulan_2" name="bulan_2" readonly="" value="<?php echo $u->bulan ;?>">
              </div>
              <div class="col-md-3">
                <input class="form-control" type="text" id="nomor_urut_2" name="nomoe_urut_2" readonly="" value="<?php echo $aw; echo $u->nomor_urut;?>">
              </div>
            </div>
            <div class="form-group"><label class=" form-control-label">Kebutuhan</label><textarea id="kebutuhan_klien" name="kebutuhan_klien" class="form-control" rows="5" id="comment"> <?php echo $u->kebutuhan_klien ?></textarea></div>
            <div class="form-group"><label class=" form-control-label">Kategori</label>
              <select class="form-control" name="kategori" id="kategori">
                <option >Jasa</option>
                <option >Alat</option>
              </select>
            </div>
            <div class="form-group"><label class=" form-control-label">User</label><input type="text" id="user" name="user" class="form-control" value="admin" readonly="" value="<?php echo $u->user ?>"></div>
            <div class="form-group"><label class=" form-control-label">Nama Perusahaan</label><input type="text" id="nama_perusahaan_klien" name="nama_perusahaan_klien" class="form-control" value="<?php echo $u->nama_perusahaan_klien ?>"></div>
            <div class="form-group"><label class=" form-control-label">Alamat Perusahaan</label><input type="text" id="alamat_kantor_klien" name="alamat_kantor_klien" class="form-control" value="<?php echo $u->alamat_kantor_klien ?>"></div>
            <div class="form-group">
              <label class=" form-control-label">Nama Klien</label><Br>
              <div class="col-md-4">
                <input class="form-control" type="text" id="nama_klien" name="nama_klien" placeholder="Nama Klien" value="<?php echo $u->nama_klien ?>">
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" id="nama_klien_2" name="nama_klien_2" placeholder="Nama Klien lainnya jika ada" value="<?php echo $u->nama_klien_2 ?>">
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" id="nama_klien_3" name="nama_klien_3"  placeholder="Nama Klien lainnya jika ada" value="<?php echo $u->nama_klien_2 ?>">
              </div>
            </div>
            <div class="form-group">
              <label class=" form-control-label">HP Klien</label><Br>
              <div class="col-md-4">
                <input class="form-control" type="text" id="telepon_klien" name="telepon_klien" placeholder="Telepon Klien" value="<?php echo $u->telepon_klien ?>">
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" id="telepon_klien_2" name="telepon_klien_2" placeholder="Telepon Klien lainnya jika ada" value="<?php echo $u->telepon_klien_2 ?>">
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" id="telepon_klien_3" name="telepon_klien_3"  placeholder="Telepon Klien lainnya jika ada" value="<?php echo $u->telepon_klien_3 ?>">
              </div>
            </div>
            <div class="form-group">
              <label class=" form-control-label">Email Klien</label><Br>
              <div class="col-md-4">
                <input class="form-control" type="text" id="email_klien" name="email_klien" placeholder="Email Klien" required="" value="<?php echo $u->email_klien ?>">
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" id="email_klien_2" name="email_klien_2" placeholder="Email Klien lainnya jika ada" value="<?php echo $u->email_klien_2 ?>">
              </div>
              <div class="col-md-4">
                <input class="form-control" type="text" id="email_klien_3" name="email_klien_3"  placeholder="Email Klien lainnya jika ada" value="<?php echo $u->email_klien_3 ?>">
              </div>
            </div>
            <div class="form-group"><label class=" form-control-label">Telepon Kantor Klien</label><input type="text" id="telepon_office_klien" name="telepon_office_klien" class="form-control" value="<?php echo $u->telepon_office_klien  ?>"></div>
            <div class="form-group"><label class=" form-control-label">Tanggal Input</label><input type="date" id="tanggal_input" name="tanggal_input" class="form-control" readonly="" value="<?php echo $u->tanggal_input ?>"></div>
            <div class="form-group"><label class=" form-control-label">Tanggal Update</label><input type="date" id="tanggal_update" name="tanggal_update" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
            <div class="form-group"><label class=" form-control-label">Tanggal Quotation</label><input type="date" id="tanggal_quotation" name="tanggal_quotation" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
            <div class="form-group"><label class=" form-control-label">Progress Status</label>
            <select class="form-control" name="progress_status" id="progress_status">
                <option ><?php echo $u->progress_status ?></option>
                <option >Belum Quote</option>
                <option >Sudah Quote</option>
                <option >Sudah PO</option>
                <option >Close/Gagal</option>
              </select>
            </div>
            <div class="form-group"><label class=" form-control-label">Keterangan</label><textarea id="keterangan" name="keterangan" class="form-control" rows="5" id="comment"><?php echo $u->keterangan ?></textarea></div>
            <div class="form-group"><label class=" form-control-label">Nilai Quote</label><input type="text" id="nilai_quote" name="nilai_quote" class="form-control" value="<?php echo $u->nilai_quote ?>"></div>
            <div class="form-group"><label class=" form-control-label">Sales</label>
            <select class="form-control" name="pic" id="pic">
                <option ><?php echo $u->pic ?></option>
                <option >Anto</option>
                <option >Zulfikri</option>
                <option >Andis</option>
                <option >Bayu</option>
                <option >Yovan</option>
                <option >Faoji</option>
                <option >Hanifan</option>
                <option >Ridwan</option>
                <option >Redha</option>
                <option >Rafael</option>
                <option >Alfian</option>
                <option >Reza</option>
              </select>
            </div>
            <div class="form-group"><label class=" form-control-label">Klasifikasi</label><input type="text" id="team" name="team" class="form-control" value="<?php echo $u->team ?>"></div>
            <div class="form-group"><label class=" form-control-label">FUP Quote</label>
              <select class="form-control" name="fup_quote" id="fup_quote">
                <option ><?php echo $u->fup_quote ?></option>
                <option >Spek Teknis Masih di pelajari</option>
                <option >Spek Teknis OK, Harga NOK</option>
                <option >Spek Teknis OK, Harga Masih Negoisasi</option>
                <option >Spek Teknis NOK, perlu revisi</option>
                <option >Spek Teknik OK, Harga OK, masih didiskusikan</option>
              </select>
            </div>
            <div class="form-group"><label class=" form-control-label">Merk</label><input type="text" id="merk" name="merk" class="form-control" value="<?php echo $u->merk ?>"></div>
            <div>
            <?php } ?>
              <button id="save" type="submit" class="btn btn-lg btn-info btn-block">
              <i class="fa fa-save fa-lg"></i>&nbsp;
              <span id="save">Submit</span>
              </button>
              <button id="cancel" type="reset" class="btn btn-lg btn-info btn-block">
              <i class="fa fa-close fa-lg"></i>&nbsp;
              <span id="cancel">Reset</span>
              </button>
            </div>
          </form>
      </div>
    </div>
  </div>
  <?php } ?>
  </div> <!-- .card -->
  <script>
      function updateTextView(_obj){
        var num = getNumber(_obj.val());
        if(num==0){
          _obj.val('');
        }else{
          _obj.val(num.toLocaleString());
        }
      }
      function getNumber(_str){
        var arr = _str.split('');
        var out = new Array();
        for(var cnt=0;cnt<arr.length;cnt++){
          if(isNaN(arr[cnt])==false){
            out.push(arr[cnt]);
          }
        }
        return Number(out.join(''));
      }
      $(document).ready(function(){
        $(document.getElementById("nilai_quote")).on('keyup',function(){
          updateTextView($(this));
        });
      });
    </script>
  <?php
  include 'footer.php';
  ?>
