<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Admin extends CI_Controller {

	// Pilihan warna bubble chat (halaman Profil): semua cukup gelap untuk teks & ceklis putih
	const WARNA_CHAT = array(
		'#1e5bd6' => 'Biru', '#0f766e' => 'Toska', '#15803d' => 'Hijau', '#6d28d9' => 'Ungu',
		'#be185d' => 'Magenta', '#c2410c' => 'Oranye', '#b91c1c' => 'Merah', '#334155' => 'Grafit',
	);
	
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('M_admin');
	}
    
    public function display_dashboard() {
        // Ambil data yang memenuhi salah satu syarat ini:
        // 1. Status 'Sudah Quote' DAN Prospek 'Warm'
        // 2. ATAU Status 'Belum Quote' (tanpa memandang nilai prospeknya)
        $this->db->group_start();
            $this->db->group_start();
                $this->db->where('status', 'Sudah Quote');
                $this->db->where('prospect_category', 'Warm');
            $this->db->group_end();
            $this->db->or_where('status', 'Belum Quote');
        $this->db->group_end();
    
        // Urutkan: Data 'Sudah Quote' tampil di atas, lalu 'Belum Quote' di bawahnya
        $this->db->order_by("FIELD(status, 'Sudah Quote', 'Belum Quote')", "ASC", FALSE);
        
        // Urutkan berdasarkan tanggal terbaru
        $this->db->order_by('tanggal_update', 'DESC');
    
        $data['data_quote'] = $this->db->get('tsurat')->result();
    
        // Load view display
        $this->load->view('admin/display_dashboard', $data);
    }
    
	public function index(){
    		$data['table_2'] = $this->M_admin->tampil_data_2()->result(); 
    		$this->load->view('admin/index', $data);
	}
	
	public function index_2($kode_web){
    		$data['table_2'] = $this->M_admin->tampil_data($kode_web)->result();
    		$this->load->view('admin/index_2', $data);
	}

	public function index_3(){
		$data['table_2'] = $this->M_admin->tampil_old_data()->result(); 
		$this->load->view('admin/index_3', $data);
	}
	// Data tahun sebelumnya, contoh admin/arsip/TST/25 = Data Testindo 2025.
	// Otomatis: begitu masuk tahun baru, tahun lalu langsung muncul di dropdown navbar.
	public function arsip($kode_web, $tahun){
		if (!preg_match('/^\d{2}$/', $tahun) || $tahun >= date('y')) redirect($kode_web == 'VB' ? 'data-vibrasindo' : 'data-testindo');
		$data['table_2'] = $this->M_admin->tampil_history_data($kode_web, $tahun)->result();
		$this->load->view('admin/index_2', $data);
	}
    
    public function transfer($id){
        $where = array('nomor_urut' => $id);
		$data = array (
				'title' => "Edit Data Admin - Testindo"
		);
		$data['table_transfer'] = $this->M_admin->tampil_data_website()->result();
		$this->load->view('admin/edit_inquiry',$data);
    }
    
    public function transfer_data($id){
        $where = array('nomor_urut' => $id);
        
        $row = $this->db->order_by('nomor_urut', 'desc')->limit(1)->get('tsurat')->row_array();
        $row_conn = $this->db->get_where('tsurat_website', $where)->row_array();
        
      	
        $kode_jenis = "INQ";
		$kode_website = "TST"; 
		$bulan = date('my');
		$tbulan = $row_conn['bulan'];
		$nomor_urut = $row['nomor_urut']+1;
		$nomor_surat = $kode_jenis."-".$kode_website."-".$bulan."-".$nomor_urut;
		$kebutuhan_klien = $row_conn['kebutuhan_klien'];
		$kategori = $row_conn['kategori'];
		$user = "admin";
		$nama_perusahaan_klien = $row_conn['nama_perusahaan_klien'];
		$alamat_kantor_klien = "";
		$nama_klien = $row_conn['nama_klien'];
		$nama_klien_2 = "";
		$nama_klien_3 = "";
		$telepon_office_klien = $row_conn['telepon_office_klien'];
		$telepon_klien = $row_conn['telepon_klien'];
		$telepon_klien_2 = "";
		$telepon_klien_3 = "";
		$email_klien = $row_conn['email_klien'];
		$email_klien_2 = "";
		$email_klien_3 = "";
		$tanggal_input = date('Y-m-d');
		$tanggal_update = date('Y-m-d');
		$progress_hist_foll_up = "";
		$sumber_inq = "0";
		$sumber_inq_web = "0";
		$pic = "";
		$team = "";
		$status = "";
		$no_po = "";
		$nilai_po = "";
		$no_quotation = "";
		$tanggal_quotation = "0";
		// connect to the server
		
 
		$data = array(
			'kode_jenis' => $kode_jenis,
			'kode_website' => $kode_website,
			'bulan' => $bulan,
			'nomor_urut' => $nomor_urut,
			'nomor_surat' => $nomor_surat,
			'kebutuhan_klien' => $kebutuhan_klien,
			'produk_prioritas' => $this->input->post('produk_prioritas') === 'Iya' ? 'Iya' : 'Tidak',
			'kategori' => $kategori,
			'user' => $user,
			'nama_perusahaan_klien' => $nama_perusahaan_klien,
			'alamat_kantor_klien' => $alamat_kantor_klien,
			'nama_klien' => $nama_klien,
			'nama_klien_2' => $nama_klien_2,
			'nama_klien_3' => $nama_klien_3,
			'telepon_office_klien' => $telepon_office_klien,
			'telepon_klien' => $telepon_klien,
			'telepon_klien_2' => $telepon_klien_2,
			'telepon_klien_3' => $telepon_klien_3,
			'email_klien' => $email_klien,
			'email_klien_2' => $email_klien_2,
			'email_klien_3' => $email_klien_3,
			'tanggal_input' => $tanggal_input,
			'tanggal_update' => $tanggal_update,
			'progress_hist_foll_up' => $progress_hist_foll_up,
			'sumber_inq' => $sumber_inq,
			'sumber_inq_web' => $sumber_inq_web,
			'pic' => $pic,
			'team' => $team,
			'status' => $status,
			'no_po' => $no_po,
			'nilai_po' => $nilai_po,
			'no_quotation' => $no_quotation,
			'tanggal_quotation' => $tanggal_quotation
			);
	 
		$this->M_admin->masukan_data($data,'tsurat');
		redirect('data-testindo');   
    }
    
	public function tambah(){
		$data['tsurat'] = $this->M_admin->tampil_data_tsurat_2()->result();
		$data['tjenis'] = $this->M_admin->tampil_data_tjenis()->result();
		$data['twebsite'] = $this->M_admin->tampil_data_twebsite()->result();
		$data['tbidang_usaha'] = $this->db->get('tbidang_usaha')->result();
		// Pilihan Detail Kategori per kategori (kosong bila tabel tdetail_kategori belum dibuat)
		$data['detail_kategori'] = array();
		if ($this->db->table_exists('tdetail_kategori')) {
			foreach ($this->db->order_by('id_detail')->get('tdetail_kategori')->result() as $d) $data['detail_kategori'][$d->kategori][] = $d->nama_detail;
		}
		// Dibuka dari menu Request Customer: isian customer dipakai sebagai nilai awal form
		$id_request = (int) $this->input->get('request');
		$data['request'] = ($id_request && $this->_boleh_request()) ? $this->db->get_where('trequest_customer', array('id_request' => $id_request))->row_array() : NULL;

		$json_path = FCPATH . 'vendors/wilayah_indonesia.json';
    
		if (file_exists($json_path)) {
			$data['wilayah_json'] = file_get_contents($json_path);
		} else {
			// Trik Tambahan: Jika path di atas salah, sistem tidak akan eror bleng melainkan mengirim log ke debug browser
			$data['wilayah_json'] = '[]';
		}
		
		$this->load->view('admin/tambah',$data);
	}

	// Dropdown "Nama Perusahaan" di form tambah: maks. 5 perusahaan terdaftar.
	// Tiap field diisi dari data terakhir yang pernah diisi untuk perusahaan itu.
	public function cari_perusahaan(){
		// Data klien: wajib login (endpoint JSON tidak memuat header.php yang biasanya mengecek login)
		if (!isset($_SESSION['username'])) { $this->output->set_status_header(401); return; }

		// 1. Maks. 5 nama perusahaan (yang terakhir diinput dulu)
		$q = trim((string) $this->input->get('q'));
		$this->db->select('MIN(TRIM(nama_perusahaan_klien)) AS nama, MAX(tanggal_input) AS terakhir', FALSE)
			->where("TRIM(nama_perusahaan_klien) <> ''");
		if ($q !== '') $this->db->like('nama_perusahaan_klien', $q);
		$nama = array_column($this->db->group_by('LOWER(TRIM(nama_perusahaan_klien))', FALSE)
			->order_by('terakhir', 'DESC')->limit(5)->get('tsurat')->result_array(), 'nama');
		if (!$nama) { header('Content-Type: application/json'); echo '[]'; return; }

		// 2. Semua data perusahaan tsb, terbaru dulu
		$in = implode(',', array_map(array($this->db, 'escape'), $nama));
		$rows = $this->db->where("TRIM(nama_perusahaan_klien) IN ($in)", NULL, FALSE)->order_by('tanggal_input', 'DESC')->get('tsurat')->result_array();

		$grup = array(
			array('bidang_usaha'),
			array('alamat_kantor_klien'),
			array('telepon_office_klien'),
			array('provinsi', 'kab_kota'),                         // berpasangan
			array('nama_klien', 'nama_klien_2', 'nama_klien_3',     // kontak klien dari input yang sama
				'telepon_klien', 'telepon_klien_2', 'telepon_klien_3',
				'email_klien', 'email_klien_2', 'email_klien_3'),
		);
		$hasil = array();
		foreach ($nama as $n) $hasil[strtolower($n)] = array('nama_perusahaan_klien' => $n);
		foreach ($rows as $r) {
			$h = &$hasil[strtolower(trim($r['nama_perusahaan_klien']))];
			foreach ($grup as $kolom) {
				if (isset($h[$kolom[0]])) continue;                 // grup ini sudah terisi dari data yang lebih baru
				$isi = array();
				foreach ($kolom as $k) $isi[$k] = trim((string) $r[$k]);
				if (implode('', $isi) !== '' && $isi[$kolom[0]] !== '0') $h += $isi;
			}
			unset($h);
		}
		header('Content-Type: application/json');
		echo json_encode(array_values($hasil));
	}

 	public function tambah_data(){
		$kode_jenis = $this->input->post('kode_jenis');
		$kode_website = $this->input->post('kode_website');
		$bulan = $this->input->post('bulan');
		$nomor_urut = $this->input->post('nomor_urut');
		$nomor_surat = $this->input->post('kode_jenis')."-".$this->input->post('kode_website')."-".$this->input->post('bulan')."-".$this->input->post('nomor_urut');
		$kebutuhan_klien = $this->input->post('kebutuhan_klien');
		$kategori = $this->input->post('kategori');
		$user = "admin";
		$nama_perusahaan_klien = $this->input->post('nama_perusahaan_klien');
		$alamat_kantor_klien = $this->input->post('alamat_kantor_klien');
		$nama_klien = $this->input->post('nama_klien');
		$nama_klien_2 = $this->input->post('nama_klien_2');
		$nama_klien_3 = $this->input->post('nama_klien_3');
		$telepon_office_klien = $this->input->post('telepon_office_klien');
		$telepon_klien = $this->input->post('telepon_klien');
		$telepon_klien_2 = $this->input->post('telepon_klien_2');
		$telepon_klien_3 = $this->input->post('telepon_klien_3');
		$email_klien = $this->input->post('email_klien');
		$email_klien_2 = $this->input->post('email_klien_2');
		$email_klien_3 = $this->input->post('email_klien_3');
		$tanggal_input = $this->input->post('tanggal_input');
		$tanggal_update = $this->input->post('tanggal_update');
		$progress_hist_foll_up = $this->input->post('progress_hist_foll_up');
		$sumber_inq = $this->input->post('sumber_inq');
		$sumber_inq_web = $this->input->post('sumber_inq_web');
		$pic = $this->input->post('pic');
		$team = $this->input->post('team');
		$status = $this->input->post('status');
		$batas_followup = $this->input->post('batas_followup');
		$nilai_quotation_raw = $this->input->post('nilai_quotation');
        $nilai_quotation = preg_replace('/[^0-9]/', '', $nilai_quotation_raw);
		$file_quotation = $this->input->post('file_quotation');
		$no_po = $this->input->post('no_po');
		$nilai_po_raw = $this->input->post('nilai_po');
        $nilai_po = preg_replace('/[^0-9]/', '', $nilai_po_raw);
		$file_po = $this->input->post('file_po');
		$no_quotation = $this->input->post('no_quotation');
		$tanggal_quotation = $this->input->post('tanggal_quotation');
		$bidang_usaha  = $this->input->post('bidang_usaha');
        $business_line = $this->input->post('business_line');
        $provinsi      = $this->input->post('provinsi_perusahaan'); // Menyesuaikan name di view HTML
        $kab_kota      = $this->input->post('kota_perusahaan');     // Menyesuaikan name di view HTML

		if ($status == "Sudah PO" or $status== "Sudah Quote"){
			$explode = explode("-", $tanggal_input);
			$no_quotation = $nomor_urut."/".$kode_website."/".$kode_jenis."/".$explode[1]."/".$explode[0];
		} else {
			$no_quotation = "";
		}
 
		$data = array(
			'kode_jenis' => $kode_jenis,
			'kode_website' => $kode_website,
			'bulan' => $bulan,
			'nomor_urut' => $nomor_urut,
			'nomor_surat' => $nomor_surat,
			'kebutuhan_klien' => $kebutuhan_klien,
			'produk_prioritas' => $this->input->post('produk_prioritas') === 'Iya' ? 'Iya' : 'Tidak',
			'kategori' => $kategori,
			'user' => $user,
			'nama_perusahaan_klien' => $nama_perusahaan_klien,
			'alamat_kantor_klien' => $alamat_kantor_klien,
			'nama_klien' => $nama_klien,
			'nama_klien_2' => $nama_klien_2,
			'nama_klien_3' => $nama_klien_3,
			'telepon_office_klien' => $telepon_office_klien,
			'telepon_klien' => $telepon_klien,
			'telepon_klien_2' => $telepon_klien_2,
			'telepon_klien_3' => $telepon_klien_3,
			'email_klien' => $email_klien,
			'email_klien_2' => $email_klien_2,
			'email_klien_3' => $email_klien_3,
			'tanggal_input' => $tanggal_input,
			'tanggal_update' => $tanggal_update,
			'progress_hist_foll_up' => $progress_hist_foll_up,
			'sumber_inq' => $sumber_inq,
			'sumber_inq_web' => $sumber_inq_web,
			'pic' => $pic,
			'team' => $team,
			'status' => $status,
			'batas_followup' => $batas_followup,
			'nilai_quotation' => $nilai_quotation,
			'file_quotation' => $file_quotation,
			'no_po' => $no_po,
			'nilai_po' => $nilai_po,
			'file_po' => $file_po,
			'no_quotation' => $no_quotation,
			'tanggal_quotation' => $tanggal_quotation,
			'bidang_usaha'  => $bidang_usaha,
            'business_line' => $business_line,
            'provinsi'      => $provinsi,
            'kab_kota'      => $kab_kota
			);
		// Detail Kategori disimpan bila kolomnya sudah ditambahkan ke tsurat (application/tdetail_kategori.sql)
		if ($this->db->field_exists('detail_kategori', 'tsurat')) $data['detail_kategori'] = (string) $this->input->post('detail_kategori');
		$this->M_admin->masukan_data($data,'tsurat');
		// Berasal dari Request Customer: sudah tersimpan di tsurat, hapus dari trequest_customer
		if (($id_request = (int) $this->input->post('id_request')) && $this->_boleh_request()) {
			$this->db->delete('trequest_customer', array('id_request' => $id_request));
		}
		// Ditampilkan sekali di halaman berikutnya (header.php), di posisi loader, hilang sendiri setelah 2 detik
		$this->session->set_userdata('berhasil', 'Data berhasil ditambah');
		redirect('data-testindo');
	}

	// Request Customer untuk admin & Business Development (level dari session; fallback ke tuser seperti di header.php)
	private function _level(){
		if (!isset($_SESSION['username'])) return '';
		$level = isset($_SESSION['level']) ? $_SESSION['level'] : '';
		if ($level === '') {
			$row = $this->db->get_where('tuser', array('username' => $_SESSION['username']))->row();
			$level = $row ? $row->level : '';
		}
		return $level;
	}

	private function _boleh_request(){
		return in_array($this->_level(), array('admin', 'business development'), TRUE);
	}

	// Chat: Business Development & admin melihat semua data; yang bisa kirim pesan hanya Business Development & sales pemilik data.
	// Admin hanya baca (tidak mengubah ceklis dibaca).
	private function _lihat_semua_chat(){
		return in_array($this->_level(), array('admin', 'business development'), TRUE);
	}

	// Kolom tsurat yang mencatat kapan level ini terakhir membaca chat (ceklis 2 biru); NULL = tidak ikut chat (admin)
	private function _kolom_baca(){
		$kolom = array('sales' => 'sales_last_read_at', 'business development' => 'bd_last_read_at');
		$level = $this->_level();
		return isset($kolom[$level]) ? $kolom[$level] : NULL;
	}

	private function _label_level($level){
		return $level === 'business development' ? 'Business Development' : $level;
	}

	private function _sekarang(){
		// Jam WIB, tidak bergantung date.timezone server (lokal XAMPP: Europe/Berlin)
		return (new DateTime('now', new DateTimeZone('Asia/Jakarta')))->format('Y-m-d H:i:s');
	}

	// Kolom Sales (pic) berisi username atau nama lengkap sales, mis. "Alfin Rusdi" untuk username alfin
	private function _nama_saya(){
		$row = $this->db->select('nama_lengkap')->get_where('tuser', array('username' => $_SESSION['username']))->row();
		return array_values(array_filter(array($_SESSION['username'], $row ? $row->nama_lengkap : '')));
	}

	// Baris data yang boleh dibuka chat-nya: semua data untuk admin & Business Development, sales hanya data miliknya (pic)
	private function _data_chat($nomor_surat){
		if (!isset($_SESSION['username']) || $nomor_surat === '') return NULL;
		$nama = $this->_lihat_semua_chat() ? NULL : $this->_nama_saya(); // diambil dulu, sebelum query tsurat disusun
		$this->db->select('nomor_surat, sales_last_read_at, bd_last_read_at')->where('nomor_surat', $nomor_surat);
		if ($nama) $this->db->where_in('pic', $nama);
		return $this->db->get('tsurat')->row();
	}

	// GET: isi chat satu baris (baca=1: ditandai dibaca). POST pesan: kirim pesan lalu kembalikan isi chat.
	public function chat(){
		$no = (string) $this->input->get_post('no');
		$surat = $this->_data_chat($no);
		if (!$surat) { $this->output->set_status_header(403); return; }
		$saya  = $_SESSION['username'];
		$kolom = $this->_kolom_baca(); // NULL untuk admin: hanya baca
		$pesan = trim((string) $this->input->post('pesan')); // tanpa xss_clean: ditampilkan sebagai teks (.text()) di browser
		if ($pesan !== '' && $kolom) {
			$this->db->insert('tchat', array('nomor_surat' => $no, 'username' => $saya, 'level' => $this->_level(),
				'pesan' => mb_substr($pesan, 0, 2000), 'waktu' => $this->_sekarang()));
		}
		// Warna bubble diambil dari profil pengirim saat ini: ganti warna ikut mengubah riwayat, terlihat semua user
		$data = $this->db->select('c.id_chat, c.username, c.level, c.pesan, c.waktu, u.warna_chat AS warna')
			->join('tuser u', 'u.username = c.username', 'left')
			->where('c.nomor_surat', $no)->order_by('c.id_chat')->get('tchat c')->result();

		// Ditandai dibaca hanya oleh sales / Business Development, saat kirim pesan atau jendela chat sedang aktif (baca=1).
		// Ditulis hanya bila ada pesan lebih baru dari waktu baca terakhir, supaya polling tidak terus menulis ke tsurat.
		if ($kolom && $data && ($pesan !== '' || $this->input->get_post('baca')) && (string) $surat->$kolom < end($data)->waktu) {
			$surat->$kolom = $this->_sekarang();
			$this->db->update('tsurat', array($kolom => $surat->$kolom), array('nomor_surat' => $no));
		}
		foreach ($data as $c) {
			$c->saya = strcasecmp($c->username, $saya) === 0; // pesan sendiri tampil di kanan
			// Ceklis 2 biru: pesan Business Development sudah dibuka sales, pesan sales sudah dibuka Business Development
			$dibaca_pada = $c->level === 'business development' ? $surat->sales_last_read_at : $surat->bd_last_read_at;
			$c->dibaca = $dibaca_pada !== NULL && $dibaca_pada >= $c->waktu;
			$c->level = $this->_label_level($c->level);
		}
		header('Content-Type: application/json');
		echo json_encode(array('saya' => $saya, 'boleh_kirim' => (bool) $kolom, 'data' => $data), JSON_INVALID_UTF8_SUBSTITUTE);
	}

	// Notifikasi pesan masuk yang belum dibaca: sales <- pesan Business Development di data miliknya,
	// Business Development <- pesan sales di semua data. Admin hanya baca: tanpa notifikasi chat.
	public function notif_chat(){
		if (!isset($_SESSION['username'])) { $this->output->set_status_header(403); return; }
		$kolom = $this->_kolom_baca();
		$baru  = array();
		if ($kolom) {
			$bd    = $this->_level() === 'business development';
			$batas = $bd ? "c.level = 'sales'"
				: "c.level = 'business development' AND s.pic = " . $this->db->escape($_SESSION['username']); // sama dengan tabel sales (M_admin::tampil_data)
			$baru  = $this->db->query("SELECT c.id_chat, c.nomor_surat, c.username, c.level, c.pesan, c.waktu, s.kode_website, s.nama_perusahaan_klien
				FROM tchat c JOIN tsurat s ON s.nomor_surat = c.nomor_surat
				WHERE $batas AND (s.$kolom IS NULL OR c.waktu > s.$kolom)
					AND s.bulan LIKE " . $this->db->escape('%' . date('y') . '%') . " -- sama dengan tabel (M_admin::tampil_data): hanya data tahun ini, supaya notifikasi bisa dibuka
				ORDER BY c.id_chat DESC")->result();
		}
		$per_baris = array();
		foreach ($baru as $c) {
			$per_baris[$c->nomor_surat] = (isset($per_baris[$c->nomor_surat]) ? $per_baris[$c->nomor_surat] : 0) + 1;
			$c->level = $this->_label_level($c->level);
		}
		header('Content-Type: application/json');
		echo json_encode(array('jumlah' => count($baru), 'per_baris' => (object) $per_baris, 'data' => array_slice($baru, 0, 5)), JSON_INVALID_UTF8_SUBSTITUTE);
	}

	// Daftar isian form customer eksternal (htdocs/form_customer), masuk lewat Api::request_customer
	public function request_customer(){
		if (!$this->_boleh_request()) redirect('data-testindo');
		// Hanya request yang belum dikonfirmasi; yang sudah dikonfirmasi/dihapus langsung dihapus dari tabel
		$data['requests'] = $this->db->where('status', 'Baru')->order_by('id_request', 'DESC')->get('trequest_customer')->result();
		$this->load->view('admin/request_customer', $data);
	}

	public function hapus_request($id){
		if (!$this->_boleh_request()) redirect('data-testindo');
		$this->db->delete('trequest_customer', array('id_request' => (int) $id));
		redirect('request-customer');
	}

	// Notifikasi header: jumlah request baru + 5 terbaru
	public function notif_request(){
		if (!$this->_boleh_request()) { $this->output->set_status_header(403); return; }
		$baru = array('status' => 'Baru');
		header('Content-Type: application/json');
		echo json_encode(array(
			'jumlah' => $this->db->where($baru)->count_all_results('trequest_customer'),
			'data'   => $this->db->select('id_request, nama_perusahaan_klien, kategori, tanggal_request')->where($baru)
				->order_by('id_request', 'DESC')->limit(5)->get('trequest_customer')->result(),
		), JSON_INVALID_UTF8_SUBSTITUTE);
	}

	public function edit_data($id){
		// Popup edit di tabel memuat form lewat AJAX tanpa header.php (yang biasanya mengecek login)
		$data['modal'] = $this->input->is_ajax_request();
		if ($data['modal'] && !isset($_SESSION['username'])) { $this->output->set_status_header(401); return; }

		$where = array('nomor_surat' => $id);
		$data['tsurat'] = $this->M_admin->edit_data($where,'tsurat')->result();
		
		// ====================================================================
		// TAMBAHAN: Mengambil data Bidang Usaha dan JSON Wilayah Indonesia
		// ====================================================================
		$data['tbidang_usaha'] = $this->db->get('tbidang_usaha')->result();

		// Membaca file JSON dari folder vendors
		$json_path = FCPATH . 'vendors/wilayah_indonesia.json';
		if (file_exists($json_path)) {
			$data['wilayah_json'] = file_get_contents($json_path);
		} else {
			$data['wilayah_json'] = '[]';
		}
		// ====================================================================

		$this->load->view('admin/edit_data', $data);
	}
	
	public function update_priority_status() {
    // 1. Pastikan request AJAX
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }
    
        // 2. Tangkap parameter dari AJAX
        $nomor_surat = $this->input->post('nomor_surat');
        $priority_status = $this->input->post('priority_status'); // Nilai: Cold, Warm, Hot
    
        // 3. Validasi parameter input
        if (empty($nomor_surat) || !in_array($priority_status, ['Cold', 'Warm', 'Hot'])) {
            echo json_encode(['success' => false, 'message' => 'Parameter tidak valid.']);
            return;
        }
    
        // 4. Cek status inquiry saat ini di tabel 'tsurat'
        $inquiry = $this->db->get_where('tsurat', ['nomor_surat' => $nomor_surat])->row();
    
        if (!$inquiry) {
            echo json_encode(['success' => false, 'message' => 'Data tidak ditemukan.']);
            return;
        }
    
        // 5. Validasi: Hanya boleh jika statusnya "Sudah Quote"
        if (strcasecmp(trim($inquiry->status), "Sudah Quote") !== 0) {
            echo json_encode(['success' => false, 'message' => 'Status utama harus Sudah Quote.']);
            return;
        }
    
        // 6. Update data ke field 'prospect_category' di tabel 'tsurat'
        $this->db->where('nomor_surat', $nomor_surat);
        $update = $this->db->update('tsurat', ['prospect_category' => $priority_status]);
    
        if ($update) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Gagal memperbarui database.']);
        }
    }
	
	public function update_sales_ajax() {
        // Pastikan request datang dari AJAX POST
        if ($this->input->is_ajax_request()) {
            $nomor_surat = $this->input->post('nomor_surat');
            $nama_sales  = $this->input->post('nama_sales');
    
            // Validasi data input
            if (!empty($nomor_surat) && !empty($nama_sales)) {
                
                // Siapkan array data update. Sesuaikan nama field 'pic' dengan field tabel database Anda
                $data_update = array(
                    'pic' => $nama_sales,
                    'tanggal_update' => date("Y-m-d H:i:s") // otomatis update waktu perubahan
                );
    
                // Eksekusi update ke database menggunakan model Anda
                $this->db->where('nomor_surat', $nomor_surat);
                $update = $this->db->update('tsurat', $data_update); 
    
                if ($update) {
                    echo json_encode(array('status' => 'success'));
                } else {
                    echo json_encode(array('status' => 'error', 'message' => 'Gagal memperbarui database.'));
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Data tidak lengkap.'));
            }
        } else {
            exit('No direct script access allowed');
        }
    }

	function ubah_data(){
		$kode_jenis = $this->input->post('kode_jenis_2');
		$kode_website = $this->input->post('kode_website_2');
		$tbulan = $this->input->post('bulan');
		$nomor_urut = $this->input->post('nomor_urut');
		$nomor_surat = $this->input->post('kode_jenis_2')."-".$this->input->post('kode_website_2')."-".$this->input->post('bulan')."-".$this->input->post('nomor_urut');
		$kebutuhan_klien = $this->input->post('kebutuhan_klien');
		$kategori = $this->input->post('kategori');
		$user = "admin";
		$nama_perusahaan_klien = $this->input->post('nama_perusahaan_klien');
		$alamat_kantor_klien = $this->input->post('alamat_kantor_klien');
		$nama_klien = $this->input->post('nama_klien');
		$nama_klien_2 = $this->input->post('nama_klien_2');
		$nama_klien_3 = $this->input->post('nama_klien_3');
		$telepon_office_klien = $this->input->post('telepon_office_klien');
		$telepon_klien = $this->input->post('telepon_klien');
		$telepon_klien_2 = $this->input->post('telepon_klien_2');
		$telepon_klien_3 = $this->input->post('telepon_klien_3');
		$email_klien = $this->input->post('email_klien');
		$email_klien_2 = $this->input->post('email_klien_2');
		$email_klien_3 = $this->input->post('email_klien_3');
		$tanggal_input = $this->input->post('tanggal_input');
		$tanggal_update = $this->input->post('tanggal_update');
		$progress_hist_foll_up = $this->input->post('progress_hist_foll_up');
		$sumber_inq = $this->input->post('sumber_inq');
		$sumber_inq_web = $this->input->post('sumber_inq_web');
		$pic = $this->input->post('pic');
		$team = $this->input->post('team');
		$status = $this->input->post('status');
		$batas_followup = $this->input->post('batas_followup');
		$nilai_quotation_raw = $this->input->post('nilai_quotation');
        $nilai_quotation = preg_replace('/[^0-9]/', '', $nilai_quotation_raw);
		$file_quotation = $this->input->post('file_quotation');
		$no_po = $this->input->post('no_po');
		$nilai_po_raw = $this->input->post('nilai_po');
        $nilai_po = preg_replace('/[^0-9]/', '', $nilai_po_raw);
		$file_po = $this->input->post('file_po');
		$no_quotation = $this->input->post('no_quotation');
		$tanggal_quotation = $this->input->post('tanggal_quotation');
		$bidang_usaha  = $this->input->post('bidang_usaha');
        $business_line = $this->input->post('business_line');
        $provinsi      = $this->input->post('provinsi_perusahaan'); // Menyesuaikan name di view HTML
        $kab_kota      = $this->input->post('kota_perusahaan');     // Menyesuaikan name di view HTML
        
        if($no_quotation != ""){
			$no_quotation = $this->input->post('no_quotation');
		} else if ($status == "Sudah PO" or $status == "Sudah Quote"){
			$explode = explode("-", $tanggal_input);
			$no_quotation = $nomor_urut."/".$kode_website."/".$kode_jenis."/".$explode[1]."/".$explode[0];
		} else {
			$no_quotation = "";
		}
		$data = array(
			'kode_jenis' => $kode_jenis,
			'kode_website' => $kode_website,
			'bulan' => $tbulan,
			'nomor_urut' => $nomor_urut,
			'kebutuhan_klien' => $kebutuhan_klien,
			'produk_prioritas' => $this->input->post('produk_prioritas') === 'Iya' ? 'Iya' : 'Tidak',
			'kategori' => $kategori,
			'user' => $user,
			'nama_perusahaan_klien' => $nama_perusahaan_klien,
			'alamat_kantor_klien' => $alamat_kantor_klien,
			'nama_klien' => $nama_klien,
			'nama_klien_2' => $nama_klien_2,
			'nama_klien_3' => $nama_klien_3,
			'telepon_office_klien' => $telepon_office_klien,
			'telepon_klien' => $telepon_klien,
			'telepon_klien_2' => $telepon_klien_2,
			'telepon_klien_3' => $telepon_klien_3,
			'email_klien' => $email_klien,
			'email_klien_2' => $email_klien_2,
			'email_klien_3' => $email_klien_3,
			'tanggal_input' => $tanggal_input,
			'tanggal_update' => $tanggal_update,
			'progress_hist_foll_up' => $progress_hist_foll_up,
			'sumber_inq' => $sumber_inq,
			'sumber_inq_web' => $sumber_inq_web,
			'pic' => $pic,
			'team' => $team,
			'status' => $status,
			'batas_followup' => $batas_followup,
			'nilai_quotation' => $nilai_quotation,
			'file_quotation' => $file_quotation,
			'no_po' => $no_po,
			'nilai_po' => $nilai_po,
			'file_po' => $file_po,
			'no_quotation' => $no_quotation,
			'tanggal_quotation' => $tanggal_quotation,
			'bidang_usaha'  => $bidang_usaha,
            'business_line' => $business_line,
            'provinsi'      => $provinsi,
            'kab_kota'      => $kab_kota
			);
	 
		$where = array(
			'nomor_surat' => $nomor_surat
		);
	 
		$this->M_admin->update_data($where,$data,'tsurat');
		if ($this->input->is_ajax_request()) return; // popup edit: halaman tabel memuat ulang dirinya sendiri
		redirect('data-testindo');
	}
    function edit_data_2($id){
		$where = array('id_surat' => $id);
		$data['tsurat'] = $this->M_admin->edit_data($where,'tsurat')->result();
		$this->load->view('admin/edit_data_2',$data);
	}

	function ubah_data_2(){
	    $id_surat = $this->input->post('id_surat');
		$kode_jenis = $this->input->post('kode_jenis_2');
		$kode_website = $this->input->post('kode_website_2');
		$bulan = $this->input->post('bulan');
		$nomor_urut = $this->input->post('nomor_urut');
		$nomor_surat = $this->input->post('kode_jenis_2')."-".$this->input->post('kode_website_2')."-".$this->input->post('bulan')."-".$this->input->post('nomor_urut');
		$kebutuhan_klien = $this->input->post('kebutuhan_klien');
		$kategori = $this->input->post('kategori');
		$user = "admin";
		$nama_perusahaan_klien = $this->input->post('nama_perusahaan_klien');
		$alamat_kantor_klien = $this->input->post('alamat_kantor_klien');
		$nama_klien = $this->input->post('nama_klien');
		$nama_klien_2 = $this->input->post('nama_klien_2');
		$nama_klien_3 = $this->input->post('nama_klien_3');
		$telepon_office_klien = $this->input->post('telepon_office_klien');
		$telepon_klien = $this->input->post('telepon_klien');
		$telepon_klien_2 = $this->input->post('telepon_klien_2');
		$telepon_klien_3 = $this->input->post('telepon_klien_3');
		$email_klien = $this->input->post('email_klien');
		$email_klien_2 = $this->input->post('email_klien_2');
		$email_klien_3 = $this->input->post('email_klien_3');
		$tanggal_input = $this->input->post('tanggal_input');
		$tanggal_update = $this->input->post('tanggal_update');
		$progress_hist_foll_up = $this->input->post('progress_hist_foll_up');
		$sumber_inq = $this->input->post('sumber_inq');
		$sumber_inq_web = $this->input->post('sumber_inq_web');
		$pic = $this->input->post('pic');
		$team = $this->input->post('team');
		$status = $this->input->post('status');
		$no_po = $this->input->post('no_po');
		$no_quotation = $this->input->post('no_quotation');
		$tanggal_quotation = $this->input->post('tanggal_quotation');
        
        if($progress_status != "Sudah Quote")
        {
		$data = array(
			'kode_jenis' => $kode_jenis,
			'kode_website' => $kode_website,
			'bulan' => $bulan,
			'nomor_urut' => $nomor_urut,
			'nomor_surat' => $nomor_surat,
			'kebutuhan_klien' => $kebutuhan_klien,
			'kategori' => $kategori,
			'user' => $user,
			'nama_perusahaan_klien' => $nama_perusahaan_klien,
			'alamat_kantor_klien' => $alamat_kantor_klien,
			'nama_klien' => $nama_klien,
			'nama_klien_2' => $nama_klien_2,
			'nama_klien_3' => $nama_klien_3,
			'telepon_office_klien' => $telepon_office_klien,
			'telepon_klien' => $telepon_klien,
			'telepon_klien_2' => $telepon_klien_2,
			'telepon_klien_3' => $telepon_klien_3,
			'email_klien' => $email_klien,
			'email_klien_2' => $email_klien_2,
			'email_klien_3' => $email_klien_3,
			'tanggal_input' => $tanggal_input,
			'tanggal_update' => $tanggal_update,
			'progress_hist_foll_up' => $progress_hist_foll_up,
			'sumber_inq' => $sumber_inq,
			'sumber_inq_web' => $sumber_inq_web,
			'pic' => $pic,
			'team' => $team,
			'status' => $status,
			'no_po' => $no_po,
			'no_quotation' => $no_quotation
			);
	 
		$where = array(
			'id_surat' => $id_surat
		);
	 
		$this->M_admin->update_data($where,$data,'tsurat');
		redirect('data-testindo');
        }else{
        $data = array(
			'kode_jenis' => $kode_jenis,
			'kode_website' => $kode_website,
			'bulan' => $bulan,
			'nomor_urut' => $nomor_urut,
			'nomor_surat' => $nomor_surat,
			'kebutuhan_klien' => $kebutuhan_klien,
			'kategori' => $kategori,
			'user' => $user,
			'nama_perusahaan_klien' => $nama_perusahaan_klien,
			'alamat_kantor_klien' => $alamat_kantor_klien,
			'nama_klien' => $nama_klien,
			'nama_klien_2' => $nama_klien_2,
			'nama_klien_3' => $nama_klien_3,
			'telepon_office_klien' => $telepon_office_klien,
			'telepon_klien' => $telepon_klien,
			'telepon_klien_2' => $telepon_klien_2,
			'telepon_klien_3' => $telepon_klien_3,
			'email_klien' => $email_klien,
			'email_klien_2' => $email_klien_2,
			'email_klien_3' => $email_klien_3,
			'tanggal_input' => $tanggal_input,
			'tanggal_update' => $tanggal_update,
			'progress_hist_foll_up' => $progress_hist_foll_up,
			'sumber_inq' => $sumber_inq,
			'sumber_inq_web' => $sumber_inq_web,
			'pic' => $pic,
			'team' => $team,
			'status' => $status,
			'no_po' => $no_po,
			'no_quotation' => $no_quotation,
			'tanggal_quotation' => $tanggal_quotation
			);
	 
		$where = array(
			'id_surat' => $id_surat
		);
	 
		$this->M_admin->update_data($where,$data,'tsurat');
		redirect('data-testindo');   
        }
	}
    
    function hapus_data_2($id){
		$where = array('id_surat' => $id);
		$this->M_admin->hapus_data($where,'tsurat');
		redirect('data-testindo');
	}
    
	function lihat_data($id){
		$where = array('nomor_urut' => $id);
		$data['tsurat'] = $this->M_admin->edit_data($where,'tsurat')->result();
		$this->load->view('admin/lihat_data',$data);
	}

	function hapus_data($id){
		$where = array('nomor_urut' => $id);
		$this->M_admin->hapus_data($where,'tsurat');
		redirect('data-testindo');
	}
	
	function hapus_data_website($id){
		$where = array('nomor_urut' => $id);
		$this->M_admin->hapus_data($where,'tsurat_website');
		redirect('data-testindo');
	}

	function upload_gambar(){
		$this->load->view('admin/upload_gambar',array('error' => ''));
	}

	// Profil: simpan warna bubble chat milik user sendiri (hanya dari daftar WARNA_CHAT)
	public function simpan_warna_chat(){
		if (!isset($_SESSION['username'])) redirect('login');
		$warna = strtolower((string) $this->input->post('warna_chat'));
		if (preg_match('/^#[0-9a-f]{6}$/', $warna)) { // pilihan WARNA_CHAT atau warna bebas dari lingkaran RGB
			$this->db->update('tuser', array('warna_chat' => $warna === '#1e5bd6' ? NULL : $warna), array('username' => $_SESSION['username']));
			$this->session->set_flashdata('warna_ok', TRUE);
		}
		redirect('profil');
	}

	function count_data(){    
		$month = date('y');
        $kode_website = $_POST['kode_website'];
		$query = $this->db->query("SELECT * FROM tsurat where bulan LIKE '%$month' and kode_website = '$kode_website' ORDER BY nomor_urut DESC LIMIT 1;");
		$row = $query->row_array();
		$aw = "000";
        if(!$row){
			$a = 1;
			echo $aw.$a;
		}else{
			$a = $row['nomor_urut']+1;
           if($a > "999"){
                $aw = "";
            }elseif($a > "99"){ 
                $aw = "0";
            }elseif($a > "9"){
                $aw = "00";
            }
		echo $aw.$a;	
		}	
		
	}

	public function aksi_upload(){


		$config['upload_path']          = './gambar/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
 
		$this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('admin/upload_gambar', $error);
		}else{
			$no = $_SESSION['no'];
			$berkas = $_FILES['berkas']['name'];
			$data = array(
							'no' => $no,
							// 'username' => $_SESSION['username'],
							// 'password' => $_SESSION['password'],
							// 'level' => $_SESSION['level'],
							'gambar' => $berkas
								);
		 
			$where = array(
				'no' => $no
			);
		 
			$this->M_admin->upload_gambar_user($where,$data,'tuser');
			$data_upload = array('upload_data' => $this->upload->data(), 'error' => '');
			$this->load->view('admin/upload_gambar', $data_upload);
		}
	}

	public function data_sudah_po(){
		$data['table_2'] = $this->M_admin->tampil_data_sudah_po()->result();  
		$this->load->view('admin/index_2',$data);
	}

	public function data_sudah_quote(){
		$data['table_2'] = $this->M_admin->tampil_data_sudah_quote()->result();  
		$this->load->view('admin/index_2',$data);
	}

	public function data_belum_quote(){
		$data['table_2'] = $this->M_admin->tampil_data_belum_quote()->result();  
		$this->load->view('admin/index_2',$data);
	}

	public function data_close(){
		$data['table_2'] = $this->M_admin->tampil_data_close()->result();  
		$this->load->view('admin/index_2',$data);
	}

	public function export(){
		$data['table'] = $this->M_admin->tampil_data()->result();  
		$this->load->view('admin/export',$data);
	}
    
    public function export_semua(){
		$data['table'] = $this->M_admin->tampil_data_semua()->result();  
		$this->load->view('admin/export',$data);
	}
    
	public function export_sudah_po(){
		$data['table'] = $this->M_admin->tampil_data_sudah_po()->result();  
		$this->load->view('admin/export',$data);
	}

	public function export_sudah_quote(){
		$data['table'] = $this->M_admin->tampil_data_sudah_quote()->result();  
		$this->load->view('admin/export',$data);
	}

	public function export_belum_quote(){
		$data['table'] = $this->M_admin->tampil_data_belum_quote()->result();  
		$this->load->view('admin/export',$data);
	}

	public function export_close(){
		$data['table'] = $this->M_admin->tampil_data_close()->result();  
		$this->load->view('admin/export',$data);
	}

	public function export_date(){
		$data['table'] = $this->M_admin->tampil_data_date()->result();  
		$this->load->view('admin/export',$data);
	}

	// Halaman form export (dulu di sidebar)
	public function halaman_export(){
		$this->load->view('admin/halaman_export');
	}

	public function export_advanced(){
        // Jalankan query advanced
        $query_result = $this->M_admin->tampil_data_advanced();
        
        // Kirim data ke view export
        $data['table'] = $query_result->result();  
        $this->load->view('admin/export', $data);
    }
	
	public function export_report_graph(){
		$data['table'] = $this->M_admin->tampil_data_report_graph()->result();  
		$this->load->view('admin/export_report_graph',$data);
	}
    
    public function export_report_sales(){
		$data['table'] = $this->M_admin->tampil_data_report_sales()->result();  
		$this->load->view('admin/export_report_sales',$data);
	}
	
	// Analytic tahun berjalan (admin/analytic) atau tahun lalu (admin/analytic/25).
	// Begitu masuk tahun baru, tahun lalu otomatis muncul di dropdown navbar.
	public function analytic($yy = null){
		if ($yy === null) $yy = date('y');
		if (!preg_match('/^\d{2}$/', $yy) || $yy > date('y')) redirect('analytic');
		$data['yy'] = $yy;
		$data['tahun'] = '20' . $yy;
		// Daftar sales sesuai dengan pilihan yang ada di form tambah/edit data Anda
		$data['sales_list'] = ['Yovan', 'Rafael', 'Alfian', 'Fahrie', 'Erdi', 'Syaehu', 'Irsyad'];
		
		// Mengambil semua data transaksi surat/inquiry
		$data['tsurat'] = $this->db->get('tsurat')->result();   
		$this->load->view('admin/analytic',$data);
	}

	// Server-Sent Event untuk auto-refresh halaman analytic saat data tsurat berubah
	public function check_update(){
		$row = $this->db->select('COUNT(*) AS total, MAX(tanggal_input) AS last_update', FALSE)->get('tsurat')->row();
		header('Content-Type: text/event-stream');
		header('Cache-Control: no-cache');
		echo "data: {$row->total}-{$row->last_update}\n\n";
	}

	// Hari libur nasional & cuti bersama Indonesia dari kalender publik Google (cache 1 hari).
	// Output: {"2026-01-01": "Hari Tahun Baru", ...} untuk tanggal merah di date picker.
	public function hari_libur(){
		$cache = APPPATH . 'cache/hari_libur.json';
		$json = is_file($cache) ? file_get_contents($cache) : '{}';
		if (!is_file($cache) || filemtime($cache) < time() - 86400) {
			$ics = @file_get_contents('https://calendar.google.com/calendar/ical/id.indonesian%23holiday%40group.v.calendar.google.com/public/basic.ics', false, stream_context_create(array('http' => array('timeout' => 8))));
			if ($ics) {
				$libur = array();
				// Gabungkan baris lanjutan ICS (diawali spasi) lalu ambil event "Hari libur nasional"
				foreach (explode('BEGIN:VEVENT', preg_replace('/\r?\n[ \t]/', '', $ics)) as $ev) {
					if (preg_match('/DTSTART;VALUE=DATE:(\d{4})(\d{2})(\d{2})/', $ev, $d) && preg_match('/SUMMARY:(.*)/', $ev, $s) && strpos($ev, 'DESCRIPTION:Hari libur nasional') !== false) {
						$tgl = "$d[1]-$d[2]-$d[3]";
						$libur[$tgl] = isset($libur[$tgl]) ? $libur[$tgl] . ', ' . trim($s[1]) : trim($s[1]);
					}
				}
				ksort($libur);
				$json = json_encode($libur);
				file_put_contents($cache, $json);
			}
		}
		header('Content-Type: application/json');
		header('Cache-Control: ' . ($json === '{}' ? 'no-cache' : 'max-age=3600'));
		echo $json;
	}

	public function analytic_23(){
		$data['table'] = $this->M_admin->tampil_data_analytic()->result();  
		$this->load->view('admin/analytic_23',$data);
	}	
	
	public function analytic_24(){
		$data['table'] = $this->M_admin->tampil_data_analytic()->result();  
		$this->load->view('admin/analytic_24',$data);
	}

	public function analytic_pertahun(){
		$data['table'] = $this->M_admin->tampil_data_analytic()->result();  
		$this->load->view('admin/analytic_pertahun',$data);
	}
	
	public function analytic_2(){
		$data['table'] = $this->M_admin->tampil_data_2()->result();  
		$this->load->view('admin/analytic_2',$data);
	}

}