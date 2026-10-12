<?php
include 'header.php';
?>

<style>
    /* ===== Toolbar: chip status + grid filter ===== */
    .table-toolbar { display: grid; gap: 16px; }
    .toolbar-sub { color: var(--text-muted); font-size: 13px; margin-top: 2px; }
    /* Kotak filter terpisah dari kotak tabel: judul + chip status sebaris, filter di bawah garis tipis.
       Panel berlatar di dalam kartu dilepas karena kartunya sendiri sudah menjadi kotaknya. */
    .card-filter { margin-bottom: 16px; }
    .card-filter .card-body { padding: 18px 20px; }
    .toolbar-head { align-items: center; display: flex; flex-wrap: wrap; gap: 12px 20px; justify-content: space-between; }
    .toolbar-judul { align-items: center; display: flex; gap: 12px; }
    .toolbar-ikon { align-items: center; background: var(--brand-soft); border-radius: 12px; color: var(--brand-600); display: inline-flex; flex: 0 0 42px; font-size: 16px; height: 42px; justify-content: center; }
    .card.card-filter .filter-grid { background: none; border: 0; border-radius: 0; border-top: 1px solid var(--border); padding: 16px 0 0; }
    .card-tabel .card-body { padding: 18px 20px; }
    /* HP: teks dropdown yang tidak muat diberi "…" (bukan terpotong di tengah huruf), jarak kartu dirapatkan */
    .card.card-filter .filter-grid select.form-control { text-overflow: ellipsis; }
    /* Label yang turun jadi dua baris (layar sangat sempit) tidak membuat dropdown di sebelahnya naik-turun */
    .card.card-filter .filter-grid { align-items: end; }
    @media (max-width: 575.98px) {
        .card-filter .card-body, .card-tabel .card-body { padding: 14px; }
        .card-filter { margin-bottom: 12px; }
        .toolbar-ikon { flex-basis: 38px; height: 38px; }
    }

    .status-chips { display: flex; flex-wrap: wrap; gap: 8px; }
    .status-inq, .status-pill {
        align-items: center;
        background: var(--chip-bg);
        border: 1px solid transparent;
        border-radius: 999px;
        color: var(--chip-fg);
        cursor: pointer;
        display: inline-flex;
        font-size: 12.5px;
        font-weight: 600;
        gap: 7px;
        padding: 6px 14px 6px 11px;
        transition: box-shadow .15s ease, transform .05s ease, opacity .15s ease;
        user-select: none;
    }
    .status-inq::before, .status-pill::before { background: currentColor; border-radius: 50%; content: ""; height: 8px; width: 8px; }
    .status-chips .status-inq:hover { box-shadow: 0 1px 4px rgba(15, 23, 42, .12); }
    .status-inq:active { transform: translateY(1px); }
    .status-inq:focus { outline: 0; }
    .status-inq.on { border-color: currentColor; box-shadow: 0 0 0 3px var(--chip-ring); }
    .status-chips:has(.on) .status-inq:not(.on) { opacity: .55; }

    .st-po    { --chip-bg: var(--st-po-bg);    --chip-fg: var(--st-po-fg);    --chip-ring: rgba(21, 128, 61, .15); }
    .st-quote { --chip-bg: var(--st-quote-bg); --chip-fg: var(--st-quote-fg); --chip-ring: rgba(23, 70, 184, .15); }
    .st-belum { --chip-bg: var(--st-belum-bg); --chip-fg: var(--st-belum-fg); --chip-ring: rgba(234, 179, 8, .25); }
    .st-tunda { --chip-bg: var(--st-tunda-bg); --chip-fg: var(--st-tunda-fg); --chip-ring: rgba(71, 85, 105, .15); }
    .st-close { --chip-bg: var(--st-close-bg); --chip-fg: var(--st-close-fg); --chip-ring: rgba(157, 58, 96, .18); }
    .st-none  { --chip-bg: #f1f5f9;            --chip-fg: #64748b; }

    .filter-grid { display: grid; gap: 12px; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); }
    .filter-grid .form-group { margin: 0; }
    .filter-grid .drp-group { grid-column: span 2; }
    .filter-grid label { color: var(--text-muted); font-size: 12px; font-weight: 600; margin-bottom: 4px; }

    /* ===== Bar atas & bawah DataTables ===== */
    .dt-top, .dt-bottom { align-items: center; display: flex; flex-wrap: wrap; gap: 12px; justify-content: space-between; }
    .dt-top { margin-bottom: 14px; }
    .dt-bottom { margin-top: 14px; }
    .dt-top .dataTables_length, .dt-top .dataTables_filter, .dt-top .dt-buttons { margin: 0 !important; }
    .dt-top .dataTables_length { order: 1; }
    .dt-top .dt-buttons { order: 2; margin-right: auto !important; }
    .dt-top .dataTables_filter { order: 3; }
    .dt-top .dataTables_filter input { margin-left: 0 !important; min-width: 260px; padding-left: 36px !important;
        background: #fff url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' viewBox='0 0 24 24'%3E%3Ccircle cx='11' cy='11' r='7'/%3E%3Cpath d='m20 20-3.5-3.5'/%3E%3C/svg%3E") no-repeat 12px center; }
    .dt-bottom .dataTables_info { padding: 0; }
    .dt-buttons .btn { background: #fff; border: 1px solid var(--border); color: var(--text); }
    .dt-buttons .btn:hover { background: var(--bg-page); }

    /* Dropdown pilih kolom: 2 kolom, desain sama dengan daftar pilihan dropdown filter */
    div.dt-button-collection,
    .dropdown-menu.dt-button-collection {
        animation: colvis-in .18s ease both;
        background: #fff !important;
        border: 1px solid #e3eaf6 !important;
        border-radius: 14px !important;
        box-shadow: 0 12px 32px rgba(15, 23, 42, .12) !important;
        column-count: 2 !important;
        column-gap: 10px !important;
        margin-top: 6px !important;
        min-width: 500px !important;
        padding: 12px !important;
        width: 500px !important;
    }
    @keyframes colvis-in { from { opacity: 0; transform: translateY(-4px); } }
    div.dt-button-collection a.dt-button,
    div.dt-button-collection button.dt-button,
    .dropdown-menu.dt-button-collection a.dt-button {
        break-inside: avoid-column !important;
        display: block !important;
        margin: 0 0 2px 0 !important;
        width: 100% !important;
    }
    /* Judul kecil di atas daftar, membentang di kedua kolom */
    div.dt-button-collection::before,
    .dropdown-menu.dt-button-collection::before {
        border-bottom: 1px solid #eef2f7;
        color: var(--text-muted);
        column-span: all;
        content: "Kolom yang ditampilkan";
        display: block;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .05em;
        margin-bottom: 8px;
        padding: 2px 6px 10px;
        text-transform: uppercase;
    }
    /* Tiap pilihan: kotak centang di kiri, jarak antar baris lega, tidak lagi blok biru penuh */
    body div.dt-button-collection .dt-button.buttons-columnVisibility,
    body .dropdown-menu.dt-button-collection .dt-button.buttons-columnVisibility {
        background: transparent !important;
        border: 0 !important;
        border-radius: 10px !important;
        box-shadow: none !important;
        color: var(--text-muted) !important;
        font-size: 13.5px;
        line-height: 1.35;
        margin: 0 0 4px 0 !important;
        padding: 9px 12px 9px 40px !important;
        position: relative;
        text-align: left;
        transition: background-color .15s ease, color .15s ease;
    }
    .dt-button.buttons-columnVisibility:hover,
    .dt-button.buttons-columnVisibility:focus-visible { background: #f1f5fd !important; color: var(--text-strong) !important; outline: 0; }
    body div.dt-button-collection .dt-button.buttons-columnVisibility.active,
    body .dropdown-menu.dt-button-collection .dt-button.buttons-columnVisibility.active { color: var(--text-strong) !important; font-weight: 600; }
    /* Kotak centang: kosong = kolom disembunyikan, biru bercentang = kolom tampil */
    .dt-button.buttons-columnVisibility::before {
        background: #fff;
        border: 1.5px solid #cbd5e1;
        border-radius: 5px;
        content: "";
        height: 16px;
        left: 12px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        transition: background-color .15s ease, border-color .15s ease;
        width: 16px;
    }
    .dt-button.buttons-columnVisibility.active::before { background: var(--brand-600); border-color: var(--brand-600); }
    .dt-button.buttons-columnVisibility.active::after {
        border: solid #fff;
        border-width: 0 2px 2px 0;
        content: "";
        height: 9px;
        left: 18px;
        position: absolute;
        top: 50%;
        transform: translateY(-62%) rotate(45deg);
        width: 4px;
    }

    /* ===== Tabel data ===== */
    #tabel-baru { font-size: 13px !important; }
    #tabel-baru tbody td { background: var(--row-bg, #fff); border-top: 1px solid #eef2f7; }
    #tabel-baru tbody tr > td:first-child { box-shadow: inset 3px 0 0 var(--row-accent, transparent); }
    #tabel-baru tbody tr:hover > td { background: #f5f8ff; }
    /* No. dan No. Surat tetap di tempat saat tabel digeser ke kanan (--col1 = lebar kolom No., diisi lewat JS) */
    #tabel-baru th:first-child, #tabel-baru td:first-child, #tabel-baru .col-surat { left: 0; position: sticky; z-index: 1; }
    #tabel-baru .col-surat { box-shadow: 1px 0 0 #e3eaf6; left: var(--col1, 48px); }
    #tabel-baru thead th:first-child, #tabel-baru thead .col-surat { z-index: 3; }

    #tabel-baru tr.table-success { --row-bg: #f6fcf8; --row-accent: #22c55e; }
    #tabel-baru tr.table-primary { --row-bg: #f6f9ff; --row-accent: #3b82f6; }
    #tabel-baru tr.table-warning { --row-bg: #fefce8; --row-accent: #eab308; }
    #tabel-baru tr.table-secondary { --row-bg: #fafbfc; --row-accent: #94a3b8; }
    #tabel-baru tr.close-gagal { --row-bg: #fcf3f6; --row-accent: #c2577f; }
    #tabel-baru tbody tr > td { color: var(--text); }

    #tabel-baru td.data-darurat { background: #fee2e2 !important; color: #b91c1c !important; box-shadow: inset 3px 0 0 #dc2626 !important; }

    .chip-surat {
        background: #f1f5f9;
        border-radius: 6px;
        color: var(--text-strong);
        display: inline-block;
        font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 8px;
        white-space: nowrap;
    }
    .chip-surat.bg-danger { background: #fee2e2 !important; color: #b91c1c !important; }
    .chip-surat.bg-primary { background: #dbeafe !important; color: #1d4ed8 !important; }

    .status-pill { cursor: default; font-size: 12px; padding: 4px 10px 4px 8px; white-space: nowrap; }

    .cell-strong { color: var(--text-strong) !important; font-weight: 600; }
    .cell-wrap { line-height: 1.45; max-width: 320px; min-width: 220px; white-space: normal; }
    /* Tanda produk prioritas di kolom Kebutuhan (dibulatkan agar latar kotak-kotak gambar tidak terlihat) */
    .cek-prioritas { border-radius: 50%; height: 18px; margin-right: 4px; vertical-align: -3px; width: 18px; }
    .cek-tip { cursor: default; margin-left: 0; } /* balon keterangan memakai gaya .tb-info */
    .cell-num { font-variant-numeric: tabular-nums; text-align: right; white-space: nowrap; }
    .cell-nowrap { white-space: nowrap; }
    .stars { display: block; font-size: 11px; font-weight: 400; margin-top: 3px; }

    .link-icon { align-items: center; display: inline-flex; gap: 6px; white-space: nowrap; }
    .link-icon .fa-whatsapp { color: #16a34a; font-size: 15px; }

    .btn-file {
        align-items: center;
        background: var(--brand-soft);
        border-radius: 8px;
        color: var(--brand-700) !important;
        display: inline-flex;
        font-size: 12px;
        font-weight: 600;
        gap: 6px;
        padding: 5px 10px;
        white-space: nowrap;
    }
    .btn-file:hover { background: #dbe7ff; }


    /* Tooltip batas follow up (baris Ditunda) */
    #hover-comment-box {
        background: #0f172a;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(15, 23, 42, .3);
        color: #fff;
        display: none;
        font-size: 12px;
        line-height: 1.5;
        max-width: 280px;
        padding: 10px 14px;
        pointer-events: none;
        position: fixed;
        z-index: 999999 !important;
    }
    tr[data-status="Ditunda"] { cursor: pointer; }

    /* Isi grid tidak boleh lebih lebar dari kartu */
    .table-toolbar { grid-template-columns: minmax(0, 1fr); }
    .filter-grid .form-control { min-width: 0; width: 100%; }
    #tabel-baru td { vertical-align: middle; }

    @media (max-width: 575.98px) {
        .filter-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 10px; }
        .status-chips { gap: 6px; }
        .status-inq { font-size: 12px; padding: 5px 11px 5px 9px; }

        /* Baris 1: jumlah entri + tombol kolom, baris 2: pencarian penuh */
        .dt-top { gap: 10px; }
        .dt-top .dataTables_length,
        .dt-top .dt-buttons { display: inline-flex !important; margin: 0 !important; width: auto; }
        .dt-top .dt-buttons { margin-left: auto !important; }
        .dt-top .dataTables_filter { flex: 1 0 100%; margin: 0 !important; }
        .dt-top .dataTables_filter label { margin: 0; width: 100%; }
        .dt-top .dataTables_filter input { min-width: 0; }
        .dt-bottom { justify-content: center; }
        .dt-bottom .dataTables_info { text-align: center !important; width: 100%; }
        .dt-button.buttons-columnVisibility { font-size: 13px; padding: 8px 28px 8px 10px !important; white-space: normal; }
        .dt-button.buttons-columnVisibility.active::after { right: 10px; }
    }
</style>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <!-- Kotak 1: judul + filter (terpisah dari kotak tabel di bawahnya) -->
                <div class="card card-filter">
                    <div class="card-body table-toolbar">
                        <div class="toolbar-head">
                        <div class="toolbar-judul">
                            <span class="toolbar-ikon"><i class="fa fa-database"></i></span>
                            <div>
                                <strong class="card-title">Data Inquiry</strong>
                                <div class="toolbar-sub"><?php echo count($table_2); ?> data &middot; klik status untuk memfilter</div>
                            </div>
                        </div>
                        <div class="status-chips">
                            <button type="button" class="status-inq st-po">Sudah PO</button>
                            <button type="button" class="status-inq st-quote">Sudah Quote</button>
                            <button type="button" class="status-inq st-belum">Belum Quote</button>
                            <button type="button" class="status-inq st-tunda">Ditunda</button>
                            <button type="button" class="status-inq st-close">Close/Gagal</button>
                        </div>
                        </div>
                        <div class="filter-grid">
                            <div class="form-group drp-group">
                                <label>Tanggal</label>
                                <div class="drp">
                                    <input type="hidden" id="time_from" name="time_from">
                                    <input type="hidden" id="time_to" name="time_to">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama_sales">Sales</label>
                                <select class="form-control" name="nama_sales" id="nama_sales">
                                    <?php
                                        if ($_SESSION['level'] == "admin") {
                                    ?>
                                      <option >Semua Sales</option>
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
                                    <?php
                                    } else { ?>
                                      <option ><?php echo $_SESSION['username']; ?></option>
                                    <?php } ?> 
                                      
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_priority">Priority Customer</label>
                                <select class="form-control" id="filter_priority">
                                        <option value="semua">Semua Customer</option>
                                        <option value="prioritas">⭐ Hanya Prioritas</option>
                                        <option value="bintang_5">⭐⭐⭐⭐⭐ Bintang 5 (> 1M)</option>
                                        <option value="bintang_4">⭐⭐⭐⭐ Bintang 4 (500jt - 1M)</option>
                                        <option value="bintang_3">⭐⭐⭐ Bintang 3 (300jt - 500jt)</option>
                                        <option value="bintang_2">⭐⭐ Bintang 2 (100jt - 300jt)</option>
                                        <option value="bintang_1">⭐ Bintang 1 (50jt - 100jt)</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_prospek">Prospek Kategori</label>
                                <select class="form-control" id="filter_prospek">
                                        <option value="semua">Semua Prospek</option>
                                        <option value="Hot">🚨 Hot</option>
                                        <option value="Warm">🔥 Warm</option>
                                        <option value="Cold">❄️ Cold</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="filter_produk_prioritas">Produk Prioritas</label>
                                <select class="form-control" id="filter_produk_prioritas">
                                        <option value="semua">Semua Produk</option>
                                        <option value="Iya">Hanya Produk Prioritas</option>
                                        <option value="Tidak">Bukan Produk Prioritas</option>
                                    </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Kotak 2: tabel data -->
                <div class="card card-tabel">
                    <div class="card-body">
                                                <table id="tabel-baru" class="table table-striped table-borde#cc3300" style="font-size: 12px;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="col-surat">No. Surat</th>
                                    <th>No Reff Quotation</th>
                                    <th>Kebutuhan</th>
                                    <th>Kategori</th>
                                    <th>Perusahaan</th>
                                    <th>Bidang Usaha</th>
                                    <th>Business Line</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Nama</th>
                                    <th>Telepon Kantor</th>
                                    <th>Telepon</th>
                                    <th>Email</th>
                                    <th>Tanggal Input</th>
                                    <th>Tanggal Update</th>
                                    <th>Sumber Inquiry</th>
                                    <th>Sumber Inquiry Website</th>
                                    <th>Sales</th>
                                    <th>Team</th>
                                    <th>Fup Quote</th>
                                    <th>Progress History Follow Up</th>
                                    <th>Status</th>
                                    <th>Nilai Quo</th>
                                    <th>File Quo</th>
                                    <th>No PO dari Cust</th>
                                    <th>Nilai PO</th>
                                    <th>File PO</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                
                                // --- FILTER LOGIKA URUTAN WARNA ---
                                $data_belum_ada_sales_merah = [];
                                $data_belum_ada_sales_biru = []; 
                                $data_prioritas_merah = [];
                                $data_normal = [];
                                
                                foreach($table_2 as $u) {
                                    $tanggal_sekarang = date("Y-m-d");
                                    $mulai_cek = date_create($u->tanggal_update); 
                                    $exp_cek = date_create($tanggal_sekarang); 
                                    $diff_cek = date_diff($mulai_cek, $exp_cek);
                                    $selisih_hari = $diff_cek->format("%a");
                                
                                    if ($u->status == "Sudah PO"){
                                        $u->custom_color = "table-success";
                                    } else if ($u->status == "Sudah Quote"){
                                        $u->custom_color = "table-primary";
                                    } else if ($u->status == "Belum Quote"){
                                        $u->custom_color = "table-warning";
                                    } else if ($u->status == "Ditunda"){
                                        $u->custom_color = "table-secondary";
                                    } else if ($u->status == "Close/Gagal"){
                                        $u->custom_color = "close-gagal";
                                    } else {
                                        $u->custom_color = "";
                                    }
                                
                                    // Penentuan status warna kolom No. Surat
                                    $is_sales_merah = false;
                                    if (strcasecmp(trim($u->pic), "Belum ada sales") == 0) {
                                        if ($selisih_hari > 2) {
                                            $u->surat_color = "bg-danger text-white"; 
                                            $is_sales_merah = true; 
                                        } else {
                                            $u->surat_color = "bg-primary text-white"; 
                                        }
                                    } else {
                                        $u->surat_color = "";
                                    }
                                
                                    // --- LOGIKA PENYUSUNAN URUTAN (MODIFIKASI: CLOSE/GAGAL TIDAK MASUK BARISAN AWAL) ---
                                    if (strcasecmp(trim($u->pic), "Belum ada sales") == 0 && $u->status != "Close/Gagal") {
                                        $u->is_darurat = false;
                                        
                                        if ($is_sales_merah) {
                                            // Kelompok 1: Belum ada sales DAN sudah lewat 2 hari (MERAH)
                                            $data_belum_ada_sales_merah[] = $u;
                                        } else {
                                            // Kelompok 2: Belum ada sales TAPI masih baru (BIRU)
                                            $data_belum_ada_sales_biru[] = $u;
                                        }
                                    } else if (($u->status == "Sudah Quote" || $u->status == "Belum Quote") && $selisih_hari > 7 && $u->status != "Close/Gagal") {
                                        // Kelompok 3: Data darurat status (lebih dari 7 hari belum progres)
                                        $u->is_darurat = true; 
                                        $data_prioritas_merah[] = $u; 
                                    } else {
                                        // Kelompok 4: Data normal sisanya (Semua data Close/Gagal otomatis langsung dilempar kesini)
                                        $u->is_darurat = false;
                                        $data_normal[] = $u;
                                    }
                                }
                                
                                // Gabungkan kembali array dengan struktur urutan baru yang sudah menyaring Close/Gagal ke bawah
                                $table_sorted = array_merge(
                                    $data_belum_ada_sales_merah,
                                    $data_belum_ada_sales_biru,
                                    $data_prioritas_merah,
                                    $data_normal  
                                );

                                // =========================================================================
                                // LOGIKA 1: HITUNG TOTAL PO PER PERUSAHAAN & FUNGSI BINTANG
                                // =========================================================================
                                $po_per_perusahaan = [];

                                if (!empty($table_sorted)) {
                                    foreach ($table_sorted as $row) {
                                        $nama_pt = isset($row->nama_perusahaan_klien) ? trim(strtolower($row->nama_perusahaan_klien)) : '';
                                        $nama_pt_std = preg_replace('/\s+/', ' ', $nama_pt);
                                        
                                        $status_po = isset($row->status) ? trim(strtolower($row->status)) : '';
                                        
                                        if (!empty($nama_pt_std) && $status_po === 'sudah po') {
                                            if (!isset($po_per_perusahaan[$nama_pt_std])) {
                                                $po_per_perusahaan[$nama_pt_std] = 0;
                                            }
                                            $po_per_perusahaan[$nama_pt_std] += (float) (isset($row->nilai_po) ? $row->nilai_po : 0);
                                        }
                                    }
                                }

                                if (!function_exists('get_priority_stars')) {
                                    function get_priority_stars($total_po) {
                                        if ($total_po > 1000000000) { // Di atas 1 Miliar
                                            return str_repeat('⭐', 5);
                                        } elseif ($total_po >= 500000000 && $total_po <= 1000000000) { // 500jt - 1M
                                            return str_repeat('⭐', 4);
                                        } elseif ($total_po >= 300000000 && $total_po < 500000000) { // 300jt - 500jt
                                            return str_repeat('⭐', 3);
                                        } elseif ($total_po >= 100000000 && $total_po < 300000000) { // 100jt - 300jt
                                            return str_repeat('⭐', 2);
                                        } elseif ($total_po >= 50000000 && $total_po < 100000000) { // 50jt - 100jt
                                            return str_repeat('⭐', 1);
                                        }
                                        return '';
                                    }
                                }
                                // =========================================================================

                                foreach($table_sorted as $u){
                                ?>
                                <?php
                                $tanggal= date("Y-m-d");
                                $mulai =date_create($u->tanggal_update); 
                                $exp = date_create($tanggal); 
                                $diff =  date_diff($mulai, $exp);
                                $hasil_diff = $diff->format("%a");
                                $mulais =date_create($u->tanggal_input); 
                                $exps = date_create($u->tanggal_quotation); 
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
                                
                                $format_nilai_quotation = !empty($u->nilai_quotation) ? "Rp " . number_format($u->nilai_quotation, 0, ',', '.') : "Rp 0";
                                $format_nilai_po = !empty($u->nilai_po) ? "Rp " . number_format($u->nilai_po, 0, ',', '.') : "Rp 0";

                                // KALKULASI TOTAL PO DI SINI SEBELUM TR DIBUAT AGAR BISA DISISIPKAN KE DATA-ATTRIBUTES
                                $pt_baris_ini = isset($u->nama_perusahaan_klien) ? trim(strtolower($u->nama_perusahaan_klien)) : '';
                                $pt_baris_ini_std = preg_replace('/\s+/', ' ', $pt_baris_ini);
                                $total_po_pt = isset($po_per_perusahaan[$pt_baris_ini_std]) ? $po_per_perusahaan[$pt_baris_ini_std] : 0;
                                ?>
                                
                                <tr class="<?php echo $u->custom_color ?>" 
                                    data-status="<?php echo $u->status ?>" 
                                    data-tglinput="<?php echo $u->tanggal_input ?>" 
                                    data-tglupdate="<?php echo $u->tanggal_update ?>" 
                                    data-sales="<?php echo $u->pic ?>"
                                    data-totalpo="<?php echo $total_po_pt; ?>"
                                    data-produkprioritas="<?php echo $u->produk_prioritas === 'Iya' ? 'Iya' : 'Tidak'; ?>"
                                    /* Membaca field prospect_category khusus untuk Sudah Quote */
                                    data-prospek="<?php echo ($u->status == 'Sudah Quote') ? (!empty($u->prospect_category) ? $u->prospect_category : 'Cold') : 'None'; ?>" 
                                    data-fupboundary="<?php echo !empty($u->batas_followup) ? $u->batas_followup : 'Tidak ada batas waktu'; ?>">
                                    
                                    <td class="kolom-nomor-prospek <?php echo ($u->is_darurat) ? 'data-darurat' : ''; ?>" data-id="<?php echo $u->nomor_surat; ?>" style="text-align: left; font-weight: bold; vertical-align: middle; white-space: nowrap;">
                                    </td>
                                    <td class="col-surat"><span class="chip-surat<?php echo $u->surat_color; ?>"><?php echo $u->nomor_surat ?></span></td>
                                    <td class="cell-nowrap"><?php echo $u->no_quotation ?></td>
                                    <td class="cell-wrap"><?php if ($u->produk_prioritas === 'Iya' && trim($u->kebutuhan_klien) !== '') { ?><span class="tb-info cek-tip" tabindex="0" data-info="Produk Prioritas"><img class="cek-prioritas" src="<?php echo base_url();?>images/checklist.jpg" alt="Produk Prioritas"></span> <?php } ?><?php echo $u->kebutuhan_klien ?></td>
                                    <td><?php echo $u->kategori ?></td>
                                    
                                    <td class="cell-wrap cell-strong">
                                        <?php 
                                        echo $u->nama_perusahaan_klien; 

                                        $bintang_prioritas = get_priority_stars($total_po_pt);

                                        if (!empty($bintang_prioritas)) {
                                            echo '<span class="stars" title="Customer Priority (Total PO: Rp ' . number_format($total_po_pt, 0, ',', '.') . ')">' . $bintang_prioritas . '</span>';
                                        }
                                        ?>
                                    </td>
                                    
                                    <td><?php echo isset($u->nama_bidang_usaha) ? $u->nama_bidang_usaha : 'Tidak Ada'; ?></td>
                                    <td><?php echo $u->business_line ?></td>
                                    <td class="cell-wrap"><?php echo $u->alamat_kantor_klien ?></td>
                                    <td><?php echo $u->nama_klien ?></td>
                                    <td class="cell-nowrap"><?php echo $u->telepon_office_klien ?></td>
                                    <td><?php if (!empty($u->telepon_klien)): ?><a class="link-icon" href="https://web.whatsapp.com/send?phone=<?php echo $telepon ?>" target="_blank"><i class="fa fa-whatsapp"></i><?php echo $u->telepon_klien ?></a><?php endif; ?></td>
                                    <td><?php if (!empty($u->email_klien)): ?><a class="link-icon" href="https://mail.google.com/mail/#search/<?php echo $u->email_klien ?>" target="_blank"><i class="fa fa-envelope-o"></i><?php echo $u->email_klien ?></a><?php endif; ?></td>
                                    <td class="cell-nowrap"><?php echo $u->tanggal_input ?></td>
                                    <td class="cell-nowrap"><?php echo $u->tanggal_update ?></td>
                                    <td><?php echo $u->sumber_inq ?></td>
                                    <td><?php echo $u->sumber_inq_web ?></td>
                                    <td class="cell-nowrap cell-strong"><?php echo $u->pic ?></td>
                                    <td><?php echo $u->team ?></td>
                                    <td><?php echo $u->fup_quote ?></td>
                                    <td class="cell-wrap"><?php echo $u->progress_hist_foll_up ?></td>
                                    <td><?php $st_cls = array('Sudah PO' => 'st-po', 'Sudah Quote' => 'st-quote', 'Belum Quote' => 'st-belum', 'Ditunda' => 'st-tunda', 'Close/Gagal' => 'st-close'); ?><span class="status-pill <?php echo isset($st_cls[$u->status]) ? $st_cls[$u->status] : 'st-none'; ?>"><?php echo $u->status ?></span></td>
                                    <td class="cell-num"><?php echo $format_nilai_quotation ?></td>
                                    <td><?php if (!empty($u->file_quotation)): ?>
                                            <a href="<?php echo $u->file_quotation; ?>" class="btn-file" target="_blank" title="<?php echo $u->file_quotation; ?>"><i class="fa fa-file-text-o"></i> Lihat</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?></td>
                                    <td class="cell-nowrap"><?php echo $u->no_po ?></td>
                                    <td class="cell-num cell-strong"><?php echo $format_nilai_po ?></td>
                                    <td><?php if (!empty($u->file_po)): ?>
                                            <a href="<?php echo $u->file_po; ?>" class="btn-file" target="_blank" title="<?php echo $u->file_po; ?>"><i class="fa fa-file-text-o"></i> Lihat</a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?></td>
                                    <td>
                                        <div class="row-actions">
                                            <a class="icon-btn btn-detail" title="Detail Data" href="#" data-lokasi="<?php echo htmlspecialchars(trim($u->kab_kota . ', ' . $u->provinsi, ', '), ENT_QUOTES, 'UTF-8'); ?>"><i class="fa fa-eye"></i></a>
                                            <a class="icon-btn" title="Ubah Data" href="<?php echo base_url();?>edit_data/<?php echo $u->nomor_surat?>" target="_blank"><i class="fa fa-pencil"></i></a>
                                            <a class="icon-btn danger" title="Hapus Data" href="<?php echo base_url();?>hapus_data/<?php echo $u->nomor_urut?>"><i class="fa fa-trash-o"></i></a>
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


<script>
    $(document).ready(function() {
        // 1. Inisialisasi DataTables dengan fitur colVis (Column Visibility)
        var table = $('#tabel-baru').DataTable({
            "order": [],
            "language": { "search": "", "searchPlaceholder": "Cari perusahaan, no. surat, sales...", "lengthMenu": "_MENU_ per halaman", "info": "_START_–_END_ dari _TOTAL_ data", "infoFiltered": "(disaring dari _MAX_)", "paginate": { "previous": "‹", "next": "›" } },
            "dom": '<"dt-top"lf>r<"table-scroll"t><"dt-bottom"ip>', 
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Semua"]], 
            "buttons": [
                {
                    extend: 'colvis',
                    text: '<i class="fa fa-columns"></i> Kolom',
                    className: 'btn btn-secondary btn-sm',
                    columns: ':not(:first-child):not(:last-child)' 
                }
            ]
        });
    
        // Memindahkan container tombol colVis tepat ke sebelah kanan "Show entries"
        table.buttons().container().insertAfter('.dataTables_length');

        // Kolom No. Surat menempel tepat di kanan kolom No. saat tabel digeser
        function setCol1() { table.table().node().style.setProperty('--col1', $(table.column(0).header()).outerWidth() + 'px'); }
        table.on('draw column-visibility', setCol1);
        $(window).on('resize', setCol1);
        
        // --- RENDER PENOMORAN DINAMIS DENGAN IKON EMOJI PROSPEK (HANYA SUDAH QUOTE) ---
        table.on('order.dt search.dt', function () {
            table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                var $tr = $(cell).closest('tr');
                var statusBaris = $tr.attr('data-status') ? $tr.attr('data-status').trim() : "";
                var prospek = $tr.attr('data-prospek') ? $tr.attr('data-prospek').trim() : "Cold";
                var nomor = i + 1;
                
                if (statusBaris === "Sudah Quote") {
                    $(cell).css('cursor', 'pointer'); 
                    $(cell).css('text-align', 'center'); 
                    
                    // Base style backdrop putih transparan agar kontras dan seragam
                    var baseStyle = 'font-size: 16px; display: inline-block; margin-top: 5px; background: rgba(255,255,255,0.9); padding: 2px 6px; border-radius: 5px; box-shadow: 0 1px 3px rgba(0,0,0,0.15);';
        
                    if (prospek === "Hot") {
                        cell.innerHTML = nomor + `<br><span style="${baseStyle}">🚨</span>`;
                        $(cell).attr('title', '🚨 Hot Priority (Klik untuk ubah)');
                    } else if (prospek === "Warm") {
                        cell.innerHTML = nomor + `<br><span style="${baseStyle}">🔥</span>`;
                        $(cell).attr('title', '🔥 Warm Priority (Klik untuk ubah)');
                    } else {
                        cell.innerHTML = nomor + `<br><span style="${baseStyle}">❄️</span>`;
                        $(cell).attr('title', '❄️ Cold Prospek (Klik untuk ubah)');
                    }
                } else {
                    $(cell).css('cursor', 'default');
                    $(cell).css('text-align', 'left'); 
                    $(cell).removeAttr('title');
                    cell.innerHTML = nomor;
                }
            });
        }).draw();

        var statusAktif = [];

        // 2. Fungsi Custom Filter Multiparameter DataTables (Real-time)
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var rowNode = table.row(dataIndex).node();
                
                var statusBaris = $(rowNode).attr('data-status');
                var tglInputBaris = $(rowNode).attr('data-tglinput') ? $(rowNode).attr('data-tglinput').trim() : "";
                var tglUpdateBaris = $(rowNode).attr('data-tglupdate') ? $(rowNode).attr('data-tglupdate').trim() : "";
                var salesBaris = $(rowNode).attr('data-sales') ? $(rowNode).attr('data-sales').trim() : "";
                var totalPoBaris = $(rowNode).attr('data-totalpo') ? parseFloat($(rowNode).attr('data-totalpo')) : 0;

                var minDate = $('#time_from').val();
                var maxDate = $('#time_to').val();
                var salesTerpilih = $('#nama_sales').val() ? $('#nama_sales').val().trim() : "Semua Sales";
                var filterPriority = $('#filter_priority').val();
                var filterProspek = $('#filter_prospek').val();
                var prospekBaris = $(rowNode).attr('data-prospek') ? $(rowNode).attr('data-prospek').trim() : "Cold";

                // --- FILTER 1: STATUS ---
                if (statusAktif.length > 0 && !statusAktif.includes(statusBaris)) {
                    return false; 
                }

                // --- FILTER 2: NAMA SALES ---
                if (salesTerpilih !== "Semua Sales" && salesTerpilih !== "") {
                    var salesBarisLower = salesBaris.toLowerCase();
                    var salesTerpilihLower = salesTerpilih.toLowerCase();
                
                    if (salesBarisLower !== salesTerpilihLower) {
                        return false; 
                    }
                }

                // --- FILTER 3: RENTANG TANGGAL ---
                if (minDate !== "" || maxDate !== "") {
                    var tglInputValid = true;
                    if (minDate !== "" && tglInputBaris < minDate) tglInputValid = false;
                    if (maxDate !== "" && tglInputBaris > maxDate) tglInputValid = false;

                    var tglUpdateValid = true;
                    if (minDate !== "" && tglUpdateBaris < minDate) tglUpdateValid = false;
                    if (maxDate !== "" && tglUpdateBaris > maxDate) tglUpdateValid = false;

                    if (!tglInputValid && !tglUpdateValid) {
                        return false; 
                    }
                }

                // --- FILTER 4: CUSTOMER PRIORITY (NEW) ---
                if (filterPriority !== "semua") {
                    if (filterPriority === "prioritas") {
                        // Harus memiliki minimal bintang 1 (total PO >= 50 Juta)
                        if (totalPoBaris < 50000000) return false;
                    } else if (filterPriority === "bintang_5") {
                        if (totalPoBaris <= 1000000000) return false;
                    } else if (filterPriority === "bintang_4") {
                        if (totalPoBaris < 500000000 || totalPoBaris > 1000000000) return false;
                    } else if (filterPriority === "bintang_3") {
                        if (totalPoBaris < 300000000 || totalPoBaris >= 500000000) return false;
                    } else if (filterPriority === "bintang_2") {
                        if (totalPoBaris < 100000000 || totalPoBaris >= 300000000) return false;
                    } else if (filterPriority === "bintang_1") {
                        if (totalPoBaris < 50000000 || totalPoBaris >= 100000000) return false;
                    }
                }
                
                
                // --- FILTER 5: PRODUK PRIORITAS ---
                var filterProdukPrioritas = $('#filter_produk_prioritas').val();
                if (filterProdukPrioritas !== "semua" && $(rowNode).attr('data-produkprioritas') !== filterProdukPrioritas) {
                    return false;
                }

                // A. Deklarasikan variabel ini di bagian atas fungsi filter (sejajar dengan minDate, dll)
                var filterProspek = $('#filter_prospek').val();
                var statusBaris = $(rowNode).attr('data-status');
                var prospekBaris = $(rowNode).attr('data-prospek') ? $(rowNode).attr('data-prospek').trim() : "None";
                
                // B. Tambahkan logika pengecekan ini di bagian bawah filter sebelum kode "return true;"
                if (filterProspek !== "semua") {
                    // Jika user memfilter prospek, pastikan baris yang tampil HANYA yang berstatus 'Sudah Quote' dan prospeknya cocok
                    if (statusBaris !== "Sudah Quote" || prospekBaris !== filterProspek) {
                        return false; 
                    }
                }

                return true;
            }
        );

        // 3. EVENT A: Klik pada Tabel Filter Status Kotak (Kecil)
        $('.status-inq').on('click', function() {
            $(this).toggleClass('on');

            statusAktif = [];
            $('.status-inq.on').each(function() {
                statusAktif.push($(this).text().trim());
            });

            table.draw();
        });

        // 4. EVENT B: Trigger Real-time ketika input-input filter berubah
        $('#time_from, #time_to, #nama_sales, #filter_priority, #filter_prospek, #filter_produk_prioritas').on('change keyup', function() {
            table.draw();
        });

        // 5. EVENT C: Tombol Submit
        $('#save').on('click', function(e) {
            e.preventDefault(); 
            table.draw();
        });
        
        // Memicu filter live DataTables ketika dropdown filter prospek diubah
        $('#time_from, #time_to, #nama_sales, #filter_priority, #filter_prospek').on('change keyup', function() {
            table.draw();
        });
        
        // 1. TAMBAHKAN EVENT UNTUK MENUTUP MENU JIKA USER KLIK DI LUAR MENU
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.kolom-nomor-prospek, #custom-prospect-menu').length) {
                $('#custom-prospect-menu').remove();
            }
        });
        
        // 2. EVENT KLIK PADA NOMOR UNTUK MEMUNCUKKAN MENU KECIL DI POSISI KURSOR
        $('body').on('click', '.kolom-nomor-prospek', function(e) {
            e.stopPropagation(); // Mencegah trigger event document click di atas
            
            var $td = $(this);
            var $tr = $td.closest('tr');
            var statusBaris = $tr.attr('data-status') ? $tr.attr('data-status').trim() : "";
            var nomorSurat = $td.attr('data-id');
            var currentProspek = $tr.attr('data-prospek') ? $tr.attr('data-prospek').trim() : "Cold";
        
            // Validasi ketat: Abaikan jika data bukan berstatus "Sudah Quote"
            if (statusBaris !== "Sudah Quote") {
                return;
            }
        
            // Hapus menu lama jika sebelumnya sudah ada yang terbuka di baris lain
            $('#custom-prospect-menu').remove();
        
            // Buat elemen menu popup kecil dengan style melayang (absolute)
            var menuHtml = `
                <div id="custom-prospect-menu" style="
                    position: fixed; 
                    top: ${e.clientY + 10}px; 
                    left: ${e.clientX + 10}px; 
                    background: #ffffff; 
                    border: 1px solid #ccc; 
                    box-shadow: 2px 2px 10px rgba(0,0,0,0.2); 
                    border-radius: 6px; 
                    padding: 5px 0; 
                    z-index: 999999;
                    min-width: 130px;
                    font-family: sans-serif;
                ">
                    <div style="padding: 5px 12px; font-weight: bold; font-size: 11px; color: #777; border-bottom: 1px solid #eee;">Pilih Kategori:</div>
                    <a href="#" class="opt-prospect" data-value="Cold" style="display: block; padding: 6px 12px; color: #333; text-decoration: none; font-size: 12px;">❄️ Cold</a>
                    <a href="#" class="opt-prospect" data-value="Warm" style="display: block; padding: 6px 12px; color: #333; text-decoration: none; font-size: 12px;">🔥 Warm</a>
                    <a href="#" class="opt-prospect" data-value="Hot" style="display: block; padding: 6px 12px; color: #333; text-decoration: none; font-size: 12px;">🚨 Hot</a>
                </div>
            `;
        
            // Sisipkan menu ke dalam body dokumen
            $('body').append(menuHtml);
        
            // Tambahkan efek hover sederhana pada opsi menu lewat jQuery
            $('.opt-prospect').hover(
                function() { $(this).css('background-color', '#f1f3f5'); },
                function() { $(this).css('background-color', 'transparent'); }
            );
        
            // EVENT SAAT SALAH SATU OPSI DI DALAM MENU KECIL DIKLIK
            $('.opt-prospect').off('click').on('click', function(evt) {
                evt.preventDefault();
                
                var nextStatus = $(this).attr('data-value');
                var iconEmoji = "";
        
                if (nextStatus === "Cold") iconEmoji = "❄️ ";
                else if (nextStatus === "Warm") iconEmoji = "🔥 ";
                else if (nextStatus === "Hot") iconEmoji = "🚨 ";
        
                // Hapus menu popup setelah opsi dipilih
                $('#custom-prospect-menu').remove();
        
                // Jika status terpilih sama dengan status saat ini, batalkan AJAX (hemat resource)
                if (nextStatus === currentProspek) {
                    return;
                }
        
                // Jalankan AJAX untuk update ke database
                $.ajax({
                    url: "<?php echo base_url('update_priority_status'); ?>", 
                    type: "POST",
                    data: {
                        nomor_surat: nomorSurat,
                        priority_status: nextStatus 
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            // 1. Perbarui atribut data-prospek pada tag TR
                            $tr.attr('data-prospek', nextStatus);
                            
                            // 2. Ambil angka nomor urut saja
                            var nomorSaja = $td.text().replace(/[^\d]/g, ''); 
                            
                            // 3. Render ulang HTML berdasarkan status baru dengan styling kontras seragam
                            var baseStyle = 'font-size: 16px; display: inline-block; margin-top: 5px; background: rgba(255,255,255,0.9); padding: 2px 6px; border-radius: 5px; box-shadow: 0 1px 3px rgba(0,0,0,0.15);';
                            
                            var htmlContent = nomorSaja + `<br><span style="${baseStyle}">${iconEmoji.trim()}</span>`;
                            
                            $td.html(htmlContent);
                            $td.attr('title', iconEmoji + nextStatus + ' Priority (Klik untuk ubah)');
                            
                            // 4. Invalidate row agar pencarian dan filter DataTables sinkron
                            table.row($tr).invalidate().draw(false);
                        } else {
                            alert("Gagal memperbarui status prospek: " + response.message);
                        }
                    }
                });
            });
        });
    });
    
    // Memastikan div penampung comment box terbuat otomatis di root dokumen jika belum ada
    if ($('#hover-comment-box').length === 0) {
        $('body').append('<div id="hover-comment-box"></div>');
    }
    
    var $commentBox = $('#hover-comment-box');
    
    // Menggunakan event delegation ke body agar posisi koordinat dibaca secara global layar
    $('body').on('mouseenter', '#tabel-baru tbody tr[data-status="Ditunda"]', function(e) {
        var batasFollowUp = $(this).attr('data-fupboundary');
        
        // Set text konten box
        $commentBox.html('<b style="color: #ffc107;">⏳ Batas Follow Up:</b><br>' + batasFollowUp);
        $commentBox.show();
    });
    
    $('body').on('mousemove', '#tabel-baru tbody tr[data-status="Ditunda"]', function(e) {
        // Karena menggunakan position: fixed, kita menggunakan e.clientX & e.clientY (bukan pageX/Y)
        // Ditambah jarak aman offset 15px agar tidak tertutup kursor utama
        $commentBox.css({
            top: (e.clientY + 15) + 'px',
            left: (e.clientX + 15) + 'px'
        });
    });
    
    $('body').on('mouseleave', '#tabel-baru tbody tr[data-status="Ditunda"]', function() {
        $commentBox.hide();
    });
