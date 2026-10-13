<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Hook Proteksi Otomatis SSO untuk CodeIgniter 3
 * ================================================
 * Path di BeforePO: application/hooks/SsoAuthHook.php
 */
class SsoAuthHook {

    private function get_portal_url($CI) {
        $config_url = $CI->config->item('portal_absensi_url');
        if (!empty($config_url)) return rtrim($config_url, '/') . '/';

        $env_url = getenv('PORTAL_ABSENSI_URL') ?: (isset($_ENV['PORTAL_ABSENSI_URL']) ? $_ENV['PORTAL_ABSENSI_URL'] : null);
        if (!empty($env_url)) return rtrim($env_url, '/') . '/';

        /*return 'https://erp.testindo.co.id/';*/
    }

    public function checkAuth() {
        $CI =& get_instance();

        // Portal Absensi kosong = SSO tidak dipakai (login lokal), jangan cegat apa pun
        $portal_url = $this->get_portal_url($CI);
        if (empty($portal_url)) {
            return;
        }

        if (!isset($CI->session)) {
            $CI->load->library('session');
        }
        if (!isset($CI->router)) {
            $CI->load->helper('url');
        }

        // Ambil nama controller yang sedang diakses
        $controller = strtolower($CI->router->fetch_class());

        // JANGAN cegat controller SSO agar alur login & logout tidak macet/loop
        // 'api' = API publik form customer (htdocs/form_customer), harus bisa diakses tanpa login
        if ($controller === 'sso' || $controller === 'api') {
            return;
        }

        // Cek apakah user sudah login via SSO
        $is_logged_in = $CI->session->userdata('is_logged_in')
                     || $CI->session->userdata('logged_in')
                     || $CI->session->userdata('is_login')
                     || !empty($CI->session->userdata('token'))
                     || !empty($CI->session->userdata('user_id'));

        // Jika belum login, langsung redirect ke Portal Absensi Staff
        if (!$is_logged_in) {
            redirect($portal_url);
            exit;
        }
    }
}
