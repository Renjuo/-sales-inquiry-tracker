<?php
include 'header.php';
// Foto saat ini: file di ./gambar/ milik user (tuser.gambar), fallback ke avatar default
$user_foto = isset($_SESSION['no']) ? $this->db->get_where('tuser', array('no' => $_SESSION['no']))->row() : null;
$foto = base_url() . 'images/admin.jpg';
if (!empty($upload_data['file_name'])) {
    $foto = base_url() . 'gambar/' . $upload_data['file_name'];
} elseif ($user_foto && !empty($user_foto->gambar) && is_file(FCPATH . 'gambar/' . $user_foto->gambar)) {
    $foto = base_url() . 'gambar/' . rawurlencode($user_foto->gambar);
}
// Warna bubble chat milik user (NULL = biru tema)
$user_warna = $this->db->select('warna_chat')->get_where('tuser', array('username' => $_SESSION['username']))->row();
$warna_aktif = ($user_warna && $user_warna->warna_chat) ? $user_warna->warna_chat : '#1e5bd6';
$warna_bebas = !isset(Admin::WARNA_CHAT[$warna_aktif]); // dipilih lewat lingkaran RGB
?>
<style>
    .foto-wrap { align-items: center; display: flex; gap: 24px; }
    .foto-preview {
        border: 4px solid #fff;
        border-radius: 50%;
        box-shadow: 0 0 0 1px var(--border), 0 8px 24px rgba(15, 23, 42, .10);
        flex: 0 0 auto;
        height: 132px;
        object-fit: cover;
        width: 132px;
    }
    .foto-drop {
        align-items: center;
        background: linear-gradient(180deg, #f8fbff, #f2f6fd);
        border: 1.5px dashed #c7d6f2;
        border-radius: 16px;
        cursor: pointer;
        display: flex;
        flex: 1 1 0;
        flex-direction: column;
        gap: 6px;
        justify-content: center;
        margin: 0;
        min-height: 132px;
        min-width: 0;
        padding: 16px;
        text-align: center;
        transition: border-color .2s ease, background-color .2s ease, box-shadow .2s ease;
    }
    .foto-drop:hover, .foto-drop.is-drag { background: var(--brand-soft); border-color: var(--brand-600); box-shadow: 0 0 0 4px rgba(30, 91, 214, .08); }
    .foto-drop .fa { color: var(--brand-600); font-size: 26px; }
    .foto-drop strong { color: var(--text-strong); font-size: 14px; }
    .foto-drop small { color: var(--text-muted); font-size: 12px; }
    .foto-drop input[type=file] { display: none; }
    .foto-nama { color: var(--brand-700); font-size: 12.5px; font-weight: 600; word-break: break-all; }
    @media (max-width: 575.98px) {
        .foto-wrap { gap: 12px; }
        .foto-preview { height: 96px; width: 96px; }
        .foto-drop { min-height: 96px; padding: 12px 10px; }
        .foto-drop .fa { font-size: 22px; }
        .foto-drop strong { font-size: 13px; }
        .foto-drop small { font-size: 11px; }
    }
    .card-body .alert p { margin: 0; color: inherit; font-size: 13px; }

    /* Warna bubble chat: pilihan warna + pratinjau percakapan */
    .warna-wrap { align-items: center; display: flex; flex-wrap: wrap; gap: 24px; }
    .warna-pilih { display: flex; flex: 1 1 280px; flex-wrap: wrap; gap: 10px; margin: 0; }
    .warna-opsi { cursor: pointer; margin: 0; position: relative; }
    .warna-opsi input { opacity: 0; pointer-events: none; position: absolute; }
    .warna-opsi span { border: 3px solid #fff; border-radius: 50%; box-shadow: 0 0 0 1px var(--border); display: block; height: 38px; transition: box-shadow .15s ease, transform .15s ease; width: 38px; }
    .warna-opsi:hover span { transform: scale(1.08); }
    .warna-opsi input:checked + span { box-shadow: 0 0 0 2px var(--chip); }
    .warna-opsi input:checked + span::after { color: #fff; content: "\f00c"; display: flex; font: 14px/32px FontAwesome; justify-content: center; }
    .warna-opsi input:focus-visible + span { box-shadow: 0 0 0 2px var(--chip), 0 0 0 5px rgba(30, 91, 214, .25); }
    .warna-contoh { background: var(--bg-page); border: 1px solid var(--border); border-radius: 16px; display: flex; flex: 1 1 260px; flex-direction: column; gap: 8px; padding: 14px; }
    .warna-contoh .bubble { border-radius: 14px; font-size: 13px; max-width: 80%; padding: 7px 11px; }
    .warna-contoh .masuk { align-self: flex-start; background: #eef1f6; border: 1px solid #dde3ec; border-bottom-left-radius: 4px; color: var(--text-strong); }
    .warna-contoh .keluar { align-self: flex-end; background: var(--warna); border-bottom-right-radius: 4px; color: #fff; transition: background-color .2s ease; }
    .warna-contoh .keluar small { color: rgba(255, 255, 255, .78); font-size: 10.5px; margin-left: 8px; }
    .warna-contoh.terang .keluar { color: #0f172a; }
    .warna-contoh.terang .keluar small { color: rgba(15, 23, 42, .6); }
    /* Lingkaran RGB: warna bebas; setelah dipilih, isinya warna terpilih dengan cincin pelangi */
    .warna-rgb span { background: conic-gradient(#f00, #ff0, #0f0, #0ff, #00f, #f0f, #f00) !important; }
    .warna-rgb input:checked + span { background: radial-gradient(circle, var(--chip) 0 52%, transparent 54%), conic-gradient(#f00, #ff0, #0f0, #0ff, #00f, #f0f, #f00) !important; }
    .warna-rgb input:checked + span::after { content: none; }
    .warna-rgb input[type=color] { border: 0; cursor: pointer; height: 100%; inset: 0; opacity: 0; padding: 0; pointer-events: auto; width: 100%; }
    html[data-theme="dark"] .warna-opsi span { border-color: var(--bg-surface); }
    html[data-theme="dark"] .warna-contoh .masuk { background: #1c2a49; border-color: #2a3a57; }
</style>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Profil</strong>
                        <div class="text-muted" style="font-size: 12.5px;">Foto profil akun <?php echo htmlspecialchars($_SESSION['username']); ?></div>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($error)) { ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php } elseif (!empty($upload_data)) { ?>
                            <div class="alert alert-success"><p><i class="fa fa-check-circle"></i>&nbsp; Foto berhasil diganti.</p></div>
                        <?php } ?>

                        <?php echo form_open_multipart('aksi_upload'); ?>
                            <!-- Foto & area unggah sejajar (tinggi sama) -->
                            <div class="foto-wrap">
                                <img class="foto-preview" id="fotoPreview" src="<?php echo $foto; ?>" alt="Foto profil">
                                <label class="foto-drop" id="fotoDrop" for="berkas">
                                    <i class="fa fa-cloud-upload"></i>
                                    <strong>Klik atau seret foto ke sini</strong>
                                    <small>JPG, PNG, atau GIF &middot; maks. 100 KB &middot; maks. 1024 &times; 768 px</small>
                                    <span class="foto-nama" id="fotoNama"></span>
                                    <input type="file" name="berkas" id="berkas" accept=".jpg,.jpeg,.png,.gif">
                                </label>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary" style="height: 42px; border-radius: 12px; padding: 0 22px;">
                                    <i class="fa fa-upload"></i>&nbsp; Simpan Foto
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Warna Bubble Chat</strong>
                        <div class="text-muted" style="font-size: 12.5px;">Warna pesan Anda di chat data, terlihat oleh semua user</div>
                    </div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('warna_ok')) { ?>
                            <div class="alert alert-success"><p><i class="fa fa-check-circle"></i>&nbsp; Warna bubble chat berhasil disimpan.</p></div>
                        <?php } ?>
                        <?php echo form_open('simpan_warna_chat'); ?>
                            <div class="warna-wrap">
                                <div class="warna-pilih" role="radiogroup" aria-label="Warna bubble chat">
                                    <?php foreach (Admin::WARNA_CHAT as $kode => $nama) { ?>
                                        <label class="warna-opsi" title="<?php echo $nama; ?>" style="--chip: <?php echo $kode; ?>">
                                            <input type="radio" name="warna_chat" value="<?php echo $kode; ?>" aria-label="<?php echo $nama; ?>" <?php echo $kode === $warna_aktif ? 'checked' : ''; ?>>
                                            <span style="background: <?php echo $kode; ?>"></span>
                                        </label>
                                    <?php } ?>
                                    <label class="warna-opsi warna-rgb" title="Warna lain" style="--chip: <?php echo $warna_bebas ? $warna_aktif : '#ffffff'; ?>">
                                        <input type="radio" name="warna_chat" id="warnaRgb" value="<?php echo $warna_bebas ? $warna_aktif : ''; ?>" aria-label="Warna lain" <?php echo $warna_bebas ? 'checked' : ''; ?>>
                                        <span></span>
                                        <input type="color" id="warnaPicker" value="<?php echo $warna_aktif; ?>" aria-label="Pilih warna lain">
                                    </label>
                                </div>
                                <div class="warna-contoh" id="warnaContoh" style="--warna: <?php echo $warna_aktif; ?>" aria-hidden="true">
                                    <div class="bubble masuk">Halo, data ini mohon dicek ya.</div>
                                    <div class="bubble keluar">Baik, segera saya proses.<small>09:15 &#10003;&#10003;</small></div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary" style="height: 42px; border-radius: 12px; padding: 0 22px;">
                                    <i class="fa fa-check"></i>&nbsp; Simpan Warna
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function () {
        var input = document.getElementById('berkas'), drop = document.getElementById('fotoDrop');
        // Pratinjau foto & nama file sebelum disimpan
        function tampil() {
            var file = input.files[0];
            if (!file) return;
            document.getElementById('fotoNama').textContent = file.name + ' (' + Math.ceil(file.size / 1024) + ' KB)';
            document.getElementById('fotoPreview').src = URL.createObjectURL(file);
        }
        input.addEventListener('change', tampil);
        ['dragenter', 'dragover'].forEach(function (ev) {
            drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.add('is-drag'); });
        });
        ['dragleave', 'drop'].forEach(function (ev) {
            drop.addEventListener(ev, function (e) { e.preventDefault(); drop.classList.remove('is-drag'); });
        });
        drop.addEventListener('drop', function (e) { input.files = e.dataTransfer.files; tampil(); });

        // Pratinjau warna bubble sebelum disimpan; warna muda memakai teks gelap (sama seperti di chat)
        var contoh = document.getElementById('warnaContoh'), rgb = document.getElementById('warnaRgb');
        function pratinjau(hex) {
            var m = /^#([0-9a-f]{2})([0-9a-f]{2})([0-9a-f]{2})$/i.exec(hex) || [0, 0, 0, 0];
            contoh.style.setProperty('--warna', hex);
            contoh.classList.toggle('terang', (parseInt(m[1], 16) * 299 + parseInt(m[2], 16) * 587 + parseInt(m[3], 16) * 114) / 1000 > 160);
        }
        Array.prototype.forEach.call(document.querySelectorAll('input[name=warna_chat]'), function (r) {
            r.addEventListener('change', function () { if (r.value) pratinjau(r.value); });
        });
        document.getElementById('warnaPicker').addEventListener('input', function () {
            rgb.value = this.value;
            rgb.checked = true;
            rgb.parentNode.style.setProperty('--chip', this.value);
            pratinjau(this.value);
        });
        pratinjau(contoh.style.getPropertyValue('--warna').trim());
    })();
</script>
<?php
include 'footer.php';
?>