</script>
<div id="hover-comment-box"></div>
<!-- Bubble detail data (aksi ikon mata): ringkasan inquiry + tombol Copy data -->
<style>
  .icon-btn.aktif { background: var(--brand-soft); border-color: #c7d7fe; color: var(--brand-700) !important; }
  .dt-bubble { animation: m-picker-in .18s ease both; background: #fff; border: 1px solid #e3eaf6; border-radius: 14px; box-shadow: 0 12px 32px rgba(15, 23, 42, .14); max-width: calc(100vw - 24px); position: absolute; width: 360px; z-index: 1040; }
  .dt-bubble::after { background: #fff; border-right: 1px solid #e3eaf6; border-top: 1px solid #e3eaf6; content: ""; height: 12px; position: absolute; right: -7px; top: var(--panah, 20px); transform: rotate(45deg); width: 12px; }
  .dt-bubble.di-bawah::after { display: none; }
  .dt-bubble-head { align-items: center; background: linear-gradient(180deg, #f8fbff, #f2f6fd); border-bottom: 1px solid #e3eaf6; border-radius: 14px 14px 0 0; color: var(--text-strong); display: flex; font-size: 14px; font-weight: 700; justify-content: space-between; padding: 11px 14px; }
  .dt-bubble-head button { background: none; border: 0; color: var(--text-faint); cursor: pointer; font-size: 14px; line-height: 1; padding: 4px; }
  .dt-bubble-head button:hover { color: var(--text-strong); }
  .dt-bubble dl { margin: 0; max-height: min(340px, 50vh); overflow-y: auto; padding: 10px 14px; }
  .dt-bubble dt { color: var(--text-muted); font-size: 11px; font-weight: 700; letter-spacing: .05em; text-transform: uppercase; }
  .dt-bubble dd { color: var(--text-strong); font-size: 13px; margin: 1px 0 9px; overflow-wrap: anywhere; white-space: pre-line; }
  .dt-bubble dd:last-child { margin-bottom: 0; }
  .dt-bubble-foot { background: #fafbfd; border-radius: 0 0 14px 14px; border-top: 1px solid var(--border); padding: 10px 14px; }
  .dt-bubble-foot .btn { align-items: center; background: var(--brand-600); border-color: var(--brand-600); border-radius: 10px; display: flex; gap: 8px; justify-content: center; width: 100%; }
  .dt-bubble-foot .btn:hover { background: var(--brand-700); border-color: var(--brand-700); }
  .dt-bubble-foot .btn.tersalin { background: #16a34a; border-color: #16a34a; }
</style>
<script>
  (function ($) {
    // label saat di-copy => judul kolom tabel (Lokasi Project tidak punya kolom: dari data-lokasi tombol)
    var FIELD = [['No Inq', 'No. Surat'], ['No WhatsApp', 'Telepon'], ['Email', 'Email'], ['Nama', 'Nama'], ['Company', 'Perusahaan'],
                 ['Bidang Usaha', 'Bidang Usaha'], ['Kebutuhan', 'Kebutuhan'], ['Lokasi Project', null], ['Alamat Perusahaan', 'Alamat Perusahaan'],
                 ['Sumber', 'Sumber Inquiry'], ['Pic Sales', 'Sales']];
    var $bubble = null, $btn = null;

    function tutup() { if ($bubble) { $bubble.remove(); $btn.removeClass('aktif'); $bubble = $btn = null; } }
    function teks(html) { var $d = $('<div>').html(html); $d.find('.stars').remove(); return $.trim($d.text().replace(/[ \t]+/g, ' ')); }

    $(document).on('click', '.btn-detail', function (e) {
      e.preventDefault();
      if ($btn && $btn[0] === this) { tutup(); return; }
      tutup();
      $btn = $(this).addClass('aktif');

      // Ambil isi baris dari DataTables (kolom yang disembunyikan tetap terbaca), dicocokkan lewat judul kolom
      // window.jQuery: plugin DataTables menempel di jQuery yang dimuat footer, bukan $ milik blok ini
      var $tabel = window.jQuery('#tabel-baru'), table = $tabel.DataTable(), baris = table.row($btn.closest('tr')[0]).data(), kolom = {};
      table.columns().every(function (i) { kolom[$.trim($(this.header()).text())] = i; });
      $tabel.one('draw.dt', tutup); // halaman/urutan tabel berganti: posisi tombol berubah
      var lokasi = $btn.data('lokasi');
      var data = FIELD.map(function (f) { return [f[0], (f[1] === null ? lokasi : teks(baris[kolom[f[1]]])) || '-']; });

      var $dl = $('<dl>');
      data.forEach(function (d) { $dl.append($('<dt>').text(d[0]), $('<dd>').text(d[1])); });
      $bubble = $('<div class="dt-bubble" role="dialog" aria-label="Detail data">').append(
        '<div class="dt-bubble-head"><span>Detail Data</span><button type="button" data-tutup aria-label="Tutup"><i class="fa fa-times"></i></button></div>',
        $dl,
        '<div class="dt-bubble-foot"><button type="button" class="btn btn-primary btn-sm" data-copy><i class="fa fa-copy"></i><span>Copy data</span></button></div>'
      ).data('salin', data.map(function (d) { return d[0] + ': ' + d[1]; }).join('\n')).appendTo('body');

      // Posisi: di kiri tombol dengan panah menunjuk tombol; di layar sempit di bawah tombol
      var r = this.getBoundingClientRect(), w = $bubble.outerWidth(), h = $bubble.outerHeight();
      if (r.left - w - 14 > 8) {
        var top = Math.max(8, Math.min(r.top - 12, window.innerHeight - h - 8));
        $bubble.css({ left: r.left - w - 14 + window.scrollX, top: top + window.scrollY, '--panah': Math.max(14, r.top + r.height / 2 - top - 6) + 'px' });
      } else {
        $bubble.addClass('di-bawah').css({ left: Math.max(12, Math.min(r.right - w, window.innerWidth - w - 12)) + window.scrollX, top: r.bottom + 8 + window.scrollY });
      }
    });

    $(document).on('click', '.dt-bubble [data-tutup]', tutup);
    $(document).on('click', '.dt-bubble [data-copy]', function () {
      var $b = $(this), isi = $bubble.data('salin');
      function selesai() { $b.addClass('tersalin').find('span').text('Tersalin'); setTimeout(function () { $b.removeClass('tersalin').find('span').text('Copy data'); }, 1500); }
      function cadangan() { var $t = $('<textarea>').val(isi).css({ left: -9999, position: 'fixed' }).appendTo('body'); $t[0].select(); document.execCommand('copy'); $t.remove(); selesai(); }
      if (navigator.clipboard && window.isSecureContext) navigator.clipboard.writeText(isi).then(selesai, cadangan); else cadangan();
    });
    // Tutup saat klik di luar, Esc, atau tabel digeser (posisi tombol berubah)
    $(document).on('mousedown', function (e) { if ($bubble && !$(e.target).closest('.dt-bubble, .btn-detail').length) tutup(); });
    $(document).on('keydown', function (e) { if (e.key === 'Escape') tutup(); });
    document.addEventListener('scroll', function (e) { if ($bubble && !$bubble[0].contains(e.target)) tutup(); }, true);
  })(jQuery);
</script>
<!-- Popup edit: form edit_data dimuat ke sini, simpan tanpa pindah halaman -->
<div id="ed-modal" class="ed-modal"></div>
<script>
  (function ($) {
    var $modal = $('#ed-modal');
    function tutup() { $modal.removeClass('is-open').empty(); $('body').removeClass('ed-lock'); }

    // Ctrl/Shift/klik-tengah tetap membuka halaman edit di tab baru
    $(document).on('click', 'a[href*="/edit_data/"]', function (e) {
      if (e.ctrlKey || e.metaKey || e.shiftKey) return;
      e.preventDefault();
      $('body').addClass('ed-lock');
      $modal.addClass('is-open').scrollTop(0).html('<div class="ed-loading">Memuat data...</div>').load(this.href, function (res, status) {
        if (status === 'error') $modal.html('<div class="ed-loading">Gagal memuat data.<br><br><button type="button" class="btn btn-reset" data-tutup>Tutup</button></div>');
      });
    });
    // Konfirmasi hapus: popup bergaya sama, pengganti confirm() bawaan browser
    $(document).on('click', 'a[href*="/hapus_data/"]', function (e) {
      if ($(this).closest($modal).length) return; // tombol "Hapus" di dalam popup: lanjut ke href
      e.preventDefault();
      $('body').addClass('ed-lock');
      $modal.addClass('is-open').html(
        '<div class="card ed-confirm"><div class="card-body">' +
          '<div class="ed-confirm-icon"><i class="fa fa-trash-o"></i></div>' +
          '<h5>Hapus data ini?</h5>' +
          '<p>Data dengan nomor surat <strong></strong> akan dihapus permanen dan tidak bisa dikembalikan.</p>' +
        '</div><div class="card-footer form-actions">' +
          '<button type="button" class="btn btn-reset" data-tutup><i class="fa fa-times"></i><span>Batal</span></button>' +
          '<a class="btn btn-danger"><i class="fa fa-trash-o"></i><span>Hapus</span></a>' +
        '</div></div>');
      $modal.find('strong').text($(this).closest('tr').find('.chip-surat').text());
      $modal.find('a.btn-danger').attr('href', this.href).trigger('focus');
    });
    $modal.on('click', '[data-tutup]', tutup);
    $(document).on('keydown', function (e) { if (e.key === 'Escape' && $modal.hasClass('is-open')) tutup(); });

    $modal.on('submit', 'form', function (e) {
      e.preventDefault();
      var $btn = $(this).find('[type=submit]').prop('disabled', true);
      $.post(this.action, $(this).serialize())
        .done(function () { bpReload(); })
        .fail(function () { $btn.prop('disabled', false); alert('Gagal menyimpan data, silakan coba lagi.'); });
    });
  })(jQuery);
</script>
<?php
include 'footer.php';
?>