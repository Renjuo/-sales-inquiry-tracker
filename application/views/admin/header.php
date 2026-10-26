<?php
defined('BASEPATH') or exit('No direct script access allowed');
if (!isset($_SESSION['username'])) {
    redirect('login/index');
}
?>
<!doctype html>
<html class="no-js" lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT Testindo - Before PO Admin</title>
    <meta name="description" content="PT Testindo - Before PO Admin">
    <meta name="theme-color" content="#1e5bd6">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="only light">
    <script>/* Tema tersimpan (light/dark) dipasang sebelum halaman digambar */ try { if (localStorage.getItem('bp_tema') === 'dark') document.documentElement.setAttribute('data-theme', 'dark'); } catch (e) {}</script>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.png">
    <?php $this->load->view('partials/clean_url'); ?>
    <link rel="apple-touch-icon" href="<?php echo base_url(); ?>images/favicon.png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/scss/style.css">
    <link href="<?php echo base_url(); ?>assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/lib/datatable/buttons.bootstrap4.min.css">

    <!-- Google Fonts: non-blocking (preload trick) -->
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"></noscript>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.css?v=<?php echo filemtime(FCPATH . 'assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/tema.css?v=<?php echo filemtime(FCPATH . 'assets/css/tema.css'); ?>">

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // fixedHeaderTable hanya dipakai di layar besar, karena bentrok dengan tabel responsive di HP
            if (window.innerWidth > 768 && typeof $ !== 'undefined' && $.fn.fixedHeaderTable) {
                $('#bootstrap-data-table').fixedHeaderTable({
                    altClass: 'odd',
                    footer: false,
                    fixedColumns: 1,
                });
            }
        });
    </script>
</head>

