<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base Controller MY_Controller untuk CodeIgniter 3
 * ===================================================
 * Path di BeforePO: application/core/MY_Controller.php
 *
 * Jadikan controller halaman BeforePO turunan dari class ini:
 * Contoh: class Dashboard extends MY_Controller { ... }
 * Otomatis mengecek login SSO. Jika belum login, dialihkan ke Portal Absensi Staff.
 */
class MY_Controller extends CI_Controller {

    protected function get_portal_url() {
        // Cek 1: Dari config CI3 (application/config/config.php -> $config['portal_absensi_url'])
        $config_url = $this->config->item('portal_absensi_url');
        if (!empty($config_url)) return rtrim($config_url, '/') . '/';

        // Cek 2: Dari environment variable jika ada
        $env_url = getenv('PORTAL_ABSENSI_URL') ?: (isset($_ENV['PORTAL_ABSENSI_URL']) ? $_ENV['PORTAL_ABSENSI_URL'] : null);
        if (!empty($env_url)) return rtrim($env_url, '/') . '/';

        // Cek 3: Fallback ke URL Portal Absensi aktif saat ini
       /* return 'https://erp.testindo.co.id/';*/
    }

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');

        // Cek status login (memeriksa semua kemungkinan key login SSO)
        $is_logged_in = $this->session->userdata('is_logged_in')
                     || $this->session->userdata('logged_in')
                     || $this->session->userdata('is_login')
                     || !empty($this->session->userdata('token'))
                     || !empty($this->session->userdata('user_id'));

        if (!$is_logged_in) {
            redirect($this->get_portal_url());
            exit;
        }
    }
}
