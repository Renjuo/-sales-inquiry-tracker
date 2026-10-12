<?php
/**
 * Clean URL: address bar hanya menampilkan alamat dasar BeforePO (tanpa nama halaman,
 * query string, maupun #token dari SSO). Halaman tetap dimuat dari alamat aslinya.
 * Dimuat di <head>: <?php $this->load->view('partials/clean_url'); ?>
 */
?>
<script>
(function () {
    var dasar = '<?php echo base_url(); ?>', asli = location.href.split('#')[0];
    // Muat ulang halaman ini (pengganti location.reload(), yang akan memuat alamat dasar)
    window.bpReload = function () { location.replace(asli); };
    try {
        // Refresh (F5) memuat alamat dasar -> server membuka Data Testindo. Kembalikan ke halaman yang tadi dibuka.
        var nav = performance.getEntriesByType && performance.getEntriesByType('navigation')[0];
        var terakhir = sessionStorage.getItem('bp_url');
        if (nav && nav.type === 'reload' && terakhir && terakhir !== asli) { location.replace(terakhir); return; }
        sessionStorage.setItem('bp_url', asli);
    } catch (e) {}
    if (window.history && history.replaceState) history.replaceState(null, document.title, dasar);

    // Link di sidebar & header: alamat tujuan tidak tampil di status bar browser (pojok bawah) saat disorot.
    // href dipindah ke data-go lalu navigasi lewat klik/Enter. Link "#" (pembuka dropdown) cukup dilepas href-nya.
    function sembunyi(a) {
        var h = a && a.getAttribute('href');
        if (!h || (h.charAt(0) !== '#' && a.href.indexOf(dasar) !== 0)) return;
        if (h.charAt(0) === '#') a.setAttribute('data-tombol', ''); else a.setAttribute('data-go', a.href);
        a.removeAttribute('href');
        a.setAttribute('role', h.charAt(0) === '#' ? 'button' : 'link');
        a.setAttribute('tabindex', '0');
        a.style.cursor = 'pointer';
    }
    function linkNav(e) { return e.target.closest ? e.target.closest('#left-panel a, #header a') : null; }
    function buka(e) {
        // Pembuka dropdown tanpa href: Enter = klik
        var tombol = e.type === 'keydown' && e.key === 'Enter' && e.target.closest ? e.target.closest('a[data-tombol]') : null;
        if (tombol) { e.preventDefault(); tombol.click(); return; }
        var a = e.target.closest ? e.target.closest('a[data-go]') : null;
        if (!a || (e.type === 'keydown' && e.key !== 'Enter')) return;
        e.preventDefault();
        var go = a.getAttribute('data-go');
        if (e.ctrlKey || e.metaKey || e.shiftKey || a.target === '_blank') window.open(go); else location.href = go;
    }
    document.addEventListener('DOMContentLoaded', function () {
        Array.prototype.forEach.call(document.querySelectorAll('#left-panel a[href], #header a[href]'), sembunyi);
    });
    // Link yang ditambahkan belakangan (mis. isi notifikasi): disembunyikan saat disorot/difokus
    ['mouseover', 'focusin', 'touchstart'].forEach(function (t) { document.addEventListener(t, function (e) { sembunyi(linkNav(e)); }, true); });
    document.addEventListener('click', buka);
    document.addEventListener('keydown', buka);
})();
</script>
