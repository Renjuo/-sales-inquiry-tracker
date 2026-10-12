<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="only light">
    <meta name="theme-color" content="#0b1120">
    <title>Display Running Data - Warm Prospect Quote</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.png">
    <?php $this->load->view('partials/clean_url'); ?>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0b1120;
            --panel: #111a2e;
            --line: rgba(148, 163, 184, .12);
            --text: #e2e8f0;
            --muted: #94a3b8;
            --accent: #fb923c;
            --loader-bg: #0b1120;
            --loader-color: #fb923c;
            --loader-text: #94a3b8;
            --accent-2: #f43f5e;
            --money: #34d399;
            --link: #7dd3fc;
        }

        html, body { height: 100%; }

        body {
            background:
                radial-gradient(1200px 500px at 10% -10%, rgba(251, 146, 60, .12), transparent 60%),
                radial-gradient(900px 500px at 110% 10%, rgba(59, 130, 246, .12), transparent 60%),
                var(--bg);
            color: var(--text);
            display: flex;
            flex-direction: column;
            font-family: "Inter", "Segoe UI", system-ui, sans-serif;
            margin: 0;
            overflow: hidden;
        }

        /* ===== Judul ===== */
        .topbar {
            align-items: center;
            border-bottom: 1px solid var(--line);
            display: flex;
            flex: 0 0 auto;
            gap: 16px;
            justify-content: space-between;
            padding: 18px 28px;
        }

        .topbar h1 { font-size: 1.6rem; font-weight: 800; letter-spacing: .01em; margin: 0; }
        .topbar h1 span {
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .topbar p { color: var(--muted); font-size: .95rem; margin: 2px 0 0; }

        .topbar-right { align-items: center; display: flex; flex: 0 0 auto; gap: 12px; }

        .pill {
            align-items: center;
            background: rgba(148, 163, 184, .1);
            border: 1px solid var(--line);
            border-radius: 999px;
            display: inline-flex;
            font-size: .95rem;
            font-weight: 600;
            gap: 8px;
            padding: 7px 14px;
            white-space: nowrap;
        }

        .pill-live { background: rgba(244, 63, 94, .12); border-color: rgba(244, 63, 94, .35); color: #fda4af; }
        .pill-live::before {
            animation: pulse 1.6s ease-in-out infinite;
            background: #f43f5e;
            border-radius: 50%;
            content: "";
            height: 8px;
            width: 8px;
        }
        @keyframes pulse { 50% { opacity: .25; } }

        #clock { font-variant-numeric: tabular-nums; }

        /* ===== Tabel ===== */
        .table-custom { color: var(--text); margin: 0; table-layout: fixed; width: 100%; }

        .table-custom th,
        .table-custom td {
            border: 0;
            border-bottom: 1px solid var(--line);
            font-size: 1.1rem;
            padding: 16px 18px;
            vertical-align: middle;
        }

        .sticky-header-table { flex: 0 0 auto; }
        .sticky-header-table th {
            background: rgba(15, 23, 42, .6);
            color: var(--muted);
            font-size: .85rem;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .scroll-container { flex: 1 1 auto; min-height: 0; overflow: hidden; position: relative; scrollbar-width: none; }
        .scroll-container::-webkit-scrollbar { display: none; }

        .table-custom tbody tr:nth-child(even) td { background: rgba(148, 163, 184, .04); }
        .table-custom tbody tr:hover td { background: rgba(251, 146, 60, .08); }

        .c-no { color: var(--muted); font-weight: 600; }
        .c-surat { color: var(--link); font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, monospace; font-size: 1rem !important; font-weight: 600; }
        .c-pt { font-weight: 600; }
        .c-sales { color: #cbd5e1; }
        .c-nilai { color: var(--money); font-variant-numeric: tabular-nums; font-weight: 700; }
        .c-tgl { color: var(--muted); font-variant-numeric: tabular-nums; }

        .badge-prospek {
            border-radius: 999px;
            display: inline-block;
            font-size: .85rem;
            font-weight: 700;
            letter-spacing: .04em;
            padding: 7px 14px;
        }
        .badge-warm { background: linear-gradient(135deg, #fdba74, #f97316); box-shadow: 0 4px 14px rgba(249, 115, 22, .35); color: #1c1917; }
        .badge-other { background: rgba(148, 163, 184, .15); color: var(--muted); }

        .empty { color: var(--muted); padding: 80px 16px !important; text-align: center; }

        /* ===== Tablet ===== */
        @media (max-width: 991.98px) {
            .topbar { padding: 14px 18px; }
            .topbar h1 { font-size: 1.3rem; }
            .table-custom th, .table-custom td { font-size: .95rem; padding: 12px 12px; }
            .c-surat { font-size: .85rem !important; }
        }

        /* ===== HP: baris jadi kartu ===== */
        @media (max-width: 767.98px) {
            .topbar { align-items: flex-start; flex-direction: column; gap: 10px; padding: 14px 16px 12px; }
            .topbar h1 { font-size: 1.15rem; }
            .topbar p { font-size: .8rem; }
            .topbar-right { gap: 8px; }
            .pill { font-size: .75rem; padding: 5px 10px; }

            .table-custom.sticky-header-table { display: none; }

            .scroll-container { padding: 12px 12px 0; }
            .table-custom { display: block; }
            /* flow-root: margin kartu terakhir ikut dihitung, jadi putaran auto-scroll tidak melompat */
            .table-custom tbody { display: flow-root; }

            .table-custom tbody tr {
                background: var(--panel);
                border: 1px solid var(--line);
                border-radius: 14px;
                display: grid;
                gap: 4px 10px;
                grid-template-areas:
                    "no surat  prospek"
                    "no pt     pt"
                    "no sales  nilai"
                    "no tgl    nilai";
                grid-template-columns: 26px minmax(0, 1fr) auto;
                margin-bottom: 10px;
                padding: 14px 14px 14px 10px;
            }

            .table-custom tbody tr td {
                background: none !important;
                border: 0;
                font-size: .9rem;
                padding: 0;
                text-align: left !important;
                width: auto !important;
            }

            .c-no { font-size: .8rem !important; grid-area: no; padding-top: 2px !important; }
            .c-surat { font-size: .8rem !important; grid-area: surat; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
            .c-prospek { grid-area: prospek; justify-self: end; }
            .c-pt { font-size: 1rem !important; grid-area: pt; margin: 2px 0 4px; }
            .c-sales { font-size: .8rem !important; grid-area: sales; }
            .c-tgl { font-size: .75rem !important; grid-area: tgl; }
            .c-nilai { align-self: end; font-size: 1rem !important; grid-area: nilai; text-align: right !important; }
            .badge-prospek { font-size: .7rem; padding: 4px 10px; }

            .table-custom tbody tr.empty-row { display: block; }
        }
    </style>
</head>
<body>
<?php $this->load->view('loader'); ?>

    <!-- JUDUL HALAMAN -->
    <header class="topbar">
        <div>
            <h1>🔥 <span>Prospek Sudah Quote</span></h1>
            <p>Warm prospect &amp; inquiry belum quote &middot; diperbarui otomatis</p>
        </div>
        <div class="topbar-right">
            <span class="pill pill-live">LIVE</span>
            <span class="pill"><?php echo count($data_quote); ?> data</span>
            <span class="pill" id="clock"><?php echo date('H:i'); ?></span>
        </div>
    </header>

    <!-- HEADER TABEL STICKY -->
    <table class="table table-custom sticky-header-table">
        <thead>
            <tr>
                <th width="5%" class="text-center">No</th>
                <th width="18%">No Surat / Inquiry</th>
                <th width="22%">Perusahaan</th>
                <th width="15%">Sales</th>
                <th width="18%">Nilai Quotation</th>
                <th width="10%" class="text-center">Prospek</th>
                <th width="12%" class="text-center">Tgl Update</th>
            </tr>
        </thead>
    </table>

    <!-- BODY TABEL BERJALAN -->
    <div class="scroll-container" id="scrollContainer">
        <div class="scroll-content" id="scrollContent">
            <table class="table table-custom">
                <tbody id="tableBody">
                    <?php if (!empty($data_quote)): ?>
                        <?php $no = 1; foreach ($data_quote as $row): ?>
                            <tr>
                                <td width="5%" class="text-center c-no"><?php echo $no++; ?></td>
                                <td width="18%" class="c-surat"><?php echo $row->nomor_surat; ?></td>
                                <td width="22%" class="c-pt"><?php echo !empty($row->nama_perusahaan_klien) ? $row->nama_perusahaan_klien : '-'; ?></td>
                                <td width="15%" class="c-sales"><?php echo $row->pic; ?></td>
                                <td width="18%" class="c-nilai">
                                    <?php
                                        echo (!empty($row->nilai_quotation) && $row->nilai_quotation > 0)
                                            ? "Rp " . number_format($row->nilai_quotation, 0, ',', '.')
                                            : "-";
                                    ?>
                                </td>
                                <td width="10%" class="text-center c-prospek">
                                    <?php if (strtolower(trim($row->status)) == 'sudah quote'): ?>
                                        <span class="badge-prospek badge-warm">WARM</span>
                                    <?php else: ?>
                                        <span class="badge-prospek badge-other">
                                            <?php
                                                // Menggunakan field 'prospect_category' sesuai controller
                                                $prospek_val = isset($row->prospect_category) ? $row->prospect_category : (isset($row->prospek) ? $row->prospek : '');
                                                echo !empty($prospek_val) ? strtoupper($prospek_val) : 'BELUM QUOTE';
                                            ?>
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td width="12%" class="text-center c-tgl">
                                    <?php
                                        $tgl = !empty($row->tanggal_update) ? $row->tanggal_update : $row->tanggal_input;
                                        echo date('d M Y', strtotime($tgl));
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr class="empty-row">
                            <td colspan="7" class="empty">
                                <h4>Belum ada data Prospek 'Warm'</h4>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("scrollContainer");
        const tbody = document.getElementById("tableBody");

        // Jam di pojok kanan atas
        const clock = document.getElementById("clock");
        setInterval(function () {
            clock.textContent = new Date().toLocaleTimeString("id-ID", { hour: "2-digit", minute: "2-digit" });
        }, 1000);

        if (tbody && tbody.children.length > 0 && !tbody.innerText.includes("Belum ada data")) {

            // 1. Duplikasi data baris agar scroll bisa berputar tanpa putus
            const originalHTML = tbody.innerHTML;
            tbody.innerHTML += originalHTML;

            container.style.overflowY = "scroll";

            // Kecepatan scroll (0.3 - 0.5 cukup halus)
            const speed = 0.3;
            let currentScroll = 0;
            let isPaused = false;
            let resumeTimer;

            // Pause saat mouse hover (layar besar)
            container.addEventListener("mouseenter", function () { isPaused = true; });
            container.addEventListener("mouseleave", function () { isPaused = false; });

            // Lanjut 4 detik setelah interaksi terakhir (termasuk momentum scroll)
            function scheduleResume() {
                clearTimeout(resumeTimer);
                resumeTimer = setTimeout(function () {
                    const half = tbody.offsetHeight / 2;
                    currentScroll = container.scrollTop % half;
                    isPaused = false;
                }, 4000);
            }

            // Pause saat disentuh (HP)
            container.addEventListener("touchstart", function () {
                isPaused = true;
                clearTimeout(resumeTimer);
                // Pindah ke salinan kedua (tampilan identik) agar bisa di-scroll ke atas
                const half = tbody.offsetHeight / 2;
                const st = container.scrollTop;
                if (st < half && st + half <= container.scrollHeight - container.clientHeight) container.scrollTop = st + half;
            }, { passive: true });
            container.addEventListener("touchend", scheduleResume, { passive: true });
            container.addEventListener("touchcancel", scheduleResume, { passive: true });
            container.addEventListener("scroll", function () {
                if (isPaused) scheduleResume();
            }, { passive: true });

            function smoothScroll() {
                if (!isPaused) {
                    currentScroll += speed;

                    // Cek jika sudah melewati setengah tinggi tabel (set data pertama selesai)
                    const halfHeight = tbody.offsetHeight / 2;
                    if (currentScroll >= halfHeight) {
                        currentScroll = 0; // Reset ke posisi awal tanpa terputus
                    }

                    container.scrollTop = currentScroll;
                }
                requestAnimationFrame(smoothScroll);
            }

            // Jalankan animasi
            requestAnimationFrame(smoothScroll);
        }
    });

    // Auto Reload setiap 60 detik
    setTimeout(function () {
        bpReload();
    }, 60000);
    </script>
</body>
</html>
