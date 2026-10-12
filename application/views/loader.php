<!-- Loading saat halaman dimuat. Warna ikut --loader-bg / --loader-color bila halaman mendefinisikannya -->
<style>
	#page-loader {
		--lc: var(--loader-color, #1e5bd6);
		position: fixed;
		inset: 0;
		z-index: 99999;
		display: flex;
		align-items: center;
		justify-content: center;
		background: var(--loader-bg, rgba(245, 247, 251, .92));
		backdrop-filter: blur(4px);
		transition: opacity .35s ease, visibility .35s ease;
	}
	#page-loader.done { opacity: 0; visibility: hidden; }
	#page-loader.done .pl-card { transform: scale(.96); }

	/* Kartu kecil: ring ganda + titik tengah + teks */
	#page-loader .pl-card {
		display: flex;
		flex-direction: column;
		align-items: center;
		gap: 14px;
		padding: 26px 30px 20px;
		border-radius: 18px;
		background: color-mix(in srgb, var(--loader-bg, #f5f7fb) 80%, #fff);
		border: 1px solid color-mix(in srgb, var(--lc) 12%, transparent);
		box-shadow: 0 10px 30px rgba(15, 23, 42, .08);
		transition: transform .3s ease, box-shadow .3s ease;
		animation: pl-in .4s ease both;
	}
	#page-loader .pl-ring { position: relative; width: 52px; height: 52px; }
	#page-loader .pl-ring i {
		position: absolute;
		inset: 0;
		border-radius: 50%;
		border: 3px solid transparent;
		border-top-color: var(--lc);
		border-right-color: color-mix(in srgb, var(--lc) 35%, transparent);
		animation: pl-spin 1s cubic-bezier(.6, .2, .4, .8) infinite;
		transition: animation-duration .3s;
	}
	#page-loader .pl-ring i:nth-child(2) {
		inset: 9px;
		border-top-color: color-mix(in srgb, var(--lc) 55%, transparent);
		border-right-color: transparent;
		border-left-color: color-mix(in srgb, var(--lc) 25%, transparent);
		animation-direction: reverse;
		animation-duration: 1.4s;
	}
	#page-loader .pl-ring b {
		position: absolute;
		inset: 21px;
		border-radius: 50%;
		background: var(--lc);
		animation: pl-pulse 1.2s ease-in-out infinite;
	}
	#page-loader .pl-text {
		color: var(--loader-text, #64748b);
		font: 600 12px/1 var(--font, "Inter", "Segoe UI", system-ui, sans-serif);
		letter-spacing: .08em;
		text-transform: uppercase;
	}
	#page-loader .pl-text em { font-style: normal; animation: pl-dot 1.2s infinite; }
	#page-loader .pl-text em:nth-child(2) { animation-delay: .2s; }
	#page-loader .pl-text em:nth-child(3) { animation-delay: .4s; }
	#page-loader .pl-bar {
		width: 120px;
		height: 3px;
		border-radius: 99px;
		overflow: hidden;
		background: color-mix(in srgb, var(--lc) 12%, transparent);
	}
	#page-loader .pl-bar::after {
		content: "";
		display: block;
		width: 40%;
		height: 100%;
		border-radius: inherit;
		background: linear-gradient(90deg, transparent, var(--lc), transparent);
		animation: pl-slide 1.3s ease-in-out infinite;
	}

	/* Hover: kartu sedikit terangkat, glow halus, putaran lebih cepat */
	#page-loader .pl-card:hover {
		transform: translateY(-3px);
		box-shadow: 0 16px 40px rgba(15, 23, 42, .12), 0 0 0 6px color-mix(in srgb, var(--lc) 8%, transparent);
	}
	#page-loader .pl-card:hover .pl-ring i { animation-duration: .6s; }
	#page-loader .pl-card:hover .pl-ring i:nth-child(2) { animation-duration: .9s; }

	@keyframes pl-in { from { opacity: 0; transform: translateY(6px) scale(.97); } }
	@keyframes pl-spin { to { transform: rotate(360deg); } }
	@keyframes pl-pulse { 0%, 100% { transform: scale(.7); opacity: .6; } 50% { transform: scale(1); opacity: 1; } }
	@keyframes pl-dot { 0%, 100% { opacity: .2; } 40% { opacity: 1; } }
	@keyframes pl-slide { from { transform: translateX(-100%); } to { transform: translateX(250%); } }

	@media (prefers-reduced-motion: reduce) {
		#page-loader .pl-ring i, #page-loader .pl-ring b, #page-loader .pl-bar::after { animation-duration: 2.5s; }
	}
</style>
<div id="page-loader" role="status" aria-label="Memuat">
	<div class="pl-card">
		<div class="pl-ring"><i></i><i></i><b></b></div>
		<div class="pl-text">Memuat<em>.</em><em>.</em><em>.</em></div>
		<div class="pl-bar"></div>
	</div>
</div>
<script>
	window.addEventListener('load', function () { document.getElementById('page-loader').classList.add('done'); });
	window.addEventListener('pageshow', function (e) { if (e.persisted) document.getElementById('page-loader').classList.add('done'); });
</script>
