<?php
//include 'analytic_report.php';
include 'header.php';
// $yy (2 digit) & $tahun (4 digit) dari controller. Tahun lalu: acuan tanggal = 31 Desember tahun itu.
$ref = ($tahun == date('Y')) ? time() : strtotime("$tahun-12-31");
?>
<style>
    /* Palet cerah modern: header gradasi, isi tint lembut */
    .tabel-analytic { font-size: 12.5px; }

    .tabel-analytic thead th {
        border: 0 !important;
        border-right: 1px solid rgba(255, 255, 255, .22) !important;
        border-bottom: 1px solid rgba(255, 255, 255, .22) !important;
        color: #fff;
        font-weight: 600;
        letter-spacing: .04em;
        text-align: center;
        vertical-align: middle;
    }

    .tabel-analytic tbody td { border-color: #eef2f7 !important; text-align: center; font-variant-numeric: tabular-nums; }
    .tabel-analytic tbody td:first-child { color: var(--text-strong); font-weight: 600; text-align: left; }

    /* Keterangan saat batang grafik disorot (tooltip isHtml): balon gelap bertema, sama dengan .tb-info */
    #columnchart_kategori .google-visualization-tooltip, #detail_kategori .google-visualization-tooltip { background: #0f172a; border: 0; border-radius: 10px; box-shadow: 0 12px 32px rgba(15, 23, 42, .18); padding: 0; pointer-events: none; }
    .gv-tip { color: #fff; font: 500 12px/1.45 var(--font); padding: 8px 10px; white-space: nowrap; }
    .gv-tip b { align-items: center; display: flex; font-weight: 700; gap: 6px; }
    .gv-tip b i { border-radius: 50%; flex: 0 0 8px; height: 8px; }
    .gv-tip span { color: #cbd5e1; display: block; }
    .gv-tip strong { color: #fff; }

    #detail_kategori select, #detail_kategori input[type=search] { max-width: 100%; }
    /* Filter bulan sejajar dengan "Tampil [n]" (tinggi sama 42px) */
    #detail_kategori .dataTables_length { align-items: center; display: flex !important; flex-wrap: wrap; gap: 8px; }
    #detail_kategori .dataTables_length label { align-items: center; display: flex; gap: 8px; margin: 0; }
    /* "Cari:" + kotak pencarian tetap sebaris (sama seperti desktop) juga di HP */
    #detail_kategori .dataTables_filter label { align-items: center; display: flex !important; gap: 8px; justify-content: flex-end; margin: 0; }
    #detail_kategori div.dataTables_filter input { display: block !important; flex: 0 1 220px; margin: 0 !important; min-width: 0; width: auto !important; }
    #detail_kategori .dataTables_length select.form-control { font-size: 14px; height: 42px; margin: 0; vertical-align: middle; width: auto; }

    .th-inquiry   { background: linear-gradient(135deg, #fb7185, #f43f5e); }
    .th-quotation { background: linear-gradient(135deg, #60a5fa, #3b82f6); }
    .th-rate-quo  { background: linear-gradient(135deg, #fbbf24, #f59e0b); }
    .th-po        { background: linear-gradient(135deg, #34d399, #10b981); }
    .th-total-po  { background: linear-gradient(135deg, #10b981, #059669); }

    .bg-inquiry   { background-color: #fff1f3; }
    .bg-quotation { background-color: #eff6ff; }
    .bg-rate-quo  { background-color: #fffbeb; }
    .bg-po        { background-color: #ecfdf5; }

    /* Indikator target PO bulanan tim */
    .bg-po-red    { background-color: #ffe4e6 !important; color: #be123c !important; font-weight: 700; } /* < 50% */
    .bg-po-yellow { background-color: #fef3c7 !important; color: #b45309 !important; font-weight: 700; } /* 50% - 99% */
    .bg-po-green  { background-color: #d1fae5 !important; color: #047857 !important; font-weight: 700; } /* >= 100% */
</style>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard Activity & Sales Progress <?php echo $tahun; ?></h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">table</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="card-body">
        <table class="tabel-analytic table">
            <thead>
                <tr>
                    <th center rowspan="3" class="th-inquiry align-middle text-center">
                        Nama Sales
                    </th>
                    <th colspan="3" class="th-inquiry">
                        Inquiry
                    </th>
                    <th colspan="3" class="th-quotation">
                        Quotation
                    </th>
                    <!--<th colspan="3" class="th-rate-quo">
                        Conv.Rate Quo
                    </th>-->
                    <th colspan="6" class="th-po">
                        PO
                    </th>
                </tr>
                <tr>
                    <th class="th-inquiry">Harian</th>
                    <th class="th-inquiry">Bulan</th>
                    <th class="th-inquiry">Tahun</th>
                    <th class="th-quotation">Hari ini</th>
                    <th class="th-quotation">Bulan ini</th>
                    <th class="th-quotation">Tahun ini</th>
                    <!--<th class="th-rate-quo">Harian</th>
                    <th class="th-rate-quo">Bulanan</th>
                    <th class="th-rate-quo">Tahun</th>-->
                    <th class="th-po" colspan="2">Hari ini</th>
                    <th class="th-po" colspan="2">Bulan ini</th>
                    <th class="th-po" colspan="2">Tahun ini</th>
                    <!--<th class="th-total-po align-middle text-center" rowspan="2">Total PO</th>-->
                </tr>
                <tr>
                    <?php // 1. Ambil data hari kemarin (format angka 1-7. 1=Senin, 6=Sabtu, 7=Minggu)
                    $hari_kemarin = date('N', strtotime('-1 day', $ref));

                    if ($hari_kemarin == 6) {
                        // Jika kemarin hari Sabtu, maka dikurangi 1 hari lagi agar menjadi hari Jumat
                        $tanggal_hasil = date('Y-m-d', strtotime('-2 days', $ref));
                    } elseif ($hari_kemarin == 7) {
                        // Jika kemarin hari Minggu, maka dikurangi 2 hari lagi agar menjadi hari Jumat
                        $tanggal_hasil = date('Y-m-d', strtotime('-3 days', $ref));
                    } else {
                        // Jika kemarin adalah hari Senin-Jumat biasa, tetap ambil tanggal kemarin normal
                        $tanggal_hasil = date('Y-m-d', strtotime('-1 day', $ref));
                    }
                    ?>
                    <th class="th-inquiry"><?php echo $tanggal_hasil; ?></th>
                    <th class="th-inquiry"><?php echo date('M', $ref); ?></th>
                    <th class="th-inquiry"><?php echo $tahun; ?></th>
                    <th class="th-quotation"><?php echo $tanggal_hasil; ?></th>
                    <th class="th-quotation"><?php echo date('M', $ref); ?></th>
                    <th class="th-quotation"><?php echo $tahun; ?></th>
                    <!--<th class="th-rate-quo"><?php echo $tanggal_hasil; ?></th>
                    <th class="th-rate-quo"><?php echo date('M', $ref); ?></th>
                    <th class="th-rate-quo"><?php echo $tahun; ?></th>-->
                    <th class="th-po" colspan="2"><?php echo $tanggal_hasil; ?></th>
                    <th class="th-po" colspan="2"><?php echo date('M', $ref); ?></th>
                    <th class="th-po" colspan="2"><?php echo $tahun; ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 1. Ambil penanda waktu pembanding (format bulan & tahun disesuaikan dengan database Anda)
                // Jika kolom 'bulan' di database Anda menyimpan format tahun dan bulan dinamis (misal "2607"), sesuaikan di sini
                $bulan_ini = date('Y-m', $ref); // Menghasilkan Tahun-Bulan saat ini (Contoh: "2026-07")
                $tahun_ini = $tahun; // Menyesuaikan format variabel 'year' di M_admin Anda

                // 2. Daftar nama sales yang akan dihitung performanya
                $sales_list = array('Yovan', 'Rafael', 'Bayu', 'Alfian', 'Fahrie', 'Erdi', 'Syaehu', 'Irsyad');
                $nilai_po_total_bulan = 0;
                $nilai_po_total_tahun = 0;

                // Target Total PO Bulanan Seluruh Sales (1.2 Miliar)
                $target_po_tim_bulanan = 1200000000;

                // Fungsi penentu warna berdasarkan Total Akumulasi Tim
                function get_team_threshold_class($total_po_tim, $target)
                {
                    $persen = ($target > 0) ? ($total_po_tim / $target) * 100 : 0;

                    if ($persen >= 100) {
                        return 'bg-po-green';  // Hijau (1,2 Miliar atau lebih)
                    } elseif ($persen >= 50) {
                        return 'bg-po-yellow'; // Kuning (600 Juta - 1,19 Miliar)
                    } else {
                        return 'bg-po-red';    // Merah (Di bawah 600 Juta)
                    }
                }

                foreach ($sales_list as $sales) {
                    // Inisialisasi Counter/Penghitung data awal untuk masing-masing kategori
                    $inq_hari = 0;
                    $inq_bulan = 0;
                    $inq_tahun = 0;
                    $quo_hari = 0;
                    $quo_bulan = 0;
                    $quo_tahun = 0;
                    $nilai_quote_hari = 0;
                    $nilai_quote_bulan = 0;
                    $nilai_quote_tahun = 0;
                    $po_hari = 0;
                    $po_bulan = 0;
                    $po_tahun = 0;
                    $nilai_po_hari = 0;
                    $nilai_po_bulan = 0;
                    $nilai_po_tahun = 0;

                    // 3. Melakukan looping menyaring data dari array objek $tsurat
                    if (!empty($tsurat)) {
                        foreach ($tsurat as $row) {
                            if (trim(strtolower($row->pic)) == trim(strtolower($sales))) {

                                // 1. Acuan waktu untuk INQUIRY (menggunakan tanggal_input)
                                $tgl_inq   = date('Y-m-d', strtotime($row->tanggal_input));
                                $bulan_inq = date('Y-m', strtotime($row->tanggal_input));
                                $tahun_inq = date('Y', strtotime($row->tanggal_input));

                                // 2. Acuan waktu untuk QUOTATION & PO (menggunakan tanggal_update)
                                // Fallback ke tanggal_input jika tanggal_update kosong/default
                                $waktu_update = (!empty($row->tanggal_update) && $row->tanggal_update != '0000-00-00 00:00:00')
                                    ? $row->tanggal_update
                                    : $row->tanggal_input;

                                $tgl_upd   = date('Y-m-d', strtotime($waktu_update));
                                $bulan_upd = date('Y-m', strtotime($waktu_update));
                                $tahun_upd = date('Y', strtotime($waktu_update));

                                $status_data = trim(strtolower($row->status));

                                // --- A. HITUNG DATA INQUIRY (Berdasarkan tanggal_input) ---
                                if ($tgl_inq == $tanggal_hasil) {
                                    $inq_hari++;
                                }
                                if ($bulan_inq == $bulan_ini) {
                                    $inq_bulan++;
                                }
                                if ($tahun_inq == $tahun_ini) {
                                    $inq_tahun++;
                                }

                                // --- B. HITUNG DATA QUOTATION (Berdasarkan tanggal_update) ---
                                if ($status_data == 'sudah quote' || $status_data == 'sudah po') {
                                    if ($tgl_upd == $tanggal_hasil) {
                                        $quo_hari++;
                                        $nilai_quote_hari += (float) $row->nilai_quotation;
                                    }
                                    if ($bulan_upd == $bulan_ini) {
                                        $quo_bulan++;
                                        $nilai_quote_bulan += (float) $row->nilai_quotation;
                                    }
                                    if ($tahun_upd == $tahun_ini) {
                                        $quo_tahun++;
                                        $nilai_quote_tahun += (float) $row->nilai_quotation;
                                    }
                                }

                                // --- C. HITUNG DATA PURCHASE ORDER / PO (Berdasarkan tanggal_update) ---
                                if ($status_data == 'sudah po') {
                                    if ($tgl_upd == $tanggal_hasil) {
                                        $po_hari++;
                                        $nilai_po_hari += (float) $row->nilai_po;
                                    }
                                    if ($bulan_upd == $bulan_ini) {
                                        $po_bulan++;
                                        $nilai_po_bulan += (float) $row->nilai_po;
                                        $nilai_po_total_bulan += (float) $row->nilai_po;
                                    }
                                    if ($tahun_upd == $tahun_ini) {
                                        $po_tahun++;
                                        $nilai_po_tahun += (float) $row->nilai_po;
                                        $nilai_po_total_tahun += (float) $row->nilai_po;
                                    }
                                }
                            }
                        }
                    }

                    // 4. Menghitung Rasio Konversi (Conversion Rate) dengan menghindari eror pembagian nol (#DIV/0!)
                    //$rate_quo_hari  = ($inq_hari > 0) ? round(($quo_hari / $inq_hari) * 100) . '%' : '0%';
                    //$rate_quo_bulan = ($inq_bulan > 0) ? round(($quo_bulan / $inq_bulan) * 100) . '%' : '0%';
                    $rate_quo_tahun = ($inq_tahun > 0) ? round(($quo_tahun / $inq_tahun) * 100) . '%' : '0%';

                    //$rate_po_hari   = ($quo_hari > 0) ? round(($po_hari / $quo_hari) * 100) . '%' : '0%';
                    //$rate_po_bulan  = ($quo_bulan > 0) ? round(($po_bulan / $quo_bulan) * 100) . '%' : '0%';
                    $rate_po_tahun  = ($quo_tahun > 0) ? round(($po_tahun / $quo_tahun) * 100) . '%' : '0%';

                    //$rate_nilai_po_hari   = ($quo_hari > 0) ? round(($nilai_po_hari / $nilai_quote_hari) * 100) . '%' : '0%';
                    //$rate_nilai_po_bulan  = ($quo_bulan > 0) ? round(($nilai_po_bulan / $nilai_quote_bulan) * 100) . '%' : '0%';
                    $rate_nilai_po_tahun  = ($nilai_quote_tahun > 0) ? round(($nilai_po_tahun / $nilai_quote_tahun) * 100) . '%' : '0%';
                ?>
                    <tr class="align-middle text-center">
                        <td class="font-weight-bold text-left"><?php echo $sales; ?></td>

                        <td class="bg-inquiry"><?php echo $inq_hari; ?></td>
                        <td class="bg-inquiry"><?php echo $inq_bulan; ?></td>
                        <td class="bg-inquiry"><?php echo $inq_tahun; ?></td>

                        <td class="bg-quotation"><?php echo $quo_hari; ?> <!--; <?php echo $rate_quo_hari; ?>--><br>(<?php echo "Rp " . number_format($nilai_quote_hari, 0, ',', '.'); ?>)</td>
                        <td class="bg-quotation"><?php echo $quo_bulan; ?> <!--; <?php echo $rate_quo_bulan; ?>--><br>(<?php echo "Rp " . number_format($nilai_quote_bulan, 0, ',', '.'); ?>)</td>
                        <td class="bg-quotation"><?php echo $quo_tahun; ?> ; <?php echo $rate_quo_tahun; ?><br>(<?php echo "Rp " . number_format($nilai_quote_tahun, 0, ',', '.'); ?>)</td>

                        <!--<td class="bg-rate-quo"><?php echo $rate_quo_hari; ?></td>
                        <td class="bg-rate-quo"><?php echo $rate_quo_bulan; ?></td>
                         <td class="bg-rate-quo"><?php echo $rate_quo_tahun; ?></td>-->

                        <td class="bg-po" colspan="2"><?php echo $po_hari; ?><br>(<?php echo "Rp " . number_format($nilai_po_hari, 0, ',', '.'); ?>)</td>
                        <!--<td class="bg-po text-left">; <?php echo $rate_po_hari; ?><br>; <?php echo $rate_nilai_po_hari ?></td>-->

                        <td class="bg-po" colspan="2"><?php echo $po_bulan; ?><br>(<?php echo "Rp " . number_format($nilai_po_bulan, 0, ',', '.'); ?>)</td>
                        <!--<td class="bg-po text-left">; <?php echo $rate_po_bulan; ?><br>; <?php echo $rate_nilai_po_bulan ?></td>-->

                        <td class="bg-po"><?php echo $po_tahun; ?><br>(<?php echo "Rp " . number_format($nilai_po_tahun, 0, ',', '.'); ?>)</td>
                        <td class="bg-po text-left">; <?php echo $rate_po_tahun; ?><br>; <?php echo $rate_nilai_po_tahun ?></td>
                        <!--<td class="bg-po"><?php
                                                // Menghasilkan format mata uang tanpa desimal, contoh: 50.000.000
                                                echo "Rp " . number_format($po_total, 0, ',', '.');
                                                ?>
                    </td>-->
                    </tr>
                <?php } ?>
            <tfoot>
                <?php
                // 1. Cek warna threshold untuk Total Akumulasi Tim
                $class_threshold_tim = get_team_threshold_class($nilai_po_total_bulan, $target_po_tim_bulanan);

                // 2. Hitung persentase ketercapaian target tim
                $persen_tim = ($target_po_tim_bulanan > 0) ? round(($nilai_po_total_bulan / $target_po_tim_bulanan) * 100, 1) : 0;
                ?>

                <!-- BARIS TARGET TIM & KETERCAPAIAN -->
                <tr class="text-white font-weight-bold" style="background: linear-gradient(135deg, #334155, #1e293b);">
                    <td colspan="9" class="text-right align-middle">
                        TARGET PO BULANAN TIM SALES: <strong>Rp 1.200.000.000</strong>
                        <span class="badge ml-2" style="font-size: 12px; background: #fef3c7; color: #b45309;">
                            Pencapaian Tim: <?php echo $persen_tim; ?>%
                        </span>
                    </td>

                    <!-- KOLOM AKUMULASI PO BULANAN TIM (WARNA DYNAMICSESUAI THRESHOLD) -->
                    <td colspan="2" class="text-center align-middle <?php echo $class_threshold_tim; ?>" style="font-size: 13px;">
                        TOTAL PO BULANAN TIM:<br>
                        <?php echo "Rp " . number_format($nilai_po_total_bulan, 0, ',', '.'); ?>
                    </td>

                    <!-- KOLOM TOTAL PO TAHUNAN -->
                    <td colspan="2" class="text-center align-middle text-nowrap" style="background: linear-gradient(135deg, #34d399, #059669); color: #fff;">
                        TOTAL PO TAHUNAN TIM:<br>
                        <?php echo "Rp " . number_format($nilai_po_total_tahun, 0, ',', '.'); ?>
                    </td>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-12">
        <div id="columnchart_status_inq" style="height:450px;"></div>
    </div>
    <div class="col-md-12">
        <div id="columnchart_sumber_inq" style="height:450px;"></div>
    </div>
    <div class="col-md-12">
        <div id="columnchart_kategori" style="height:900px;"></div>
        <div id="detail_kategori" class="mt-3" style="display: none;"></div>
    </div>
</div>

<div class="col-md-12">
    <br><br>
    <div class="d-flex align-items-center justify-content-between mb-3" style="gap: 12px;">
        <h4 class="mb-0" style="min-width: 0;">Detail Data Bulanan</h4>
        <!-- Pilih bulan: hanya tabel bulan terpilih yang tampil (default bulan berjalan) -->
        <div class="filter-grid" style="flex: 0 1 220px; min-width: 150px;">
            <select class="form-control" id="pilih_bulan_detail" aria-label="Pilih bulan">
                <?php foreach (['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'] as $n => $bln): ?>
                    <option value="<?= $n + 1; ?>" <?= ($n + 1 == date('n', $ref)) ? 'selected' : ''; ?>><?= $bln; ?> <?= $tahun; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <?php
    // 1. Daftar Sales Periode 1 (Januari - Juni)
    $sales_lama = [
        'faoji'   => 'Faoji',
        'hanifan' => 'Hanifan',
        'ridwan'  => 'Ridwan',
        'redha'   => 'Redha',
        'andis'   => 'Andis',
        'Bayu'    => 'Bayu',
        'yovan'   => 'Yovan',
        'Rafael'  => 'Rafael',
        'Alfian'  => 'Alfian',
        'Alfin'   => 'Alfin Rusdi',
        'anto'    => 'Anto',
        'zulfikri' => 'Zulfikri'
    ];

    // 2. Daftar Sales Periode 2 (Juli - Desember)
    $sales_baru = [
        'yovan'   => 'Yovan',
        'Rafael'  => 'Rafael',
        'Bayu'    => 'Bayu',
        'Alfian'  => 'Alfian',
        'fahrie'  => 'Fahrie',
        'erdi'    => 'Erdi',
        'syaehu'  => 'Syaehu',
        'irsyad'  => 'Irsyad'
    ];

    $nama_bulan = [
        1 => "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    $year = $yy;

    for ($i = 1; $i <= 12; $i++) {
        // Deteksi Sales berdasarkan periode bulan (Bulan 1-6 = Lama, Bulan 7-12 = Baru)
        $sales_list = ($i >= 7) ? $sales_baru : $sales_lama;

        // Format bulan 2 digit (01, 02, dst)
        $bulan_code = sprintf("%02d", $i);
        $bulan_year = $bulan_code . $year;

        // Ambil data dalam 1 Query per bulan
        $data_bulan = $this->db->query("SELECT pic, status FROM tsurat WHERE bulan = '$bulan_year'")->result_array();

        // Struktur variabel penampung hitungan (5 Indikator + Total Inquiry)
        $rekap = [];
        $total = [
            'inquiry'     => 0,
            'sudah_po'    => 0,
            'sudah_quote' => 0,
            'belum_quote' => 0,
            'ditunda'     => 0,
            'close_gagal' => 0
        ];

        foreach ($sales_list as $key => $name) {
            $rekap[$key] = [
                'inquiry'     => 0,
                'sudah_po'    => 0,
                'sudah_quote' => 0,
                'belum_quote' => 0,
                'ditunda'     => 0,
                'close_gagal' => 0
            ];
        }

        // Kalkulasi data berdasarkan status dari database
        foreach ($data_bulan as $row) {
            $pic = strtolower($row['pic']);
            $status = $row['status'];

            foreach ($sales_list as $key => $name) {
                $key_lower = strtolower($key);

                if (($key_lower == 'alfin' && strpos($pic, 'alfin') !== false) || ($pic == $key_lower)) {
                    $rekap[$key]['inquiry']++;
                    $total['inquiry']++;

                    if ($status == 'Sudah PO') {
                        $rekap[$key]['sudah_po']++;
                        $total['sudah_po']++;
                    } else if ($status == 'Sudah Quote') {
                        $rekap[$key]['sudah_quote']++;
                        $total['sudah_quote']++;
                    } else if ($status == 'Belum Quote') {
                        $rekap[$key]['belum_quote']++;
                        $total['belum_quote']++;
                    } else if ($status == 'Ditunda') {
                        $rekap[$key]['ditunda']++;
                        $total['ditunda']++;
                    } else if ($status == 'Close/Gagal') {
                        $rekap[$key]['close_gagal']++;
                        $total['close_gagal']++;
                    }
                    break;
                }
            }
        }
    ?>

        <div class="bulan-detail" data-bulan="<?= $i; ?>" <?= ($i == date('n', $ref)) ? '' : 'style="display: none;"'; ?>>
        <h6 style="font-weight: bold;"><?= $nama_bulan[$i]; ?> <?= $tahun; ?></h6>
        <table class="table table-striped table-bordered" style="font-size: 12px;">
            <thead>
                <tr style="background:linear-gradient(to right, #5B86E5, #36D1DC);">
                    <th scope="col" style="color:#fff;">#</th>
                    <th scope="col" style="color:#fff;">INDIKATOR</th>
                    <?php foreach ($sales_list as $sales_name): ?>
                        <th scope="col" style="color:#fff;"><?= $sales_name; ?></th>
                    <?php endforeach; ?>
                    <th scope="col" style="color:#fff;">Total</th>
                </tr>
            </thead>

            <tbody>
                <!-- 1. SUDAH PO -->
                <tr>
                    <td>1</td>
                    <td>Sudah PO</td>
                    <?php foreach ($sales_list as $key => $name): ?>
                        <td><?= $rekap[$key]['sudah_po']; ?></td>
                    <?php endforeach; ?>
                    <td><strong><?= $total['sudah_po']; ?></strong></td>
                </tr>

                <!-- 2. SUDAH QUOTE -->
                <tr>
                    <td>2</td>
                    <td>Sudah Quote</td>
                    <?php foreach ($sales_list as $key => $name): ?>
                        <td><?= $rekap[$key]['sudah_quote']; ?></td>
                    <?php endforeach; ?>
                    <td><strong><?= $total['sudah_quote']; ?></strong></td>
                </tr>

                <!-- 3. BELUM QUOTE -->
                <tr>
                    <td>3</td>
                    <td>Belum Quote</td>
                    <?php foreach ($sales_list as $key => $name): ?>
                        <td><?= $rekap[$key]['belum_quote']; ?></td>
                    <?php endforeach; ?>
                    <td><strong><?= $total['belum_quote']; ?></strong></td>
                </tr>

                <!-- 4. DITUNDA -->
                <tr>
                    <td>4</td>
                    <td>Ditunda</td>
                    <?php foreach ($sales_list as $key => $name): ?>
                        <td><?= $rekap[$key]['ditunda']; ?></td>
                    <?php endforeach; ?>
                    <td><strong><?= $total['ditunda']; ?></strong></td>
                </tr>

                <!-- 5. CLOSE/GAGAL -->
                <tr>
                    <td>5</td>
                    <td>Close/Gagal</td>
                    <?php foreach ($sales_list as $key => $name): ?>
                        <td><?= $rekap[$key]['close_gagal']; ?></td>
                    <?php endforeach; ?>
                    <td><strong><?= $total['close_gagal']; ?></strong></td>
                </tr>

                <!-- TOTAL JUMLAH INQUIRY -->
                <tr style="background-color: #f1f3f5;">
                    <td>#</td>
                    <td><strong>Jumlah Inquiry</strong></td>
                    <?php foreach ($sales_list as $key => $name): ?>
                        <td><strong><?= $rekap[$key]['inquiry']; ?></strong></td>
                    <?php endforeach; ?>
                    <td><strong style="color: #0056b3; font-size: 13px;"><?= $total['inquiry']; ?></strong></td>
                </tr>
            </tbody>
        </table>
        </div>

    <?php } ?>
    <script>
        document.getElementById('pilih_bulan_detail').addEventListener('change', function() {
            var bulan = this.value;
            document.querySelectorAll('.bulan-detail').forEach(function(el) {
                el.style.display = el.dataset.bulan === bulan ? '' : 'none';
            });
        });
    </script>
</div>
<br>
<!--<div class="breadcrumbs" style="margin-top: 50px;">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Report / Summary on Graphs (Sales)</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#"></a></li>
                    <li class="active"></li>
                </ol>
            </div>
        </div>
    </div>
    
</div>-->
<form action="<?php echo base_url() . 'export_report_sales'; ?>" method="post">
    <button id="save" type="submit" class="btn btn-lg btn-info btn-block">
        <i class="fa fa-save fa-lg"></i>&nbsp;
        <span id="save">EXPORT</span>
    </button>
</form>
</div><!-- /#right-panel -->
<!-- Right Panel -->
<?php
include 'footer.php';
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="<?php echo base_url(); ?>assets/js/charts-theme.js?v=<?php echo filemtime(FCPATH . 'assets/js/charts-theme.js'); ?>"></script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Jumlah Inquiry', 'Belum Quote', 'Sudah Quote', 'Ditunda', 'Close', 'Sudah PO'],
            ['Januari', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Februari', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Maret', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['April', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Mei', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Juni', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Juli', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Agustus', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['September', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Oktober', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['November', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and status = 'Sudah PO'")->num_rows(); ?>],
            ['Desember', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and status = 'Belum Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and status = 'Sudah Quote'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and status = 'Ditunda'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and status = 'Close/Gagal'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and status = 'Sudah PO'")->num_rows(); ?>],

        ]);

        var options = {
            chart: {
                title: 'Perbandingan Status Inquiry Tahun <?php echo $tahun; ?>',
                //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_status_inq'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>
<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['bar']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Bulan', 'Website', 'Email Promosi', 'Whatsapp Promosi', 'Telemarketing', 'Personal Sales', 'Sosial Media', 'Telepon Kantor', 'Sumber Belum Diketahui'],
            ['Januari', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '01$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Februari', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '02$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Maret', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '03$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['April', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '04$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Mei', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '05$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Juni', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '06$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Juli', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '07$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Agustus', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '08$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['September', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '09$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Oktober', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '10$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['November', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '11$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],
            ['Desember', <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Website'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Email Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Whatsapp Promosi'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Telemarketing/Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Personal Sales'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Sosial Media'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Telepon Kantor'")->num_rows(); ?>, <?php echo $this->db->query("SELECT * FROM tsurat where bulan = '12$yy' and sumber_inq = 'Sumber Belum Diketahui'")->num_rows(); ?>],

        ]);

        var options = {
            chart: {
                title: 'Perbandingan Sumber Inquiry',
                //subtitle: 'Sales, Expenses, and Profit: 2014-2017',
            }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_sumber_inq'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

<script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawKategoriChart);

    function drawKategoriChart() {
        <?php
        $bulan_tahun = array_map(function ($m) use ($yy) { return sprintf('%02d', $m) . $yy; }, range(1, 12));
        $daftar_kategori = array(
            'Data Logger',
            'Sensor',
            'NDT Instrument',
            'Geoteknik Instrument',
            'Soil Instrument',
            'Testing Machine',
            'Weather, Hydrology & Enviromental Instrument',
            'Vibration & Condition Monitoring Instrument',
            'Software',
            'Instrument Lainnya',
            'SHMS',
            'Jasa NDT Beton',
            'Jasa NDT Metal',
            'Jasa Audit Struktur Gedung',
            'Jasa Monitoring',
            'Jasa Uji Pondasi',
            'Jasa Repair/Upgrade',
            'Jasa Survey',
            'Jasa Condition Monitoring',
            'Jasa Geoteknik',
            'Jasa Kalibrasi',
            'Jasa Dynamometer',
            'Jasa Loading Test',
            'Jasa Uji Lainnya'
        );

        $jumlah_kategori = array_fill_keys($daftar_kategori, 0);
        $detail_kategori = array_fill_keys($daftar_kategori, array());
        $kategori_resmi = array();
        foreach ($daftar_kategori as $kategori) {
            $kategori_resmi[strtolower(trim($kategori))] = $kategori;
        }
        // Detail Kategori: kolom tsurat.detail_kategori + daftar pilihan tdetail_kategori (application/tdetail_kategori.sql)
        $ada_detail = $this->db->field_exists('detail_kategori', 'tsurat');
        $pilihan_detail = array();
        if ($this->db->table_exists('tdetail_kategori')) {
            foreach ($this->db->order_by('id_detail')->get('tdetail_kategori')->result() as $d) {
                $pilihan_detail[$d->kategori][] = $d->nama_detail;
            }
        }
        $data_kategori_tahun = $this->db
            ->select('nomor_surat, kebutuhan_klien, kategori, nama_perusahaan_klien' . ($ada_detail ? ', detail_kategori' : ''))
            ->where_in('bulan', $bulan_tahun)
            ->get('tsurat')
            ->result_array();

        foreach ($data_kategori_tahun as $row) {
            $kategori_db = trim((string) $row['kategori']);
            $kategori_key = strtolower($kategori_db);
            if (isset($kategori_resmi[$kategori_key])) {
                $kategori = $kategori_resmi[$kategori_key];
                $jumlah_kategori[$kategori]++;
                $detail_kategori[$kategori][] = array(
                    'nomor_surat' => (string) $row['nomor_surat'],
                    'kebutuhan' => (string) $row['kebutuhan_klien'],
                    'kategori' => $kategori,
                    'detail' => $ada_detail ? trim((string) $row['detail_kategori']) : '',
                    'perusahaan' => (string) $row['nama_perusahaan_klien']
                );
            }
        }

        $chart_kategori_tahun = array(array('Kategori', 'Total'));
        foreach ($daftar_kategori as $kategori) {
            $chart_kategori_tahun[] = array($kategori, $jumlah_kategori[$kategori]);
        }
        ?>
        var data = google.visualization.arrayToDataTable(<?php echo json_encode($chart_kategori_tahun); ?>);
        // Keterangan saat batang disorot: balon gelap bertema (gaya .tb-info), pengganti kotak putih bawaan Google Charts
        function tipGrafik(nama, total, warna) {
            var aman = String(nama).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            return '<div class="gv-tip"><b><i style="background:' + (warna || '#1e5bd6') + '"></i>' + aman + '</b><span>Total: <strong>' + total + '</strong> surat</span></div>';
        }
        data.addColumn({ type: 'string', role: 'tooltip', p: { html: true } });
        for (var baris = 0; baris < data.getNumberOfRows(); baris++) data.setCell(baris, 2, tipGrafik(data.getValue(baris, 0), data.getValue(baris, 1)));
        var detailKategori = <?php echo json_encode($detail_kategori); ?>;
        var pilihanDetail = <?php echo json_encode((object) $pilihan_detail); ?>;

        // Layar sempit (HP): kolom label diperlebar & huruf diperkecil agar nama kategori panjang tidak bertumpuk
        var sempit = document.getElementById('columnchart_kategori').offsetWidth < 576;

        var options = {
            title: 'Total Surat Berdasarkan Kategori Tahun <?php echo $tahun; ?>',
            legend: {
                position: 'none'
            },
            tooltip: { isHtml: true },
            bars: 'horizontal',
            bar: {
                groupWidth: '85%'
            },
            // Persen (bukan px) agar label & batang ikut lebar layar; label kepanjangan otomatis dipotong "…"
            chartArea: {
                left: sempit ? '45%' : '30%',
                top: 50,
                width: sempit ? '50%' : '65%',
                height: '88%'
            },
            hAxis: {
                title: 'Total'
            },
            vAxis: {
                textStyle: {
                    fontSize: sempit ? 10 : 11
                }
            }
        };

        var chart = new google.visualization.BarChart(document.getElementById('columnchart_kategori'));

        google.visualization.events.addListener(chart, 'select', function() {
            var selection = chart.getSelection();
            var detailContainer = document.getElementById('detail_kategori');

            if (!selection.length || typeof selection[0].row !== 'number') {
                detailContainer.style.display = 'none';
                detailContainer.innerHTML = '';
                return;
            }

            var kategori = data.getValue(selection[0].row, 0);
            var detail = detailKategori[kategori] || [];
            var table = document.createElement('table');
            table.className = 'table table-striped';

            var header = table.createTHead().insertRow();
            ['No. Surat', 'Kebutuhan', 'Kategori', 'Detail Kategori', 'Perusahaan'].forEach(function(label) {
                var cell = document.createElement('th');
                cell.textContent = label;
                header.appendChild(cell);
            });

            var body = table.createTBody();
            detail.forEach(function(item) {
                var row = body.insertRow();
                [item.nomor_surat, item.kebutuhan, item.kategori, item.detail || '-', item.perusahaan].forEach(function(value) {
                    row.insertCell().textContent = value;
                });
            });

            if ($.fn.DataTable.isDataTable('#detail_kategori table')) {
                $('#detail_kategori table').DataTable().destroy();
            }
            detailContainer.innerHTML = '<h5 class="mb-3">Detail Kategori: ' + kategori + ' <span class="badge badge-light">' + detail.length + ' surat</span></h5>';
            // Grafik jumlah surat per Detail Kategori, di atas tabel: satu batang per detail yang ada datanya,
            // tiap batang beda warna dan diberi angka jumlahnya. Surat tanpa detail tidak digambar (ditulis di catatan).
            var hitungDetail = {}, belumDiisi = 0;
            detail.forEach(function(item) { if (item.detail) hitungDetail[item.detail] = (hitungDetail[item.detail] || 0) + 1; else belumDiisi++; });
            var barisGrafik = Object.keys(hitungDetail).map(function(k) { return [k, hitungDetail[k]]; }).sort(function(a, b) { return b[1] - a[1]; });
            var grafikDetail = document.createElement('div');
            grafikDetail.style.height = (barisGrafik.length * 34 + 124) + 'px';
            var catatanDetail = document.createElement('p');
            catatanDetail.className = 'text-muted mb-3';
            catatanDetail.style.fontSize = '13px';
            catatanDetail.textContent = barisGrafik.length
                ? (belumDiisi ? belumDiisi + ' surat lain belum diisi detail kategorinya (tidak masuk grafik).' : '')
                : (detail.length ? 'Belum ada surat yang diisi detail kategorinya di kategori ini.' : '');
            if (barisGrafik.length) detailContainer.appendChild(grafikDetail);
            if (catatanDetail.textContent) detailContainer.appendChild(catatanDetail);
            detailContainer.appendChild(table);
            detailContainer.style.display = 'block';

            // Sama dengan tabel daftar lain: DataTables (cari, urut, jumlah per halaman, paging)
            var dt = $(table).DataTable({
                lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "All"]],
                language: { search: 'Cari:', lengthMenu: 'Tampil _MENU_', info: '_START_-_END_ dari _TOTAL_ data', infoEmpty: 'Tidak ada data', infoFiltered: '(disaring dari _MAX_)', zeroRecords: 'Data tidak ditemukan', paginate: { previous: '&lsaquo;', next: '&rsaquo;' } }
            });
            $(table).wrap('<div class="table-scroll"></div>');

            // Filter bulan dari nomor surat, contoh INQ-TST-0426-0721 -> 04
            var namaBulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var filterBulan = $('<select class="form-control"><option value="">Semua Bulan <?php echo $tahun; ?></option></select>');
            namaBulan.forEach(function(nama, i) {
                filterBulan.append(new Option(nama + ' <?php echo $tahun; ?>', ('0' + (i + 1)).slice(-2)));
            });
            filterBulan.on('change', function() {
                dt.column(0).search(this.value ? '^[^-]+-[^-]+-' + this.value : '', true, false).draw();
            });
            // Filter Detail Kategori (kolom ke-4): pilihan dari daftar detail kategori ini + nilai lain yang ada di data
            var daftarDetail = (pilihanDetail[kategori] || []).slice();
            detail.forEach(function(item) { if (item.detail && daftarDetail.indexOf(item.detail) === -1) daftarDetail.push(item.detail); });
            var filterDetail = $('<select class="form-control"><option value="">Semua Detail Kategori</option></select>');
            daftarDetail.forEach(function(nama) { filterDetail.append(new Option(nama, nama)); });
            filterDetail.append(new Option('Belum diisi', '-'));
            filterDetail.on('change', function() {
                dt.column(3).search(this.value ? '^' + $.fn.dataTable.util.escapeRegex(this.value) + '$' : '', true, false).draw();
            });
            $(table).closest('.dataTables_wrapper').find('.dataTables_length').append(filterBulan, filterDetail);

            // Gambar grafik detail; klik batangnya = menyaring tabel di bawah ke detail itu (klik lagi = semua)
            if (barisGrafik.length) {
                var warnaDetail = ['#1e5bd6', '#16a34a', '#f59e0b', '#dc2626', '#7c3aed', '#0ea5e9', '#db2777', '#0d9488', '#ea580c', '#65a30d', '#4f46e5', '#b45309'];
                var dataDetail = google.visualization.arrayToDataTable([['Detail Kategori', 'Total', { role: 'style' }, { role: 'annotation' }, { type: 'string', role: 'tooltip', p: { html: true } }]].concat(
                    barisGrafik.map(function(b, i) { var warna = warnaDetail[i % warnaDetail.length]; return [b[0], b[1], warna, String(b[1]), tipGrafik(b[0], b[1], warna)]; })
                ));
                var chartDetail = new google.visualization.BarChart(grafikDetail);
                chartDetail.draw(dataDetail, {
                    title: 'Total Surat Berdasarkan Detail Kategori: ' + kategori,
                    legend: { position: 'none' },
                    tooltip: { isHtml: true },
                    bar: { groupWidth: '70%' },
                    annotations: { alwaysOutside: true, textStyle: { fontSize: 12, bold: true, color: '#0f172a' } },
                    // HP: judul jadi dua baris, area grafik diturunkan sedikit agar tidak bertumpuk
                    chartArea: { left: sempit ? '45%' : '30%', top: sempit ? 64 : 50, width: sempit ? '50%' : '65%', height: barisGrafik.length * 34 },
                    hAxis: { title: 'Total', minValue: 0, format: '0' },
                    vAxis: { textStyle: { fontSize: sempit ? 10 : 11 } }
                });
                google.visualization.events.addListener(chartDetail, 'select', function() {
                    var pilih = chartDetail.getSelection();
                    var nama = pilih.length && typeof pilih[0].row === 'number' ? dataDetail.getValue(pilih[0].row, 0) : '';
                    filterDetail.val(nama).trigger('change');
                });
            }
        });

        chart.draw(data, options);
    }
</script>

<script>
    var lastState = null;

    if (!!window.EventSource) {
        // Polling ringan via Server-Sent Event
        var source = new EventSource('<?php echo base_url('check_update'); ?>');

        source.onmessage = function(event) {
            if (lastState !== null && lastState !== event.data) {
                // Jika ada perubahan total baris atau tanggal update terakhir
                bpReload(); // Refresh halaman otomatis
            }
            lastState = event.data;
        };
    }
</script>