<body>
<script>/* Desktop: sidebar default tertutup (ikon saja), tanpa kedip saat halaman dimuat */ if (window.innerWidth >= 992) document.body.classList.add('open');</script>
<?php $this->load->view('loader'); ?>
<?php // Pesan sekali tampil: dihapus dari session begitu dibaca (flashdata CI di project ini tidak terhapus sendiri)
$pesan_berhasil = $this->session->userdata('berhasil'); if ($pesan_berhasil) { $this->session->unset_userdata('berhasil'); ?>
<!-- Notifikasi berhasil: muncul di posisi loader setelah loading selesai, hilang sendiri setelah 2 detik -->
<style>
    #page-sukses { align-items: center; display: flex; inset: 0; justify-content: center; opacity: 0; pointer-events: none; position: fixed; transition: opacity .3s ease, visibility .3s ease; visibility: hidden; z-index: 99998; }
    #page-sukses.tampil { opacity: 1; visibility: visible; }
    #page-sukses .ps-card { align-items: center; background: #fff; border: 1px solid #dcfce7; border-radius: 18px; box-shadow: 0 10px 30px rgba(15, 23, 42, .12); display: flex; flex-direction: column; gap: 14px; padding: 26px 30px 22px; transform: translateY(6px) scale(.97); transition: transform .3s ease; }
    #page-sukses.tampil .ps-card { transform: none; }
    #page-sukses .ps-ikon { align-items: center; background: #dcfce7; border-radius: 50%; color: #16a34a; display: flex; font-size: 22px; height: 52px; justify-content: center; width: 52px; }
    #page-sukses .ps-teks { color: var(--text-strong, #0f172a); font: 600 14px/1.3 var(--font, "Inter", "Segoe UI", system-ui, sans-serif); text-align: center; }
</style>
<div id="page-sukses" role="status">
    <div class="ps-card">
        <div class="ps-ikon"><i class="fa fa-check"></i></div>
        <div class="ps-teks"><?php echo htmlspecialchars($pesan_berhasil, ENT_QUOTES, 'UTF-8'); ?></div>
    </div>
</div>
<script>
    window.addEventListener('load', function () {
        var el = document.getElementById('page-sukses');
        setTimeout(function () { el.classList.add('tampil'); }, 350);        // setelah loader memudar
        setTimeout(function () { el.classList.remove('tampil'); }, 2350);    // tampil 2 detik
    });
</script>
<?php } ?>

    <?php
    // Penanda menu aktif berdasarkan URL saat ini
    $seg2 = $this->uri->rsegment(2);
    $seg3 = $this->uri->rsegment(3);
    $is_active = function ($method, $param = null) use ($seg2, $seg3) {
        return ($seg2 == $method && ($param === null || $seg3 == $param)) ? 'active' : '';
    };

    // Ambil level user sekali saja (fallback ke database jika session belum berisi level)
    $level = isset($_SESSION['level']) ? $_SESSION['level'] : '';
    if ($level === '') {
        $row_user = $this->db->get_where('tuser', array('username' => $_SESSION['username']))->row();
        $level = $row_user ? $row_user->level : '';
    }
    $is_admin = ($level == 'admin');
    $can_add  = ($level == 'admin' || $level == 'sales' || $level == 'business development');
    $can_request = ($level == 'admin' || $level == 'business development');
    ?>

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>data-testindo"><img src="<?php echo base_url(); ?>images/testindo_logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="<?php echo base_url(); ?>data-testindo"><img src="<?php echo base_url(); ?>images/logo-crop.png" alt="Logo"></a>
                <button type="button" class="sidebar-close" id="sidebarClose" aria-label="Tutup menu"><span class="hamburger is-x" aria-hidden="true"><span></span><span></span><span></span></span></button>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <?php if ($is_admin) { ?>
                        <!-- Data Testindo: tahun berjalan + semua tahun sebelumnya (otomatis bertambah tiap ganti tahun) -->
                        <li class="menu-item-has-children dropdown <?php echo ($is_active('index_2', 'TST') || $is_active('arsip', 'TST')) ? 'active' : ''; ?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-database"></i>Data Testindo</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-database"></i><a href="<?php echo base_url(); ?>data-testindo">Data Testindo</a></li>
                                <?php for ($th = date('Y') - 1; $th >= 2023; $th--) { ?>
                                    <li><i class="fa fa-calendar"></i><a href="<?php echo base_url(); ?>data-testindo/<?php echo $th; ?>">Data Testindo <?php echo $th; ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="<?php echo $is_active('index_2', 'VB'); ?>">
                            <a href="<?php echo base_url(); ?>data-vibrasindo"> <i class="menu-icon fa fa-database"></i>Data Vibrasindo</a>
                        </li>
                    <?php } else { ?>
                        <li class="<?php echo $is_active('index_2', 'TST'); ?>">
                            <a href="<?php echo base_url(); ?>data-testindo"> <i class="menu-icon fa fa-database"></i>Data Testindo</a>
                        </li>
                    <?php } ?>

                    <?php if ($can_add) { ?>
                        <li>
                            <h3 class="menu-title">Option</h3>
                        </li>
                        <li class="<?php echo $is_active('tambah'); ?>">
                            <a href="<?php echo base_url(); ?>tambah-data"> <i class="menu-icon fa fa-plus-circle"></i>Tambah Data </a>

                        </li>
                        <?php if ($can_request) { ?>
                        <li class="<?php echo $is_active('request_customer'); ?>">
                            <a href="<?php echo base_url(); ?>request-customer"> <i class="menu-icon fa fa-inbox"></i>Request Customer <span class="notif-badge" hidden></span></a>
                        </li>
                        <?php } ?>
                    <?php } ?>

                    <?php if ($is_admin) { ?>
                        <li>
                            <h3 class="menu-title">PROGRES</h3>
                        </li>
                        <li class="<?php echo $is_active('data_sudah_po'); ?>">
                            <a href="<?php echo base_url(); ?>sudah-po"> <i class="menu-icon fa fa-check-circle"></i>SUDAH PO </a>
                        </li>
                        <li class="<?php echo $is_active('data_sudah_quote'); ?>">
                            <a href="<?php echo base_url(); ?>sudah-quote"> <i class="menu-icon fa fa-file-text-o"></i>SUDAH QUOTE </a>
                        </li>
                        <li class="<?php echo $is_active('data_belum_quote'); ?>">
                            <a href="<?php echo base_url(); ?>belum-quote"> <i class="menu-icon fa fa-clock-o"></i>BELUM QUOTE </a>
                        </li>
                        <li class="<?php echo $is_active('data_close'); ?>">
                            <a href="<?php echo base_url(); ?>close-gagal"> <i class="menu-icon fa fa-times-circle"></i>CLOSE/GAGAL </a>
                        </li>

                        <li>
                            <h3 class="menu-title">ANALYTIC</h3>
                        </li>
                        <li class="menu-item-has-children dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>ANALYTIC</a>
                            <ul class="sub-menu children dropdown-menu">
                                <li><i class="fa fa-bar-chart"></i><a href="<?php echo base_url(); ?>analytic">Analytic</a></li>
                                <?php // Tahun lalu otomatis (mulai 2026; 2024 & 2023 memakai halaman lama di bawah) ?>
                                <?php for ($th = date('Y') - 1; $th >= 2026; $th--) { ?>
                                    <li><i class="fa fa-bar-chart"></i><a href="<?php echo base_url(); ?>analytic/<?php echo $th; ?>">Analytic <?php echo $th; ?></a></li>
                                <?php } ?>
                                <li><i class="fa fa-bar-chart"></i><a href="<?php echo base_url(); ?>analytic/2025">Analytic 2025</a></li>
                                <li><i class="fa fa-bar-chart"></i><a href="<?php echo base_url(); ?>analytic/2024">Analytic 2024</a></li>
                                <li><i class="fa fa-bar-chart"></i><a href="<?php echo base_url(); ?>analytic/2023">Analytic 2023</a></li>
                                <li><i class="fa fa-line-chart"></i><a href="<?php echo base_url(); ?>analytic/per-tahun">Analytic Data Pertahun</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>display-prospek"> <i class="menu-icon fa fa-desktop"></i>Display Prospek</a>
                        </li>

                        <li>
                            <h3 class="menu-title">EXPORT</h3>
                        </li>
                        <li class="<?php echo $is_active('halaman_export'); ?>">
                            <a href="<?php echo base_url(); ?>export-data"> <i class="menu-icon fa fa-download"></i>Export Data</a>
                        </li>
                    <?php } ?>
                    <li>
                        <h3 class="menu-title">Akun</h3>
                    </li>
                    <li class="menu-logout">
                        <a href="<?php echo base_url(); ?>login/keluar"> <i class="menu-icon fa fa-sign-out"></i>Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
    </aside>
    <div class="sidebar-backdrop" id="sidebarBackdrop"></div>

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">
            <div class="header-menu">

                <!-- Kiri: tombol toggle + sapaan -->
                <div class="header-left-wrap">
                    <a id="menuToggle" class="menutoggle" aria-label="Buka menu"><span class="hamburger" aria-hidden="true"><span></span><span></span><span></span></span></a>
                    <h4 class="header-welcome">Halo, <?php echo htmlspecialchars($_SESSION['username']); ?> 
                </div>
                <!-- Kanan: avatar -->
                <div class="header-right-wrap">
                    <!-- Ganti tema terang / gelap (pilihan disimpan di browser) -->
                    <button type="button" class="tema-toggle" id="temaToggle" aria-label="Ganti tema terang atau gelap"><i class="fa fa-moon-o"></i><i class="fa fa-sun-o"></i></button>
                    <script>
                        document.getElementById('temaToggle').addEventListener('click', function () {
                            var gelap = document.documentElement.getAttribute('data-theme') !== 'dark';
                            if (gelap) document.documentElement.setAttribute('data-theme', 'dark'); else document.documentElement.removeAttribute('data-theme');
                            try { localStorage.setItem('bp_tema', gelap ? 'dark' : 'light'); } catch (e) {}
                        });
                        // Cahaya latar mengikuti kursor (lihat html::before di tema.css); padam saat kursor keluar jendela
                        (function () {
                            var akar = document.documentElement, jadwal = false, x = 0, y = 0;
                            document.addEventListener('mousemove', function (e) {
                                if (document.getElementById('tabel-baru')) return; // halaman tabel besar: efek dimatikan (lihat index_2.php)
                                x = e.clientX; y = e.clientY;
                                if (jadwal) return; jadwal = true;
                                requestAnimationFrame(function () { jadwal = false; akar.style.setProperty('--mx', x + 'px'); akar.style.setProperty('--my', y + 'px'); akar.style.setProperty('--glow', '1'); });
                            }, { passive: true });
                            document.addEventListener('mouseleave', function () { akar.style.setProperty('--glow', '0'); });
                        })();
                    </script>
                    <!-- Notifikasi: pesan chat masuk (semua user) + request baru dari form customer eksternal (admin) -->
                    <div class="notif-area dropdown">
                        <a href="#" class="notif-bell" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-label="Notifikasi">
                            <i class="fa fa-bell-o"></i><span class="notif-badge" id="notifBadge" hidden></span>
                        </a>
                        <div class="notif-menu dropdown-menu dropdown-menu-right">
                            <div class="notif-head">Notifikasi <span class="notif-count" id="notifCount">0 baru</span></div>
                            <div id="notifList"></div>
                            <?php if ($can_request) { ?><a class="notif-all" href="<?php echo base_url(); ?>request-customer">Lihat semua request</a><?php } ?>
                        </div>
                    </div>
                    <script>
                        (function () {
                            var base = '<?php echo base_url(); ?>', admin = <?php echo $can_request ? 'true' : 'false'; ?>;
                            var req = { jumlah: 0, data: [] }, chat = { jumlah: 0, data: [] };
                            // "2026-10-07 08:44:07" -> "07/10 08:44"
                            function jam(t) { return String(t).replace(/^\d{4}-(\d\d)-(\d\d) (\d\d:\d\d).*$/, '$2/$1 $3'); }
                            function item(ikon, judul, sub) {
                                return $('<a class="notif-item">').append('<span class="notif-ico"><i class="fa ' + ikon + '"></i></span>',
                                    $('<span class="notif-text">').append($('<strong>').text(judul), $('<span>').text(sub)), '<i class="fa fa-angle-right"></i>');
                            }
                            function gambar() {
                                var total = req.jumlah + chat.jumlah;
                                $('#notifBadge').text(total > 99 ? '99+' : total).prop('hidden', !total);
                                $('.main-menu .notif-badge').text(req.jumlah > 99 ? '99+' : req.jumlah).prop('hidden', !req.jumlah);
                                $('#notifCount').text(total + ' baru');
                                var $list = $('#notifList').empty();
                                if (!total) $list.append('<div class="notif-empty"><i class="fa fa-inbox"></i>Belum ada notifikasi baru</div>');
                                chat.data.forEach(function (d) {
                                    item('fa-comments', d.username + ' (' + d.level + ')', d.pesan + ' · ' + d.nama_perusahaan_klien + ' · ' + jam(d.waktu))
                                        .addClass('notif-chat').attr('href', base + (d.kode_website === 'VB' ? 'data-vibrasindo' : 'data-testindo'))
                                        .on('click', function (e) {
                                            // Sudah di halaman tabelnya: langsung buka chat; selain itu dibuka setelah halaman dimuat
                                            if (window.bpBukaChat && bpBukaChat(d.nomor_surat)) { e.preventDefault(); e.stopPropagation(); return; }
                                            try { sessionStorage.setItem('bp_chat', d.nomor_surat); } catch (er) {}
                                        }).appendTo($list);
                                });
                                req.data.forEach(function (d) {
                                    item('fa-building', d.nama_perusahaan_klien, (d.kategori ? d.kategori + ' · ' : '') + jam(d.tanggal_request))
                                        .attr('href', base + 'tambah-data?request=' + d.id_request).appendTo($list);
                                });
                            }
                            function muat() {
                                if (admin) $.getJSON(base + 'notif_request').done(function (r) { req = r; gambar(); });
                                $.getJSON(base + 'notif_chat').done(function (r) { chat = r; gambar(); if (window.bpBadgeChat) bpBadgeChat(r.per_baris); });
                            }
                            window.bpMuatNotif = muat;
                            $(muat);
                            setInterval(muat, 10000);
                        })();
                    </script>
                    <div class="user-area dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?php echo base_url(); ?>images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu dropdown-menu-right">
                            <a class="nav-link" href="<?php echo base_url(); ?>profil"><span class="um-ico"><i class="fa fa-user-circle-o"></i></span> Profil</a>
                            <a class="nav-link text-danger" href="<?php echo base_url(); ?>login/keluar"><span class="um-ico"><i class="fa fa-sign-out"></i></span> Logout</a>
                        </div>
                    </div>
                </div>

            </div>
        </header>