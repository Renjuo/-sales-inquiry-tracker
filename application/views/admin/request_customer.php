<?php
include 'header.php';
$e = function ($t) { return htmlspecialchars((string) $t, ENT_QUOTES, 'UTF-8'); };
?>
<style>
  .rq-table td { vertical-align: top; }
  .rq-table .rq-kebutuhan { max-width: 360px; white-space: pre-line; }
  .rq-table small { color: var(--text-muted); display: block; }
  .rq-status { border-radius: 999px; display: inline-block; font-size: 11.5px; font-weight: 700; padding: 3px 10px; }
  .rq-status.baru { background: #fef3c7; color: #92400e; }
  .rq-status.diproses { background: #dcfce7; color: #166534; }
  .rq-table .row-actions { justify-content: flex-start; }
</style>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Request Customer</strong>
                        <div class="toolbar-sub text-muted" style="font-size: 12.5px;"><?php echo count($requests); ?> request dari form customer &middot; klik Konfirmasi untuk memeriksa, melengkapi, lalu menyimpannya ke Data Your_company</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped rq-table" style="font-size: 12.5px;">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Perusahaan</th>
                                        <th>Kontak</th>
                                        <th>Kategori</th>
                                        <th>Kebutuhan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if (!$requests) { ?>
                                    <tr><td colspan="7" class="text-center text-muted">Belum ada request dari customer.</td></tr>
                                <?php } ?>
                                <?php foreach ($requests as $r) { ?>
                                    <tr>
                                        <td class="text-nowrap"><?php echo date('d/m/Y H:i', strtotime($r->tanggal_request)); ?></td>
                                        <td><strong><?php echo $e($r->nama_perusahaan_klien); ?></strong>
                                            <small><?php echo $e(trim($r->kab_kota . ', ' . $r->provinsi, ', ')); ?></small></td>
                                        <td><?php echo $e($r->nama_klien); ?>
                                            <small><?php echo $e($r->telepon_klien); ?></small>
                                            <small><?php echo $e($r->email_klien); ?></small></td>
                                        <td><?php echo $e($r->kategori); ?></td>
                                        <td class="rq-kebutuhan"><?php echo $e($r->kebutuhan_klien); ?></td>
                                        <td><span class="rq-status <?php echo $r->status == 'Baru' ? 'baru' : 'diproses'; ?>"><?php echo $e($r->status); ?></span>
                                            <small><?php echo $e($r->nomor_surat); ?></small></td>
                                        <td>
                                            <div class="row-actions">
                                                <?php if ($r->status == 'Baru') { ?>
                                                    <a class="icon-btn konfirmasi" data-info="Konfirmasi request" aria-label="Konfirmasi request" href="<?php echo base_url('tambah-data?request=' . $r->id_request); ?>"><i class="fa fa-check"></i></a>
                                                <?php } ?>
                                                <a class="icon-btn danger" data-info="Hapus request" aria-label="Hapus request" href="<?php echo base_url('hapus_request/' . $r->id_request); ?>"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Konfirmasi hapus: popup bergaya sama dengan Data Your_company, pengganti confirm() bawaan browser -->
<div id="ed-modal" class="ed-modal"></div>
<script>
  (function ($) {
    var $modal = $('#ed-modal');
    function tutup() { $modal.removeClass('is-open').empty(); $('body').removeClass('ed-lock'); }

    $(document).on('click', 'a[href*="/hapus_request/"]', function (e) {
      if ($(this).closest($modal).length) return; // tombol "Hapus" di dalam popup: lanjut ke href
      e.preventDefault();
      $('body').addClass('ed-lock');
      $modal.addClass('is-open').html(
        '<div class="card ed-confirm"><div class="card-body">' +
          '<div class="ed-confirm-icon"><i class="fa fa-trash-o"></i></div>' +
          '<h5>Hapus request ini?</h5>' +
          '<p>Request dari <strong></strong> akan dihapus permanen dan tidak bisa dikembalikan.</p>' +
        '</div><div class="card-footer form-actions">' +
          '<button type="button" class="btn btn-reset" data-tutup><i class="fa fa-times"></i><span>Batal</span></button>' +
          '<a class="btn btn-danger"><i class="fa fa-trash-o"></i><span>Hapus</span></a>' +
        '</div></div>');
      $modal.find('strong').text($(this).closest('tr').find('td:eq(1) strong').text());
      $modal.find('a.btn-danger').attr('href', this.href).trigger('focus');
    });
    $modal.on('click', '[data-tutup]', tutup);
    $(document).on('keydown', function (e) { if (e.key === 'Escape' && $modal.hasClass('is-open')) tutup(); });
  })(jQuery);
</script>
<?php
include 'footer.php';
?>
