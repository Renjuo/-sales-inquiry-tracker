<?php
include 'header.php';
?>
<style>
  /* Form tambah: bagian-bagian berpanel, gaya sama dengan panel filter halaman lain */
  .tb-section { margin-bottom: 18px; }
  .tb-section:last-child { margin-bottom: 0; }
  .tb-title { align-items: center; color: var(--text-strong); display: flex; font-size: 14px; font-weight: 700; gap: 8px; margin: 0 0 10px; }
  .tb-title .fa { align-items: center; background: var(--brand-soft); border-radius: 8px; color: var(--brand-600); display: inline-flex; font-size: 13px; height: 28px; justify-content: center; width: 28px; }
  .tb-form .filter-grid .form-group { margin-bottom: 12px; }
  .tb-form .filter-grid .form-group:last-child { margin-bottom: 0; }
  .tb-form .filter-grid textarea.form-control { height: auto; padding: 10px 12px; }
  .tb-form .filter-grid .form-control[readonly] { background: #f1f5f9; color: var(--text-muted); }
  .tb-grid { align-items: end; display: grid; gap: 12px; grid-template-columns: repeat(var(--cols, 2), minmax(0, 1fr)); }
  .tb-grid > .form-group { margin-bottom: 0 !important; }
  .tb-grid + .form-group, .form-group + .tb-grid, .tb-grid + .tb-grid { margin-top: 12px; }
  .tb-sub { color: var(--text-muted); font-size: 12px; margin-top: 2px; }
  /* Nomor surat: KODE - WEB - MMYY - URUT */
  .tb-nosurat { align-items: center; display: grid; gap: 6px; grid-template-columns: 1fr auto 1fr auto 1fr auto 1fr; }
  .tb-nosurat span { color: var(--text-faint); font-weight: 700; }
  .tb-nosurat .form-control { font-weight: 600; min-width: 0; text-align: center; }
  /* HP: kolom bertumpuk agar isi tidak terpotong (bagian Nomor Surat yang isinya pendek tetap berdampingan) */
  @media (max-width: 575.98px) {
    .tb-grid:not(.tb-keep) { --cols: 1 !important; }
  }
</style>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Tambah Data</strong>
            <div class="tb-sub">Rekap Data INQ Cust</div>
          </div>
          <form class="tb-form" action="<?php echo base_url(). 'tambah_data'; ?>" method="post">
          <?php if (!empty($request)) { ?>
            <input type="hidden" name="id_request" value="<?php echo (int) $request['id_request']; ?>">
            <script>
              // Dari menu Request Customer: isian customer jadi nilai awal, sisanya dilengkapi user
              // (window load: menunggu daftar provinsi selesai diisi oleh script di bawah)
              $(window).on('load', function () {
                var r = <?php echo json_encode($request, JSON_HEX_TAG | JSON_HEX_AMP | JSON_INVALID_UTF8_SUBSTITUTE); ?>;
                ['kebutuhan_klien', 'kategori', 'nama_perusahaan_klien', 'bidang_usaha', 'business_line', 'alamat_kantor_klien', 'telepon_office_klien',
                 'nama_klien', 'nama_klien_2', 'nama_klien_3', 'telepon_klien', 'telepon_klien_2', 'telepon_klien_3',
                 'email_klien', 'email_klien_2', 'email_klien_3'].forEach(function (id) { $('#' + id).val(r[id] || ''); });
                $('#provinsi_perusahaan').val(r.provinsi || '').trigger('change'); // isi daftar kota dulu
                $('#kota_perusahaan').val(r.kab_kota || '');
                $('#kategori').trigger('change'); // isi daftar Detail Kategori sesuai kategori dari customer
                $('#sumber_inq').val('Website');
                $('#nama_perusahaan_klien').closest('.pr-wrap').addClass('is-isi');
              });
            </script>
          <?php } ?>
          <div class="card-body">

            <!-- 1. Nomor surat -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-hashtag"></i> Nomor Surat</h6>
              <div class="filter-grid">
                <div class="tb-grid tb-keep">
                  <div class="form-group">
                    <label for="kode_jenis">Jenis Dokumen</label>
                    <select name="kode_jenis" id="kode_jenis" class="form-control" onchange="jenis(kode_jenis)" required="">
                      <?php
                      foreach ($tjenis as $u) {
                      ?>
                      <option value="<?php echo $u->kode_jenis ?>"><?php echo $u->keterangan_jenis ?></option>
                      <?php } ?>
                    </select>
                    <script>
                    function jenis(opt){
                    var jenis=opt.value;
                    document.getElementById('kode_jenis_2').value = jenis;
                    document.getElementById('kode_jenis_3').value = jenis;
                    }
                    </script>
                    <input type="hidden" id="kode_jenis_2" name="kode_jenis_2">
                  </div>
                  <div class="form-group">
                    <label for="kode_website">Web Terkait</label>
                    <select name="kode_website" id="kode_website" class="form-control" onchange="website(kode_website),count_data($query,kode_website)" required="">
                      <option></option>
                      <?php
                      foreach ($twebsite as $u) {
                      ?>
                      <option value="<?php echo $u->kode_website ?>"><?php echo $u->keterangan_website ?></option>
                      <?php } ?>
                    </select>
                    <script>
                    function website(opt){
                    var website=opt.value;
                    document.getElementById('kode_website_2').value = website;
                    document.getElementById('kode_website_3').value = website;
                    $website = website;

                    $.ajax({
                      method: "POST",
                      url: "<?php echo base_url(). 'count_data'; ?>",
                      data: { kode_website: website }
                    })
                      .done(function( response ) {
                        document.getElementById('nomor_urut').value = response;
                        document.getElementById('nomor_urut_2').value = response;
                      });
                    }
                    </script>
                    <input type="hidden" id="kode_website_2" name="kode_website_2">
                  </div>
                </div>
                <div class="tb-grid tb-keep">
                  <div class="form-group"><label for="bulan">Bulan - Tahun</label><input type="text" id="bulan" name="bulan" class="form-control" value="<?php echo date('my') ;?>" readonly=""></div>
                  <div class="form-group"><label for="nomor_urut">Nomor Urut</label><input type="text" id="nomor_urut" name="nomor_urut" class="form-control" readonly=""></div>
                </div>
                <div class="form-group">
                  <label>Nomor Surat</label>
                  <div class="tb-nosurat">
                    <input class="form-control" type="text" id="kode_jenis_3" name="kode_jenis_3" readonly="">
                    <span>-</span>
                    <input class="form-control" type="text" id="kode_website_3" name="kode_website_3" readonly="">
                    <span>-</span>
                    <input class="form-control" type="text" id="bulan_2" name="bulan_2" readonly="" value="<?php echo date('my') ;?>">
                    <span>-</span>
                    <input class="form-control" type="text" id="nomor_urut_2" name="nomor_urut_2" readonly="">
                  </div>
                </div>
              </div>
            </div>

            <?php
            // PERBAIKAN 1: Menutup foreach $tsurat langsung di sini agar tidak membungkus form di bawahnya
            if(!empty($tsurat)) {
                foreach ($tsurat as $u) {
                    // loop kosong jika hanya digunakan sebagai pemicu data di awal template asli
                }
            }
            ?>

            <!-- 2. Kebutuhan -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-list-alt"></i> Kebutuhan</h6>
              <div class="filter-grid">
                <div class="form-group"><label for="kebutuhan_klien">Kebutuhan</label><textarea id="kebutuhan_klien" name="kebutuhan_klien" class="form-control" rows="5"></textarea></div>
                <div class="form-group"><label for="produk_prioritas">Produk Prioritas <i class="fa fa-info-circle tb-info" tabindex="0" data-info="Lorem ipsum"></i></label>
                  <select class="form-control" name="produk_prioritas" id="produk_prioritas">
                    <option >Tidak</option>
                    <option >Iya</option>
                  </select>
                </div>
                <div class="form-group"><label for="kategori">Kategori</label>
                  <select class="form-control" name="kategori" id="kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option >Data Logger</option>
                    <option >Sensor</option>
                    <option >NDT Instrument</option>
                    <option >Geoteknik Instrument</option>
                    <option >Soil Instrument</option>
                    <option >Testing Machine</option>
                    <option >Weather, Hydrology & Eviromental Instrument</option>
                    <option >Vibration & Condition Monitoring Instrument</option>
                    <option >Software</option>
                    <option >Instrument Lainnya</option>
                    <option >SHMS</option>
                    <option >Jasa NDT Beton</option>
                    <option >Jasa NDT Metal</option>
                    <option >Jasa Audit Struktur Gedung</option>
                    <option >Jasa Monitoring</option>
                    <option >Jasa Uji Pondasi</option>
                    <option >Jasa Repair/Upgrade</option>
                    <option >Jasa Survey </option>
                    <option >Jasa Condition Monitoring</option>
                    <option >Jasa Geoteknik </option>
                    <option >Jasa Kalibrasi</option>
                    <option >Jasa Dynamometer </option>
                    <option >Jasa Loading Test</option>
                    <option >Jasa Uji Lainnya</option>
                  </select>
                </div>
                <div class="form-group" id="grup_detail_kategori" style="display: none;"><label for="detail_kategori">Detail Kategori</label>
                  <select class="form-control" name="detail_kategori" id="detail_kategori" disabled>
                    <option value="">-- Pilih Detail Kategori --</option>
                  </select>
                </div>
                <script>
                  // Detail kategori baru muncul setelah kategori dipilih, isinya mengikuti kategori itu (data: tabel tdetail_kategori)
                  $(function () {
                    var detail = <?php echo json_encode(isset($detail_kategori) ? $detail_kategori : array(), JSON_HEX_TAG | JSON_HEX_AMP | JSON_INVALID_UTF8_SUBSTITUTE); ?>;
                    var $kategori = $('#kategori'), $detail = $('#detail_kategori');
                    function isi() {
                      var daftar = detail[$.trim($kategori.val())] || [];
                      $detail.html($('<option value="">').text(daftar.length ? '-- Pilih Detail Kategori --' : 'Belum ada detail untuk kategori ini'));
                      daftar.forEach(function (nama) { $detail.append($('<option>').text(nama)); });
                      $detail.prop('disabled', !daftar.length);
                      $('#grup_detail_kategori').toggle($.trim($kategori.val()) !== '');
                    }
                    $kategori.on('change', isi);
                    $kategori.closest('form').on('reset', function () { setTimeout(isi, 0); });
                    isi();
                  });
                </script>
              </div>
            </div>

            <!-- 3. Data perusahaan -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-building"></i> Data Perusahaan</h6>
              <div class="filter-grid">
                <div class="form-group"><label for="user">User</label><input type="text" id="user" name="user" class="form-control" value="<?php echo $_SESSION['username']?>" readonly=""></div>
                <div class="form-group pr-wrap"><label for="nama_perusahaan_klien">Nama Perusahaan</label><input type="text" id="nama_perusahaan_klien" name="nama_perusahaan_klien" class="form-control" autocomplete="off" placeholder="Klik untuk pilih perusahaan terdaftar atau ketik nama baru" required></div>
                <div class="tb-grid">
                  <div class="form-group">
                    <label for="bidang_usaha">Bidang Usaha</label>
                    <select class="form-control" name="bidang_usaha" id="bidang_usaha" required>
                      <option value="">-- Pilih Bidang Usaha --</option>
                      <?php
                      if(!empty($tbidang_usaha)) {
                        foreach ($tbidang_usaha as $bu) {
                          ?>
                          <option value="<?php echo $bu->id_bidang_usaha; ?>">
                            <?php echo $bu->nama_bidang_usaha; ?>
                          </option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group"><label for="business_line">Business Line <span style="font-weight: 500; letter-spacing: 0; text-transform: none;"></span></label>
                    <input type="text" id="business_line" name="business_line" class="form-control" placeholder='Jika tidak ada, isi "-"' required>
                  </div>
                </div>
                <div class="form-group"><label for="alamat_kantor_klien">Alamat Perusahaan</label><input type="text" id="alamat_kantor_klien" name="alamat_kantor_klien" class="form-control"></div>
                <div class="tb-grid">
                  <div class="form-group">
                    <label for="provinsi_perusahaan">Provinsi Perusahaan</label>
                    <select class="form-control" name="provinsi_perusahaan" id="provinsi_perusahaan" required>
                      <option value="">-- Pilih Provinsi --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kota_perusahaan">Kota/Kabupaten Perusahaan</label>
                    <select class="form-control" name="kota_perusahaan" id="kota_perusahaan" required disabled>
                      <option value="">-- Pilih Kota/Kabupaten --</option>
                    </select>
                  </div>
                </div>
                <div class="form-group"><label for="telepon_office_klien">Telepon Kantor Klien</label><input type="text" id="telepon_office_klien" name="telepon_office_klien" class="form-control"></div>
              </div>
            </div>

            <!-- 4. Kontak klien -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-address-book"></i> Kontak Klien</h6>
              <div class="filter-grid">
                <label>Nama Klien</label>
                <div class="tb-grid tb-kontak" style="--cols: 3;">
                  <input class="form-control" type="text" id="nama_klien" name="nama_klien" placeholder="Nama Klien">
                  <input class="form-control" type="text" id="nama_klien_2" name="nama_klien_2" placeholder="Nama Klien lainnya jika ada">
                  <input class="form-control" type="text" id="nama_klien_3" name="nama_klien_3" placeholder="Nama Klien lainnya jika ada">
                </div>
                <label class="mt-3">HP Klien</label>
                <div class="tb-grid tb-kontak" style="--cols: 3;">
                  <input class="form-control" type="text" id="telepon_klien" name="telepon_klien" placeholder="Telepon Klien">
                  <input class="form-control" type="text" id="telepon_klien_2" name="telepon_klien_2" placeholder="Telepon Klien lainnya jika ada">
                  <input class="form-control" type="text" id="telepon_klien_3" name="telepon_klien_3" placeholder="Telepon Klien lainnya jika ada">
                </div>
                <label class="mt-3">Email Klien</label>
                <div class="tb-grid tb-kontak" style="--cols: 3;">
                  <input class="form-control" type="text" id="email_klien" name="email_klien" placeholder="Email Klien">
                  <input class="form-control" type="text" id="email_klien_2" name="email_klien_2" placeholder="Email Klien lainnya jika ada">
                  <input class="form-control" type="text" id="email_klien_3" name="email_klien_3" placeholder="Email Klien lainnya jika ada">
                </div>
              </div>
            </div>

            <!-- 5. Inquiry -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-inbox"></i> Inquiry</h6>
              <div class="filter-grid">
                <div class="tb-grid" style="--cols: 3;">
                  <div class="form-group"><label for="tanggal_input">Tanggal Input</label><input type="date" id="tanggal_input" name="tanggal_input" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
                  <div class="form-group"><label for="tanggal_update">Tanggal Update</label><input type="date" id="tanggal_update" name="tanggal_update" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
                  <div class="form-group"><label for="tanggal_quotation">Tanggal Quotation</label><input type="date" id="tanggal_quotation" name="tanggal_quotation" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
                </div>
                <div class="tb-grid">
                  <div class="form-group"><label for="sumber_inq">Sumber Inquiry</label>
                    <select class="form-control" name="sumber_inq" id="sumber_inq">
                      <option >Website</option>
                      <option >Email Promosi</option>
                      <option >Whatsapp Promosi</option>
                      <option >Telemarketing/Personal Sales</option>
                      <option >Personal Sales</option>
                      <option >Sosial Media</option>
                      <option >Telepon Kantor</option>
                      <option >Sumber Belum Diketahui</option>
                    </select>
                  </div>
                  <div class="form-group"><label for="sumber_inq_web">Sumber Inquiry Berdasarkan Website</label>
                    <select class="form-control" name="sumber_inq_web" id="sumber_inq_web">
                      <option >Testindo.co.id</option>
                      <option >Testindo.com</option>
                      <option >Vibrasindo.co.id</option>
                      <option >Testingindonesia.co.id</option>
                      <option >Dataloggerindonesia.co.id</option>
                      <option >NDT-Indonesia.com</option>
                      <option >Sensorindo.com</option>
                      <option >Alatujigeoteknik.com</option>
                      <option >Sistemmonitoring.com</option>
                      <option >Inquiry Bukan Dari Website</option>
                    </select>
                  </div>
                </div>
                <div class="tb-grid" style="--cols: 3;">
                  <div class="form-group"><label for="pic">Sales</label>
                    <?php
                    // PERBAIKAN 2: Menggunakan Session level secara langsung agar bebas dari error variable $row
                    $session_level = isset($_SESSION['level']) ? $_SESSION['level'] : '';

                    if ($session_level == "admin"){ ?>
                      <select class="form-control" name="pic" id="pic">
                        <option >Alfian</option>
                        <option >Alfin Rusdi</option>
                        <option >Bayu</option>
                        <option >Erdi</option>
                        <option >Fahrie</option>
                        <option >Faoji</option>
                        <option >Hanifan</option>
                        <option >Irsyad</option>
                        <option >Rafael</option>
                        <option >Ridwan</option>
                        <option >Redha</option>
                        <option >Syaehu</option>
                        <option >Yovan</option>
                        <option >Zulfikri</option>
                        <option >Belum ada sales</option>
                      </select>
                    <?php } ?>
                    <?php if ($session_level == "sales"){ ?>
                      <input type="text" id="pic" name="pic" class="form-control" readonly="" value="<?php echo $_SESSION['username']?>">
                    <?php } ?>
                  </div>
                  <div class="form-group"><label for="team">Team</label>
                    <select class="form-control" name="team" id="team">
                      <option ></option>
                      <option >Team Sales</option>
                      <option >Team Support Sales</option>
                    </select>
                  </div>
                  <div class="form-group"><label for="status">Status Inquiry</label>
                    <select class="form-control" name="status" id="status">
                        <option >Belum Quote</option>
                        <option >Ditunda</option>
                        <option >Sudah Quote</option>
                        <option >Sudah PO</option>
                        <option >Close/Gagal</option>
                    </select>
                  </div>
                </div>
                <div id="batas-followup" class="form-group mt-3" hidden>
                    <label for="batas_followup">Batas Follow Up</label>
                    <input id="batas_followup" name="batas_followup" class="form-control" type="date"/>
                </div>
              </div>
            </div>

            <!-- 6. Progress inquiry -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-line-chart"></i> Progress Inquiry</h6>
              <div class="filter-grid">
                <div id="link1" class="form-group" hidden>
                    <label for="file_quotation">Link File Quotation</label>
                    <input type="text" id="file_quotation" name="file_quotation" class="form-control cek-gdrive">
                    <small class="text-danger error-msg" style="display:none;">Wajib memasukkan link dari Google Drive!</small>
                </div>
                <div id="nilai_quo" class="form-group" hidden>
                    <label for="nilai_quotation">Nilai Quotation</label>
                    <input id="nilai_quotation" name="nilai_quotation" class="input-currency form-control" type="text" type-currency="IDR" placeholder="Rp"/>
                </div>
                <div class="form-group"><label for="progress_hist_foll_up">Progress History Follow Up</label>
                    <textarea class="form-control" name="progress_hist_foll_up" id="progress_hist_foll_up" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <label for="no_po">No PO dari Cust</label>
                    <input type="text" id="no_po" name="no_po" class="form-control">
                </div>
                <div id="nilai_pre-order" class="form-group" hidden>
                    <label for="nilai_po">Nilai PO</label>
                    <input id="nilai_po" name="nilai_po" class="input-currency form-control" type="text" type-currency="IDR" placeholder="Rp"/>
                </div>
                <div id="link2" class="form-group" hidden>
                    <label for="file_po">Link File PO</label>
                    <input type="text" id="file_po" name="file_po" class="form-control cek-gdrive">
                    <small class="text-danger error-msg" style="display:none;">Wajib memasukkan link dari Google Drive!</small>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer form-actions">
            <button id="cancel" type="reset" class="btn btn-reset">
              <i class="fa fa-rotate-left"></i><span>Reset</span>
            </button>
            <button id="save" type="submit" class="btn btn-primary">
              <i class="fa fa-save"></i><span>Submit</span>
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    document.querySelectorAll('input[type-currency="IDR"]').forEach((element) => {
      element.addEventListener('keyup', function(e) {
      let cursorPostion = this.selectionStart;
        let value = parseInt(this.value.replace(/[^,\d]/g, ''));
        let originalLenght = this.value.length;
        if (isNaN(value)) {
          this.value = "";
        } else {    
          this.value = value.toLocaleString('id-ID', {
            currency: 'IDR',
            style: 'currency',
            minimumFractionDigits: 0
          });
          cursorPostion = this.value.length - originalLenght + cursorPostion;
          this.setSelectionRange(cursorPostion, cursorPostion);
        }
      });
    });
</script>
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
    $(document.getElementById("nilai_po")).on('keyup',function(){
      updateTextView($(this));
    });
  });
  
  function checkstatusvalue(){
        var statusSelect = document.getElementById("status");
        if (!statusSelect) return;
    
        var statusvalue = statusSelect.value.trim().toLowerCase();
        
        var isQuote   = (statusvalue === "sudah quote");
        var isPO      = (statusvalue === "sudah po");
        var isDitunda = (statusvalue === "ditunda");
    
        if (!isDitunda) {
            var showQuote = (isQuote || isPO);
            document.getElementById("link1").hidden             = !showQuote;
            document.getElementById("nilai_quo").hidden         = !showQuote;
            document.getElementById("file_quotation").required  = showQuote;
            document.getElementById("nilai_quotation").required = showQuote;
            if(!showQuote) {
                document.getElementById("nilai_quotation").value = "";
                document.getElementById("file_quotation").value = "";
            }
    
            document.getElementById("link2").hidden            = !isPO;
            document.getElementById("nilai_pre-order").hidden  = !isPO;
            document.getElementById("file_po").required        = isPO;
            document.getElementById("nilai_po").required       = isPO;
            if(!isPO) {
                document.getElementById("file_po").value = "";
                document.getElementById("nilai_po").value = "";
            }
        }
    
        document.getElementById("batas-followup").hidden = !isDitunda; 
        document.getElementById("batas_followup").required     = isDitunda;
    }

    $(document).ready(function(){
        var statusElem = document.getElementById("status");
        if(statusElem) {
            statusElem.addEventListener("change", checkstatusvalue);
        }
        checkstatusvalue();
    });
      
    $('.cek-gdrive').on('change keyup input', function() {
        var url = $(this).val().trim();
        var errorMsg = $(this).siblings('.error-msg'); 
        
        if (url === "") {
            errorMsg.hide();
            $(this).removeClass('is-invalid is-valid');
            return;
        }
    
        var googleDrivePattern = /^(https?:\/\/)?(www\.)?(drive|docs)\.google\.com\/.+/i;
    
        if (!googleDrivePattern.test(url)) {
            errorMsg.show();
            $(this).addClass('is-invalid').removeClass('is-valid');
        } else {
            errorMsg.hide();
            $(this).removeClass('is-invalid').addClass('is-valid');
        }
    });
</script>
<script>
  $(document).ready(function() {
    // Menampung data JSON dari PHP ke JavaScript
    var dataWilayah = <?php echo isset($wilayah_json) ? $wilayah_json : '[]'; ?>;
    
    var $provinsiSelect = $('#provinsi_perusahaan');
    var $kotaSelect = $('#kota_perusahaan');

    // 1. Isi data Dropdown Provinsi saat halaman selesai dimuat
    if(dataWilayah.length > 0) {
        $.each(dataWilayah, function(index, provinsi) {
            $provinsiSelect.append('<option value="' + provinsi.nama_provinsi + '" data-id="' + provinsi.id + '">' + provinsi.nama_provinsi + '</option>');
        });
    }

    // 2. Logic ketika Provinsi dipilih (Mengubah isi Kota/Kabupaten)
    $provinsiSelect.on('change', function() {
        var selectedProvinsiId = $(this).find(':selected').data('id');
        
        // Reset dropdown kota/kabupaten
        $kotaSelect.html('<option value="">-- Pilih Kota/Kabupaten --</option>');
        
        if (!selectedProvinsiId) {
            $kotaSelect.prop('disabled', true);
            return;
        }

        // Cari data provinsi yang sesuai di dalam objek JSON
        var provinsiTerpilih = dataWilayah.find(function(prov) {
            return prov.id == selectedProvinsiId;
        });

        // Jika ketemu dan ada data kota_kabupaten di dalamnya, masukkan ke select
        if (provinsiTerpilih && provinsiTerpilih.kota_kabupaten) {
            $.each(provinsiTerpilih.kota_kabupaten, function(index, kota) {
                // Menampilkan format: "Kabupaten Jayawijaya" atau "Kota Jakarta Pusat"
                var namaLengkapKota = kota.nama;
                $kotaSelect.append('<option value="' + namaLengkapKota + '">' + namaLengkapKota + '</option>');
            });
            // Aktifkan kembali dropdown kota
            $kotaSelect.prop('disabled', false);
        } else {
            $kotaSelect.prop('disabled', true);
        }
    });
  });
</script>
<!-- Dropdown perusahaan terdaftar: maks. 5 hasil + pencarian, pilih = isi otomatis data perusahaan -->
<style>
  .pr-wrap { position: relative; }
  .pr-pop {
    animation: pr-in .16s ease;
    background: #fff;
    border: 1px solid #e3eaf6;
    border-radius: 14px;
    box-shadow: 0 12px 32px rgba(15, 23, 42, .12);
    display: none;
    left: 0;
    margin-top: 6px;
    padding: 6px;
    position: absolute;
    right: 0;
    top: 100%;
    z-index: 1050;
  }
  .pr-wrap.is-open .pr-pop { display: block; }
  .pr-field { position: relative; }
  .pr-batal {
    background: transparent;
    border: 0;
    border-radius: 10px;
    color: var(--text-muted);
    display: none;
    font-size: 12px;
    font-weight: 600;
    padding: 5px 10px;
    position: absolute;
    right: 6px;
    top: 50%;
    transform: translateY(-50%);
    transition: background-color .15s ease, color .15s ease;
  }
  .pr-batal:hover, .pr-batal:focus { background: #f1f5fd; color: var(--brand-700); outline: 0; }
  .pr-wrap.is-isi .pr-batal { display: block; }
  .pr-wrap.is-isi .pr-field .form-control { padding-right: 78px; }
  @keyframes pr-in { from { opacity: 0; transform: translateY(-4px); } }
  .pr-search {
    background: #f8fafc url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' viewBox='0 0 24 24'%3E%3Ccircle cx='11' cy='11' r='7'/%3E%3Cpath d='m20 20-3.5-3.5'/%3E%3C/svg%3E") no-repeat 12px center;
    border: 1px solid #dfe6f1;
    border-radius: 10px;
    color: var(--text-strong);
    font-size: 14px;
    height: 40px;
    margin-bottom: 6px;
    outline: 0;
    padding: 0 12px 0 36px;
    width: 100%;
  }
  .pr-search:focus { background-color: #fff; border-color: var(--brand-600); box-shadow: 0 0 0 4px rgba(30, 91, 214, .12); }
  .pr-item {
    background: transparent;
    border: 0;
    border-radius: 10px;
    display: block;
    padding: 9px 12px;
    text-align: left;
    transition: background-color .15s ease;
    width: 100%;
  }
  .pr-item:hover, .pr-item.is-active { background: #f1f5fd; }
  .pr-item strong { color: var(--text-strong); display: block; font-size: 14px; font-weight: 600; }
  .pr-item small { color: var(--text-muted); display: block; font-size: 12px; margin-top: 2px; }
  .pr-item.pr-baru strong { color: var(--brand-700); }
  .pr-empty { color: var(--text-muted); font-size: 13px; padding: 10px 12px; }
</style>
<script>
  (function ($) {
    var $input = $('#nama_perusahaan_klien'), $wrap = $input.closest('.pr-wrap');
    var $pop = $('<div class="pr-pop"><input type="search" class="pr-search" placeholder="Cari nama perusahaan..." autocomplete="off"><div class="pr-list"></div></div>').appendTo($wrap);
    var $search = $pop.find('.pr-search'), $list = $pop.find('.pr-list'), timer, req, data = [], terpilih = '';

    function esc(t) { return $('<div>').text(t || '').html(); }

    function render(q) {
      var html = data.map(function (p, i) {
        var lokasi = [p.kab_kota, p.provinsi].filter(Boolean).join(', ') || p.alamat_kantor_klien || 'Lokasi belum diisi';
        return '<button type="button" class="pr-item" data-i="' + i + '"><strong>' + esc(p.nama_perusahaan_klien) + '</strong><small>' + esc(lokasi) + '</small></button>';
      }).join('');
      if (!data.length) html = '<div class="pr-empty">' + (q ? 'Perusahaan belum terdaftar.' : 'Belum ada data perusahaan.') + '</div>';
      // Nama yang belum terdaftar tetap bisa dipakai sebagai perusahaan baru
      if (q) html += '<button type="button" class="pr-item pr-baru" data-baru="1"><strong>+ Gunakan "' + esc(q) + '"</strong><small>sebagai perusahaan baru</small></button>';
      $list.html(html);
    }

    function cari() {
      var q = $.trim($search.val());
      if (req) req.abort();
      req = $.getJSON('<?php echo base_url(); ?>cari_perusahaan', { q: q }).done(function (res) { data = res || []; render(q); });
    }

    function buka() {
      if ($wrap.hasClass('is-open')) return;
      $wrap.addClass('is-open');
      $search.val($input.val());
      cari();
      setTimeout(function () { $search.trigger('focus'); }, 0);
    }
    // Tombol Batal di ujung kanan field: hanya tampil kalau nama perusahaan terisi
    $input.wrap('<div class="pr-field"></div>').after('<button type="button" class="pr-batal"><i class="fa fa-times"></i> Batal</button>');
    $wrap.on('click', '.pr-batal', function () { if (terpilih) pilih({}); else { $input.val(''); tutup(); } });

    function tutup() { $wrap.removeClass('is-open').toggleClass('is-isi', !!$input.val()); }
    // Batal (klik di luar / Esc): kalau nama perusahaan terpilih dihapus/diubah, data isian otomatisnya ikut dikosongkan
    function batal() {
      if (!$wrap.hasClass('is-open')) return;
      if (terpilih && $.trim($search.val()) !== terpilih) pilih({}); else tutup();
    }

    // Pilih perusahaan terdaftar: isi otomatis dari data terakhir yang pernah diisi (yang belum pernah diisi dikosongkan)
    function pilih(p) {
      terpilih = p.nama_perusahaan_klien || '';
      $input.val(terpilih);
      ['bidang_usaha', 'alamat_kantor_klien', 'telepon_office_klien',
       'nama_klien', 'nama_klien_2', 'nama_klien_3',
       'telepon_klien', 'telepon_klien_2', 'telepon_klien_3',
       'email_klien', 'email_klien_2', 'email_klien_3'].forEach(function (id) {
        $('#' + id).val(p[id] || '');
      });
      $('#provinsi_perusahaan').val(p.provinsi || '').trigger('change'); // isi daftar kota dulu
      $('#kota_perusahaan').val(p.kab_kota || '');
      tutup();
    }

    $input.on('focus click', buka);
    $search.on('input', function () { clearTimeout(timer); timer = setTimeout(cari, 200); });
    $list.on('click', '.pr-item', function () {
      if ($(this).data('baru')) { var baru = $.trim($search.val()); if (terpilih && baru !== terpilih) pilih({}); $input.val(baru); tutup(); return; }
      pilih(data[$(this).data('i')]);
    });
    // Keyboard: panah atas/bawah, Enter memilih, Esc menutup
    $search.on('keydown', function (e) {
      var $items = $list.find('.pr-item'), i = $items.index($items.filter('.is-active'));
      if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
        e.preventDefault();
        i = e.key === 'ArrowDown' ? Math.min(i + 1, $items.length - 1) : Math.max(i - 1, 0);
        $items.removeClass('is-active').eq(i).addClass('is-active');
      } else if (e.key === 'Enter') {
        e.preventDefault();
        ($items.filter('.is-active').length ? $items.filter('.is-active') : $items.first()).trigger('click');
      } else if (e.key === 'Escape') {
        batal();
      }
    });
    $(document).on('mousedown', function (e) { if (!$(e.target).closest($wrap).length) batal(); });
  })(jQuery);
</script>
<?php
include 'footer.php';
?>
