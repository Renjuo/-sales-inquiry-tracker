<?php
// $modal = dimuat lewat AJAX sebagai popup di tabel: hanya kartu form, tanpa header/footer
$modal = !empty($modal);
if (!$modal) include 'header.php';
$u = isset($your_table[0]) ? $your_table[0] : null;
$urut = $u ? str_pad($u->nomor_urut, 4, '0', STR_PAD_LEFT) : '';
?>
<?php if (!$modal) { ?>
<div class="content mt-3">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-12">
<?php } ?>
        <div class="card">
          <div class="card-header">
            <strong class="card-title">Edit Data</strong>
            <div class="tb-sub"><?php echo $u ? 'Nomor Surat ' . html_escape($u->nomor_surat) : 'Data tidak ditemukan.'; ?></div>
            <?php if ($modal) { ?><button type="button" class="ed-close" data-tutup title="Tutup" aria-label="Tutup"><i class="fa fa-times"></i></button><?php } ?>
          </div>
          <?php if ($u) { ?>
          <form id="form-edit" class="tb-form" action="<?php echo base_url(). 'ubah_data'; ?>" method="post">
          <div class="card-body">

            <!-- 1. Nomor surat -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-hashtag"></i> Nomor Surat</h6>
              <div class="filter-grid">
                <!-- Nomor surat lengkap sudah tampil di judul; di sini cukup bagian-bagiannya (tidak bisa diubah) -->
                <div class="tb-grid tb-keep tb-4">
                  <div class="form-group"><label>Jenis Dokumen</label><input type="text" id="kode_jenis_2" name="kode_jenis_2" class="form-control" readonly="" value="<?php echo html_escape($u->kode_jenis) ?>"></div>
                  <div class="form-group"><label>Web Terkait</label><input type="text" id="kode_website_2" name="kode_website_2" class="form-control" readonly="" value="<?php echo html_escape($u->kode_website) ?>"></div>
                  <div class="form-group"><label>Bulan - Tahun</label><input type="text" id="bulan" name="bulan" class="form-control" value="<?php echo html_escape($u->bulan) ?>" readonly=""></div>
                  <div class="form-group"><label>Nomor Urut</label><input type="text" id="nomor_urut" name="nomor_urut" class="form-control" value="<?php echo $urut ?>" readonly=""></div>
                </div>
              </div>
            </div>

            <!-- 2. Kebutuhan -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-list-alt"></i> Kebutuhan</h6>
              <div class="filter-grid">
                <div class="form-group"><label>Kebutuhan</label><textarea id="kebutuhan_klien" name="kebutuhan_klien" class="form-control" rows="5"><?php echo html_escape(trim($u->kebutuhan_klien)) ?></textarea></div>
                <div class="tb-grid">
                <div class="form-group"><label>Produk Prioritas <i class="fa fa-info-circle tb-info" tabindex="0" data-info="Lorem ipsum"></i></label>
                  <select class="form-control" name="produk_prioritas" id="produk_prioritas">
                    <option >Tidak</option>
                    <option <?php echo $u->produk_prioritas === 'Iya' ? 'selected' : '' ?>>Iya</option>
                  </select>
                </div>
                <div class="form-group"><label>Kategori</label>
                  <select class="form-control" name="kategori" id="kategori">
                    <option ><?php echo html_escape($u->kategori) ?></option>
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
                </div>
              </div>
            </div>

            <!-- 3. Data perusahaan -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-building"></i> Data Perusahaan</h6>
              <div class="filter-grid">
                <div class="form-group"><label>User</label><input type="text" id="user" name="user" class="form-control" value="admin" readonly=""></div>
                <div class="form-group"><label>Nama Perusahaan</label><input type="text" id="nama_perusahaan_klien" name="nama_perusahaan_klien" class="form-control" value="<?php echo html_escape($u->nama_perusahaan_klien) ?>"></div>
                <div class="tb-grid">
                  <div class="form-group">
                    <label>Bidang Usaha</label>
                    <select class="form-control" name="bidang_usaha" id="bidang_usaha" required>
                      <option value="">-- Pilih Bidang Usaha --</option>
                      <?php
                      if(!empty($your_table)) {
                        foreach ($your_table as $bu) {
                          // Mencocokkan ID bidang usaha yang tersimpan di database your_table
                          $selected = ($bu->id_bidang_usaha == $u->bidang_usaha) ? 'selected' : '';
                          ?>
                          <option value="<?php echo $bu->id_bidang_usaha; ?>" <?php echo $selected; ?>>
                            <?php echo $bu->nama_bidang_usaha; ?>
                          </option>
                          <?php
                        }
                      }
                      ?>
                    </select>
                  </div>
                  <div class="form-group"><label>Business Line</label>
                    <input type="text" id="business_line" name="business_line" value="<?php echo html_escape($u->business_line) ?>" class="form-control">
                  </div>
                </div>
                <div class="form-group"><label>Alamat Perusahaan</label><input type="text" id="alamat_kantor_klien" name="alamat_kantor_klien" class="form-control" value="<?php echo html_escape($u->alamat_kantor_klien) ?>"></div>
                <div class="tb-grid">
                  <div class="form-group">
                    <label>Provinsi Perusahaan</label>
                    <select class="form-control" name="provinsi_perusahaan" id="provinsi_perusahaan" required>
                      <option value="">-- Pilih Provinsi --</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kota/Kabupaten Perusahaan</label>
                    <select class="form-control" name="kota_perusahaan" id="kota_perusahaan" required disabled>
                      <option value="">-- Pilih Kota/Kabupaten --</option>
                    </select>
                  </div>
                </div>
                <div class="form-group"><label>Telepon Kantor Klien</label><input type="text" id="telepon_office_klien" name="telepon_office_klien" class="form-control" value="<?php echo html_escape($u->telepon_office_klien) ?>"></div>
              </div>
            </div>

            <!-- 4. Kontak klien -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-address-book"></i> Kontak Klien</h6>
              <div class="filter-grid">
                <label>Nama Klien</label>
                <div class="tb-grid tb-kontak" style="--cols: 3;">
                  <input class="form-control" type="text" id="nama_klien" name="nama_klien" placeholder="Nama Klien" value="<?php echo html_escape($u->nama_klien) ?>">
                  <input class="form-control" type="text" id="nama_klien_2" name="nama_klien_2" placeholder="Nama Klien lainnya jika ada" value="<?php echo html_escape($u->nama_klien_2) ?>">
                  <input class="form-control" type="text" id="nama_klien_3" name="nama_klien_3" placeholder="Nama Klien lainnya jika ada" value="<?php echo html_escape($u->nama_klien_3) ?>">
                </div>
                <label class="mt-3">HP Klien</label>
                <div class="tb-grid tb-kontak" style="--cols: 3;">
                  <input class="form-control" type="text" id="telepon_klien" name="telepon_klien" placeholder="Telepon Klien" value="<?php echo html_escape($u->telepon_klien) ?>">
                  <input class="form-control" type="text" id="telepon_klien_2" name="telepon_klien_2" placeholder="Telepon Klien lainnya jika ada" value="<?php echo html_escape($u->telepon_klien_2) ?>">
                  <input class="form-control" type="text" id="telepon_klien_3" name="telepon_klien_3" placeholder="Telepon Klien lainnya jika ada" value="<?php echo html_escape($u->telepon_klien_3) ?>">
                </div>
                <label class="mt-3">Email Klien</label>
                <div class="tb-grid tb-kontak" style="--cols: 3;">
                  <input class="form-control" type="text" id="email_klien" name="email_klien" placeholder="Email Klien" value="<?php echo html_escape($u->email_klien) ?>">
                  <input class="form-control" type="text" id="email_klien_2" name="email_klien_2" placeholder="Email Klien lainnya jika ada" value="<?php echo html_escape($u->email_klien_2) ?>">
                  <input class="form-control" type="text" id="email_klien_3" name="email_klien_3" placeholder="Email Klien lainnya jika ada" value="<?php echo html_escape($u->email_klien_3) ?>">
                </div>
              </div>
            </div>

            <!-- 5. Inquiry -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-inbox"></i> Inquiry</h6>
              <div class="filter-grid">
                <div class="tb-grid" style="--cols: 3;">
                  <div class="form-group"><label>Tanggal Input</label><input type="date" id="tanggal_input" name="tanggal_input" class="form-control" readonly="" value="<?php echo html_escape($u->tanggal_input) ?>"></div>
                  <div class="form-group"><label>Tanggal Update</label><input type="date" id="tanggal_update" name="tanggal_update" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
                  <div class="form-group"><label>Tanggal Quotation</label><input type="date" id="tanggal_quotation" name="tanggal_quotation" class="form-control" readonly="" value="<?php echo date('Y-m-d') ?>"></div>
                </div>
                <div class="tb-grid">
                  <div class="form-group"><label>Sumber Inquiry</label>
                    <select class="form-control" name="sumber_inq" id="sumber_inq">
                      <option ><?php echo html_escape($u->sumber_inq) ?></option>
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
                  <div class="form-group"><label>Sumber Inquiry Berdasarkan Website</label>
                    <select class="form-control" name="sumber_inq_web" id="sumber_inq_web">
                      <option ><?php echo html_escape($u->sumber_inq_web) ?></option>
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
                  <div class="form-group"><label>Sales</label>
                    <select class="form-control" name="pic" id="pic">
                      <option ><?php echo html_escape($u->pic) ?></option>
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
                  </div>
                  <div class="form-group"><label>Team</label>
                    <select class="form-control" name="team" id="team">
                      <option ><?php echo html_escape($u->team) ?></option>
                      <option >Team Sales</option>
                      <option >Team Support Sales</option>
                    </select>
                  </div>
                  <div class="form-group"><label>Status Inquiry</label>
                    <select class="form-control" name="status" id="status">
                      <option ><?php echo html_escape($u->status) ?></option>
                      <option >Sudah PO</option>
                      <option >Sudah Quote</option>
                      <option >Belum Quote</option>
                      <option >Ditunda</option>
                      <option >Close/Gagal</option>
                    </select>
                  </div>
                </div>
                <div id="batas-followup" class="form-group mt-3" hidden>
                  <label>Batas Follow Up</label>
                  <input id="batas_followup" name="batas_followup" class="form-control" type="date"/>
                </div>
              </div>
            </div>

            <!-- 6. Progress FUP quotation -->
            <div class="tb-section">
              <h6 class="tb-title"><i class="fa fa-line-chart"></i> Progress FUP Quotation</h6>
              <div class="filter-grid">
                <div id="link1" class="form-group" hidden>
                  <label>Link File Quotation</label>
                  <input type="text" id="file_quotation" name="file_quotation" class="form-control cek-gdrive" value="<?php echo html_escape($u->file_quotation) ?>">
                  <small class="text-danger error-msg" style="display:none;">Wajib memasukkan link dari Google Drive!</small>
                </div>
                <div id="nilai_quo" class="form-group" hidden>
                  <label>Nilai Quotation</label>
                  <input id="nilai_quotation" name="nilai_quotation" class="input-currency form-control" type="text" type-currency="IDR" placeholder="Rp" value="<?php echo html_escape($u->nilai_quotation) ?>"/>
                </div>
                <div class="form-group"><label>Progress History Follow Up</label>
                  <textarea class="form-control" name="progress_hist_foll_up" id="progress_hist_foll_up" rows="5"><?php echo html_escape($u->progress_hist_foll_up) ?></textarea>
                </div>
                <div class="form-group">
                  <label>No PO dari Cust</label>
                  <input type="text" id="no_po" name="no_po" class="form-control" value="<?php echo html_escape($u->no_po) ?>">
                </div>
                <div id="nilai_pre-order" class="form-group" hidden>
                  <label>Nilai PO</label>
                  <input id="nilai_po" name="nilai_po" class="input-currency form-control" type="text" type-currency="IDR" placeholder="Rp" value="<?php echo html_escape($u->nilai_po) ?>"/>
                </div>
                <div id="link2" class="form-group" hidden>
                  <label>Link File PO</label>
                  <input type="text" id="file_po" name="file_po" class="form-control cek-gdrive" value="<?php echo html_escape($u->file_po) ?>">
                  <small class="text-danger error-msg" style="display:none;">Wajib memasukkan link dari Google Drive!</small>
                </div>
              </div>
            </div>
          </div>

          <div class="card-footer form-actions">
            <?php if ($modal) { ?><button type="button" class="btn btn-reset" data-tutup><i class="fa fa-times"></i><span>Tutup</span></button><?php } ?>
            <button type="reset" class="btn btn-reset">
              <i class="fa fa-rotate-left"></i><span>Reset</span>
            </button>
            <button type="submit" class="btn btn-primary">
              <i class="fa fa-save"></i><span>Simpan</span>
            </button>
          </div>
          </form>
          <script>
          // Semua elemen dicari di dalam form ini saja: saat jadi popup, halaman tabel bisa punya id yang sama (mis. #status)
          (function ($) {
            var $f = $('#form-edit');
            function el(id) { return $f.find('[id="' + id + '"]')[0]; }

            // Format rupiah saat dibuka dan saat mengetik
            function formatElementToIDR(element) {
              var value = parseInt(element.value.replace(/[^,\d]/g, ''));
              element.value = isNaN(value) ? '' : value.toLocaleString('id-ID', { currency: 'IDR', style: 'currency', minimumFractionDigits: 0 });
            }
            $f.find('input[type-currency="IDR"]').each(function () {
              if (this.value !== '') formatElementToIDR(this);
            }).on('keyup', function () {
              var cursorPostion = this.selectionStart, originalLenght = this.value.length;
              formatElementToIDR(this);
              // Mengatur posisi kursor agar tidak melompat ke belakang saat mengetik
              cursorPostion = this.value.length - originalLenght + cursorPostion;
              this.setSelectionRange(cursorPostion, cursorPostion);
            });

            // Field quotation / PO / batas follow up mengikuti status
            function checkstatusvalue() {
              var statusvalue = el('status').value.trim().toLowerCase();
              var isQuote   = (statusvalue === "sudah quote");
              var isPO      = (statusvalue === "sudah po");
              var isDitunda = (statusvalue === "ditunda");
              var isClose   = (statusvalue === "close/gagal");

              if (!isDitunda) {
                var showQuote = (isQuote || isPO);

                // Jika statusnya CLOSE, field quotation tetap ditampilkan agar datanya tidak hilang & terlihat
                el('link1').hidden             = !(showQuote || isClose);
                el('nilai_quo').hidden         = !(showQuote || isClose);
                // Required hanya aktif jika statusnya memang sedang di posisi Quote atau PO
                el('file_quotation').required  = showQuote;
                el('nilai_quotation').required = showQuote;
                // Jangan kosongkan data jika statusnya adalah Close/Gagal
                if (!showQuote && !isClose) {
                  el('nilai_quotation').value = "";
                  el('file_quotation').value = "";
                }

                // Jika statusnya CLOSE, field PO tetap ditampilkan jika sebelumnya sudah ada data PO
                el('link2').hidden            = !(isPO || isClose);
                el('nilai_pre-order').hidden  = !(isPO || isClose);
                el('file_po').required        = isPO;
                el('nilai_po').required       = isPO;
                if (!isPO && !isClose) {
                  el('file_po').value = "";
                  el('nilai_po').value = "";
                }
              }

              el('batas-followup').hidden   = !isDitunda;
              el('batas_followup').required = isDitunda;
            }
            el('status').addEventListener('change', checkstatusvalue);
            checkstatusvalue();

            // cek link google drive
            $f.find('.cek-gdrive').on('change keyup input', function () {
              var url = $(this).val().trim();
              var errorMsg = $(this).siblings('.error-msg');
              if (url === "") {
                errorMsg.hide();
                $(this).removeClass('is-invalid is-valid');
                return;
              }
              var ok = /^(https?:\/\/)?(www\.)?(drive|docs)\.google\.com\/.+/i.test(url);
              errorMsg.toggle(!ok);
              $(this).toggleClass('is-invalid', !ok).toggleClass('is-valid', ok);
            });

            // Provinsi -> Kota/Kabupaten, dengan data lama terpilih
            var dataWilayah = <?php echo isset($wilayah_json) ? $wilayah_json : '[]'; ?>;
            var provinsiLama = <?php echo json_encode((string) $u->provinsi); ?>;
            var kotaLama     = <?php echo json_encode((string) $u->kab_kota); ?>;
            var $provinsiSelect = $(el('provinsi_perusahaan'));
            var $kotaSelect = $(el('kota_perusahaan'));

            $.each(dataWilayah, function (index, provinsi) {
              $('<option>').val(provinsi.nama_provinsi).text(provinsi.nama_provinsi).attr('data-id', provinsi.id)
                .prop('selected', provinsi.nama_provinsi === provinsiLama).appendTo($provinsiSelect);
            });

            function muatKota(provinsiId, nilaiKotaTerpilih) {
              $kotaSelect.html('<option value="">-- Pilih Kota/Kabupaten --</option>');
              var provinsiTerpilih = provinsiId && dataWilayah.find(function (prov) { return prov.id == provinsiId; });
              if (!provinsiTerpilih || !provinsiTerpilih.kota_kabupaten) {
                $kotaSelect.prop('disabled', true);
                return;
              }
              $.each(provinsiTerpilih.kota_kabupaten, function (index, kota) {
                $('<option>').val(kota.nama).text(kota.nama).prop('selected', kota.nama === nilaiKotaTerpilih).appendTo($kotaSelect);
              });
              $kotaSelect.prop('disabled', false);
            }

            var initialProvinsiId = $provinsiSelect.find(':selected').data('id');
            if (initialProvinsiId) muatKota(initialProvinsiId, kotaLama);
            $provinsiSelect.on('change', function () {
              muatKota($(this).find(':selected').data('id'), ''); // Kosongkan seleksi kota lama jika provinsi diganti baru
            });
          })(jQuery);
          </script>
          <?php } ?>
        </div>
<?php if (!$modal) { ?>
      </div>
    </div>
  </div>
</div>
<?php
  include 'footer.php';
}
?>
