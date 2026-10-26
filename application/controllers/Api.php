<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * API publik untuk form customer eksternal (htdocs/form_customer).
 * Tanpa login: controller 'api' dikecualikan di SsoAuthHook.
 */
class Api extends CI_Controller {

	// kolom yang boleh diisi customer => panjang maksimal
	private $kolom = array(
		'kebutuhan_klien' => 5000, 'kategori' => 255,
		'nama_perusahaan_klien' => 255, 'bidang_usaha' => 2, 'business_line' => 255,
		'alamat_kantor_klien' => 1000, 'provinsi' => 50, 'kab_kota' => 50, 'telepon_office_klien' => 20,
		'nama_klien' => 255, 'nama_klien_2' => 255, 'nama_klien_3' => 255,
		'telepon_klien' => 20, 'telepon_klien_2' => 20, 'telepon_klien_3' => 20,
		'email_klien' => 255, 'email_klien_2' => 255, 'email_klien_3' => 255,
	);

	function __construct(){
		parent::__construct();
		// Form berada di luar BeforePO (bisa beda domain)
		header('Access-Control-Allow-Origin: *');
		header('Content-Type: application/json');
	}

	// Pilihan dropdown form: bidang usaha + provinsi/kota
	public function form_options(){
		$json_path = FCPATH . 'vendors/wilayah_indonesia.json';
		echo json_encode(array(
			'bidang_usaha' => $this->db->order_by('nama_bidang_usaha')->get('your_table')->result(),
			'wilayah'      => file_exists($json_path) ? json_decode(file_get_contents($json_path)) : array(),
		));
	}

	// Simpan isian form customer -> muncul di menu Request Customer + notifikasi header
	public function request_customer(){
		if ($this->input->method() !== 'post') { $this->output->set_status_header(405); return; }
		// Honeypot: field tersembunyi ini hanya diisi bot
		if ($this->input->post('website')) { echo json_encode(array('ok' => TRUE)); return; }

		$data = array();
		foreach ($this->kolom as $k => $maks) $data[$k] = mb_substr(trim((string) $this->input->post($k)), 0, $maks);
		$data['bidang_usaha'] = (int) $data['bidang_usaha'];

		$wajib = array('nama_perusahaan_klien' => 'Nama perusahaan', 'bidang_usaha' => 'Bidang usaha', 'business_line' => 'Business line (isi "-" jika tidak ada)',
			'provinsi' => 'Provinsi perusahaan', 'kab_kota' => 'Kota/kabupaten perusahaan',
			'nama_klien' => 'Nama kontak', 'telepon_klien' => 'No. HP', 'kebutuhan_klien' => 'Kebutuhan');
		foreach ($wajib as $k => $label) {
			if ($data[$k] === '' || $data[$k] === 0) { $this->output->set_status_header(422); echo json_encode(array('ok' => FALSE, 'pesan' => $label . ' wajib diisi.')); return; }
		}
		// Email boleh kosong; kalau diisi harus berformat benar
		if ($data['email_klien'] !== '' && !filter_var($data['email_klien'], FILTER_VALIDATE_EMAIL)) {
			$this->output->set_status_header(422); echo json_encode(array('ok' => FALSE, 'pesan' => 'Email tidak valid.')); return;
		}

		// WIB secara eksplisit: zona waktu PHP di server bisa berbeda (XAMPP bawaan Europe/Berlin)
		$data['tanggal_request'] = (new DateTime('now', new DateTimeZone('Asia/Jakarta')))->format('Y-m-d H:i:s');
		$this->db->insert('your_table', $data);
		echo json_encode(array('ok' => TRUE));
	}
}
