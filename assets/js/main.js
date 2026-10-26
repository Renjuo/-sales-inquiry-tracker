$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	// Desktop: sidebar mengecil jadi ikon. Tablet/HP: sidebar jadi drawer.
	var isMobile = function() { return window.innerWidth < 992; };

	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass(isMobile() ? 'sidebar-open' : 'open');
	});

	// Tutup sidebar: HP = tutup drawer, desktop = kembali ke mode ikon
	var closeSidebar = function() {
		$('body').removeClass('sidebar-open');
		if (!isMobile()) $('body').addClass('open');
		$('#left-panel .menu-item-has-children.show').removeClass('show').children('.sub-menu').removeClass('show');
	};

	// Desktop mode ikon: klik menu dropdown (mis. Analytic) = buka sidebar dulu, lalu dropdown-nya tampil
	$('#left-panel').on('click', '.dropdown-toggle', function() {
		if (!isMobile()) $('body').removeClass('open');
	});

	$('#sidebarBackdrop, #sidebarClose').on('click', closeSidebar);

	$('#left-panel').on('click', '.navbar-nav a:not(.dropdown-toggle)', closeSidebar);

	$(window).on('resize', function() {
		if (!isMobile()) closeSidebar();
	});

	// Bungkus tabel supaya hanya tabelnya yang bergeser, bukan halamannya.
	// setTimeout: tunggu semua inisialisasi DataTables di document.ready selesai dulu.
	function wrapTables() {
		$('#right-panel table.table').not('table table, .card-header table').each(function() {
			var $p = $(this).parent();
			if (!$p.hasClass('table-scroll') && !$p.hasClass('dataTables_scrollBody')) {
				$(this).wrap('<div class="table-scroll"></div>');
			}
		});
	}
	setTimeout(wrapTables, 0);
	$(window).on('load', wrapTables);

	// HP/tablet: daftar pilihan dropdown filter dibuat sendiri agar desainnya sama dengan desktop
	// (dropdown bawaan HP tidak bisa didesain). Desktop tetap memakai dropdown browser.
	var PICK_SEL = '.filter-grid select.form-control, .dataTables_length select, #detail_kategori select.form-control';
	var $picker = null, pickSelect = null;

	function closePicker() {
		if (!$picker) return;
		$(pickSelect).removeClass('m-open');
		$picker.remove();
		$picker = pickSelect = null;
	}

	function openPicker(select) {
		closePicker();
		pickSelect = select;
		$(select).addClass('m-open');
		$picker = $('<div class="m-picker" role="listbox"></div>');
		$.each(select.options, function(i, opt) {
			$('<div class="m-picker-opt" role="option"></div>')
				.text(opt.text)
				.toggleClass('is-selected', i === select.selectedIndex)
				.on('click', function() {
					select.selectedIndex = i;
					select.dispatchEvent(new Event('change', { bubbles: true }));
					closePicker();
				})
				.appendTo($picker);
		});
		$picker.appendTo('body');

		// Taruh di bawah dropdown (atau di atas bila ruang bawah sempit), selebar dropdown
		var r = select.getBoundingClientRect(), h = $picker.outerHeight();
		var top = (window.innerHeight - r.bottom < h + 12 && r.top > h + 12) ? r.top - h - 6 : r.bottom + 6;
		// Lebar layar tanpa scrollbar; daftar dibatasi selebar layar dikurangi jarak tepi 12px
		var lebarLayar = document.documentElement.clientWidth;
		$picker.css({ top: top + window.scrollY, minWidth: Math.min(r.width, lebarLayar - 24), maxWidth: lebarLayar - 24 });
		// Pilihan berteks panjang membuat daftar lebih lebar dari dropdown: geser ke kiri agar tidak keluar layar
		var left = Math.max(12, Math.min(r.left, lebarLayar - $picker.outerWidth() - 12));
		$picker.css({ left: left + window.scrollX });
		var sel = $picker.find('.is-selected')[0];
		if (sel) $picker.scrollTop(sel.offsetTop - 6);
	}

	// Cegah dropdown bawaan HP terbuka, ganti dengan daftar pilihan versi desain
	['touchstart', 'mousedown'].forEach(function(type) {
		document.addEventListener(type, function(e) {
			var select = e.target.closest && e.target.closest(PICK_SEL);
			if (select && isMobile()) {
				e.preventDefault();
				if (pickSelect === select) closePicker(); else openPicker(select);
			} else if ($picker && !$(e.target).closest('.m-picker').length) {
				closePicker();
			}
		}, { capture: true, passive: false });
	});
	// Tutup hanya bila lebar layar berubah (rotasi), bukan saat address bar HP muncul/hilang
	var pickW = window.innerWidth;
	$(window).on('resize', function() {
		if (window.innerWidth !== pickW) { pickW = window.innerWidth; closePicker(); }
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });



	// Date range picker (.drp berisi 2 input hidden Y-m-d: dari & sampai).
	// Nilai tetap di input asli + memicu 'change', jadi filter yang sudah ada tetap jalan.
	// Klik judul: tampilan hari -> bulan -> tahun. Pilih bulan/tahun = filter sebulan/setahun penuh.
	var DRP_HARI = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
	var DRP_BULAN = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
	function drpYmd(d) { return d.getFullYear() + '-' + ('0' + (d.getMonth() + 1)).slice(-2) + '-' + ('0' + d.getDate()).slice(-2); }
	function drpDmy(v) { return v ? v.split('-').reverse().join('/') : ''; }

	// Tanggal merah (libur nasional + cuti bersama) dari admin/hari_libur, diambil sekali untuk semua .drp
	var drpLibur = {}, $drpAll = $('.drp');
	if ($drpAll.length) {
		var drpBase = ($('script[src*="assets/js/main.js"]').attr('src') || '').split('assets/js/main.js')[0];
		$.getJSON(drpBase + 'hari_libur').done(function(data) {
			drpLibur = data || {};
			$drpAll.trigger('drp:render');
		});
	}

	$('.drp').each(function() {
		var $drp = $(this), $in = $drp.find('input[type=hidden]'), $from = $in.eq(0), $to = $in.eq(1);
		var view = new Date(), mode = 'day';
		view.setDate(1);
		$drp.append(
			'<button type="button" class="drp-field" data-i="0"></button><span class="drp-sep">&ndash;</span>' +
			'<button type="button" class="drp-field" data-i="1"></button>' +
			'<button type="button" class="drp-btn" aria-label="Pilih tanggal"><i class="fa fa-calendar"></i></button>' +
			'<div class="drp-pop"><div class="drp-head"><button type="button" class="drp-nav" data-d="-1">&lsaquo;</button>' +
			'<button type="button" class="drp-title"></button><button type="button" class="drp-nav" data-d="1">&rsaquo;</button></div>' +
			'<div class="drp-grid"></div><div class="drp-foot"><button type="button" class="drp-clear">Hapus</button>' +
			'<button type="button" class="drp-today">Hari ini</button></div></div>');

		function render() {
			var a = $from.val(), b = $to.val(), today = drpYmd(new Date()), y = view.getFullYear(), html = '';
			$drp.find('.drp-field').eq(0).text(drpDmy(a) || 'Dari').toggleClass('is-empty', !a);
			$drp.find('.drp-field').eq(1).text(drpDmy(b) || 'Sampai').toggleClass('is-empty', !b);
			$drp.find('.drp-grid').attr('data-mode', mode);

			if (mode === 'day') {
				$drp.find('.drp-title').text(DRP_BULAN[view.getMonth()] + ' ' + y);
				html = DRP_HARI.map(function(h) { return '<span class="drp-dow">' + h + '</span>'; }).join('');
				var d = new Date(view); d.setDate(1 - d.getDay());
				for (var n = 0; n < 42; n++, d.setDate(d.getDate() + 1)) {
					var v = drpYmd(d), cls = 'drp-day';
					if (d.getMonth() !== view.getMonth()) cls += ' is-out';
					if (v === today) cls += ' is-today';
					if (a && b && v > a && v < b) cls += ' in-range';
					if (v === a || v === b) cls += ' is-edge';
					var libur = drpLibur[v] || (d.getDay() === 0 ? 'Minggu' : d.getDay() === 6 ? 'Sabtu' : '');
					if (libur) cls += ' is-holiday';
					html += '<button type="button" class="' + cls + '" data-v="' + v + '"' + (libur ? ' data-info="' + libur.replace(/"/g, '&quot;') + '"' : '') + '>' + d.getDate() + '</button>';
				}
			} else if (mode === 'month') {
				$drp.find('.drp-title').text(y);
				DRP_BULAN.forEach(function(nama, m) {
					var p = y + '-' + ('0' + (m + 1)).slice(-2), cls = 'drp-cell';
					if (a && b && a.slice(0, 7) <= p && b.slice(0, 7) >= p) cls += a.slice(0, 7) === b.slice(0, 7) ? ' is-edge' : ' in-range';
					if (today.slice(0, 7) === p) cls += ' is-today';
					html += '<button type="button" class="' + cls + '" data-m="' + m + '">' + nama.slice(0, 3) + '</button>';
				});
			} else {
				var y0 = y - y % 12;
				$drp.find('.drp-title').text(y0 + ' – ' + (y0 + 11));
				for (var t = y0; t < y0 + 12; t++) {
					var c = 'drp-cell';
					if (a && b && +a.slice(0, 4) <= t && +b.slice(0, 4) >= t) c += a.slice(0, 4) === b.slice(0, 4) ? ' is-edge' : ' in-range';
					if (+today.slice(0, 4) === t) c += ' is-today';
					html += '<button type="button" class="' + c + '" data-y="' + t + '">' + t + '</button>';
				}
			}
			$drp.find('.drp-grid').html(html);
		}
		// Event native, bukan .trigger(): halaman tabel memuat 2 jQuery (plugins.js & datatables.min.js), .trigger() tidak sampai ke handler jQuery lain
		function set(a, b) { $from.val(a); $to.val(b); render(); $from[0].dispatchEvent(new Event('change', { bubbles: true })); }
		function done() { $drp.removeClass('is-open'); }
		function open() {
			var v = $from.val() || $to.val();
			view = v ? new Date(v + 'T00:00') : new Date(); view.setDate(1); mode = 'day';
			render(); $drp.addClass('is-open');
		}

		$drp.on('drp:render', render);
		$drp.on('click', '.drp-field, .drp-btn', function() { $drp.hasClass('is-open') ? done() : open(); });
		$drp.on('click', '.drp-title', function() { mode = mode === 'day' ? 'month' : 'year'; render(); });
		$drp.on('click', '.drp-nav', function() {
			var d = +$(this).data('d');
			if (mode === 'day') view.setMonth(view.getMonth() + d);
			else view.setFullYear(view.getFullYear() + d * (mode === 'year' ? 12 : 1));
			render();
		});
		$drp.on('click', '.drp-day', function() {
			var v = $(this).data('v'), a = $from.val();
			if (!a || $to.val()) return set(v, '');          // klik pertama: tanggal awal
			set(v < a ? v : a, v < a ? a : v);               // klik kedua: tanggal akhir
			done();
		});
		// Pilih bulan = 1 bulan penuh, pilih tahun = 1 tahun penuh
		$drp.on('click', '.drp-cell[data-m]', function() {
			var m = +$(this).data('m'), y = view.getFullYear();
			view = new Date(y, m, 1);
			set(drpYmd(view), drpYmd(new Date(y, m + 1, 0))); done();
		});
		$drp.on('click', '.drp-cell[data-y]', function() {
			var y = +$(this).data('y');
			view = new Date(y, 0, 1);
			set(y + '-01-01', y + '-12-31'); done();
		});
		$drp.on('click', '.drp-clear', function() { set('', ''); });
		$drp.on('click', '.drp-today', function() { var t = drpYmd(new Date()); set(t, t); done(); });
		// Elemen yang baru di-render ulang sudah lepas dari halaman: jangan dianggap klik di luar
		$(document).on('click', function(e) { if (document.contains(e.target) && !$drp[0].contains(e.target)) done(); });
		render();
	});

});