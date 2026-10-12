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
</style>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Ganti Foto</strong>
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
    })();
</script>
<?php
include 'footer.php';
?>
