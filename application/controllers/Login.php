<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('M_login');
	}

	public function index()
	{
		// Sudah login di perangkat ini -> langsung masuk
		if ($this->session->userdata('username')) {
			redirect(base_url('data-testindo'));
		}

		// SSO aktif: belum login -> ke halaman login Portal Absensi (masuk BeforePO lewat menu portal di sana)
		if ($this->config->item('portal_absensi_url')) {
			redirect($this->config->item('portal_absensi_url'));
		}

		$data = [
			'title' => 'PT Testindo - Login'
		];

		$this->load->view('login', $data);
	}

	public function masuk()
	{
		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		// Password di database menggunakan MD5
		$password_md5 = md5($password);

		$where = [
			'username' => $username,
			'password' => $password_md5
		];

		$query = $this->M_login->cek_data_login('tuser', $where);

		if ($query->num_rows() > 0) {
			$user = $query->row();

			$session_data = [
				'username' => $user->username,
				'level'    => $user->level,
				'set'      => 'a'
			];

			$this->session->set_userdata($session_data);

			// "Tetap masuk": tandai perangkat & perpanjang cookie session 30 hari
			if ($this->input->post('check')) {
				$this->input->set_cookie('tetap_masuk', '1', 2592000);
				setcookie(config_item('sess_cookie_name'), session_id(), time() + 2592000, config_item('cookie_path'), config_item('cookie_domain'), config_item('cookie_secure'), TRUE);
			} else {
				$this->input->set_cookie('tetap_masuk', '', '');
			}

			redirect(base_url('data-testindo'));
		}

		$data = [
			'title' => 'PT Testindo - Login',
			'salah' => 'Username atau password salah'
		];

		$this->load->view('login', $data);
	}

	public function keluar()
	{
		$this->session->sess_destroy();
		$this->input->set_cookie('tetap_masuk', '', '');

		// Setelah logout: ke halaman login ERP ($config['erp_url'], bisa diganti lewat ERP_URL di .env)

		redirect($this->config->item('erp_url'));
	}

	public function tambah()
	{
		redirect('login'); // registrasi dinonaktifkan sementara

		$username = $this->input->post('username-2', TRUE);
		$password = $this->input->post('password-2', TRUE);

		$password_md5 = md5($password);

		$where = [
			'username' => $username,
			'password' => $password_md5,
			'level'    => 'guest'
		];

		$query = $this->M_login->cek_data_login('tuser', $where);

		if ($query->num_rows() > 0) {
			echo "<script>alert('Username telah digunakan!, Silahkan buka kembali website');</script>";
			return;
		}

		$this->M_login->tambah_data($where, 'tuser');

		redirect('login/index');
	}
}
