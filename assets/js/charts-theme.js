/* Tema modern + responsive untuk semua Google Charts.
   Muat tepat setelah https://www.gstatic.com/charts/loader.js.
   Opsi yang sudah diset di halaman tidak ditimpa; tema hanya mengisi yang kosong. */
(function () {
    var theme = {
        fontName: 'Inter',
        fontSize: 12,
        backgroundColor: { fill: 'transparent' },
        colors: ['#1e5bd6', '#f97316', '#10b981', '#8b5cf6', '#f43f5e', '#0ea5e9', '#eab308', '#64748b'],
        titleTextStyle: { color: '#0f172a', fontSize: 15, bold: true },
        legend: { position: 'top', alignment: 'start', maxLines: 3, textStyle: { color: '#475569', fontSize: 12 } },
        hAxis: { textStyle: { color: '#64748b' }, gridlines: { color: '#eef2f7' }, baselineColor: '#e2e8f0' },
        vAxis: { textStyle: { color: '#64748b' }, gridlines: { color: '#eef2f7' }, baselineColor: '#e2e8f0', minorGridlines: { count: 0 } },
        chartArea: { backgroundColor: 'transparent' },
        bar: { groupWidth: '68%' },
        tooltip: { textStyle: { fontName: 'Inter', fontSize: 12 } },
        animation: { startup: true, duration: 500, easing: 'out' }
    };

    function isObj(v) { return v && typeof v === 'object' && !Array.isArray(v); }

    function fill(opt, def) {
        for (var k in def) {
            if (opt[k] === undefined) opt[k] = isObj(def[k]) ? fill({}, def[k]) : def[k];
            else if (isObj(opt[k]) && isObj(def[k])) fill(opt[k], def[k]);
        }
        return opt;
    }

    var drawn = [];

    function patch(Chart) {
        if (!Chart || Chart.prototype.__themed) return;
        var draw = Chart.prototype.draw;
        Chart.prototype.draw = function (data, opt) {
            opt = fill(opt || {}, theme);
            if (!this.__args) drawn.push(this);
            this.__args = [data, opt];
            return draw.call(this, data, opt);
        };
        Chart.prototype.__themed = true;
    }

    // Grafik digambar ke div dalam, supaya kontainer (kartu) bisa diberi padding tanpa grafik terpotong
    function inner(el) {
        if (!el || el.firstElementChild && el.firstElementChild.className === 'chart-inner') return el && el.firstElementChild || el;
        var d = document.createElement('div');
        d.className = 'chart-inner';
        el.classList.add('chart-card');
        el.appendChild(d);
        return d;
    }

    function wrap(ns, name) {
        var Orig = ns[name];
        if (!Orig || Orig.__wrapped) return;
        patch(Orig);
        var W = function (el) { return new Orig(inner(el)); };
        W.prototype = Orig.prototype;
        for (var k in Orig) W[k] = Orig[k];
        W.__wrapped = true;
        ns[name] = W;
    }

    function patchAll() {
        wrap(google.charts, 'Bar');
        ['BarChart', 'ColumnChart', 'PieChart', 'LineChart', 'AreaChart', 'ComboChart'].forEach(function (n) {
            wrap(google.visualization, n);
        });
    }

    // Daftarkan patch lewat google.charts.load agar jalan sebelum callback gambar dari halaman
    var load = google.charts.load;
    google.charts.load = function () {
        var r = load.apply(this, arguments);
        google.charts.setOnLoadCallback(patchAll);
        return r;
    };

    // Gambar ulang saat ukuran layar berubah (rotasi HP, resize jendela)
    var t, lastW = window.innerWidth;
    window.addEventListener('resize', function () {
        if (window.innerWidth === lastW) return;
        lastW = window.innerWidth;
        clearTimeout(t);
        t = setTimeout(function () {
            drawn.forEach(function (c) { c.draw.apply(c, c.__args); });
        }, 250);
    });
})();
