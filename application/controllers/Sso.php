<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ====================================================================
 * CONTROLLER SSO (SINGLE SIGN-ON) BEFORE PO (CODEIGNITER 3)
 * ====================================================================
 * Path di BeforePO: application/controllers/Sso.php
 *
 * Menerima kiriman token & data profil pengguna dari Portal Absensi Staff
 * saat user (Sales, Admin, Direksi) mengakses BeforePO.
 */
class Sso extends CI_Controller {

    /**
     * URL Portal Absensi Staff PT Testindo
     */
    private function get_portal_url() {
        // Cek 1: Dari config CI3 (application/config/config.php -> $config['portal_absensi_url'])
        $config_url = $this->config->item('portal_absensi_url');
        if (!empty($config_url)) return rtrim($config_url, '/') . '/';

        // Cek 2: Dari environment variable jika ada
        $env_url = getenv('PORTAL_ABSENSI_URL') ?: (isset($_ENV['PORTAL_ABSENSI_URL']) ? $_ENV['PORTAL_ABSENSI_URL'] : null);
        if (!empty($env_url)) return rtrim($env_url, '/') . '/';

        // Cek 3: Fallback ke URL Portal Absensi aktif saat ini
        return 'https://guardian-meanwhile-upper-folders.trycloudflare.com';
    }

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    /**
     * Endpoint Callback SSO: /sso atau index.php/sso
     */
    public function index() {
        // Ambil data GET (dengan fallback langsung ke $_GET)
        $token      = $this->input->get('token', TRUE) ?: (isset($_GET['token']) ? $_GET['token'] : null);
        if (empty($token)) {
            $token  = $this->input->get('sso_token', TRUE) ?: (isset($_GET['sso_token']) ? $_GET['sso_token'] : null);
        }

        $user_id    = $this->input->get('user_id', TRUE) ?: (isset($_GET['user_id']) ? $_GET['user_id'] : null);
        $email      = $this->input->get('email', TRUE) ?: (isset($_GET['email']) ? $_GET['email'] : null);
        $name       = $this->input->get('name', TRUE) ?: (isset($_GET['name']) ? $_GET['name'] : null);
        $role       = $this->input->get('role', TRUE) ?: (isset($_GET['role']) ? $_GET['role'] : 'operator');
        $department = $this->input->get('department', TRUE) ?: (isset($_GET['department']) ? $_GET['department'] : 'Sales');
        $username   = $this->input->get('username', TRUE) ?: (isset($_GET['username']) ? $_GET['username'] : $name);
        
        // Flag viewer dari URL
        $is_viewer  = ($this->input->get('is_viewer', TRUE) === 'true');

        // Jika tidak ada token -> redirect ke Portal Absensi Staff untuk login terlebih dahulu
        if (empty($token)) {
            redirect($this->get_portal_url());
            return;
        }

        // Verifikasi token JWT (HS256) dengan SSO_JWT_SECRET dari .env.
        // Token palsu / diubah / kedaluwarsa -> ditolak, kembali ke Portal Absensi.
        $claims = $this->verify_jwt($token);
        if ($claims === NULL) {
            log_message('error', '[SSO CI3] Token SSO tidak valid atau kedaluwarsa, akses ditolak. IP: ' . $this->input->ip_address());
            redirect($this->get_portal_url());
            return;
        }

        // Identitas & hak akses diambil dari token (bertanda tangan)
        $user_id    = isset($claims['id']) ? $claims['id'] : (isset($claims['user_id']) ? $claims['user_id'] : $user_id);
        $email      = isset($claims['email']) ? $claims['email'] : $email;
        $role       = isset($claims['role']) ? $claims['role'] : $role;
        $username   = isset($claims['username']) ? $claims['username'] : ($email ?: $username);
        if (!empty($claims['name'])) {
            $name   = $claims['name'];
        }
        if (!empty($claims['full_name'])) {
            $name   = $claims['full_name'];
        }
        if (!empty($claims['department'])) {
            $department = $claims['department'];
        }

        if (empty($username)) {
            log_message('error', '[SSO CI3] Token SSO tanpa username/email, akses ditolak.');
            redirect($this->get_portal_url());
            return;
        }

        // Cek apakah akun memiliki hak Admin / Super Admin
        $is_admin = in_array(strtolower($role), array('admin', 'superadmin', 'administrator'), TRUE);

        // ATURAN ROLE & HAK AKSES:
        // 1. Jika Admin / Super Admin: SELALU dapat akses Admin penuh, tidak boleh di-downgrade.
        // 2. Jika bukan Admin dan berasal dari Direksi atau is_viewer=true: masuk mode viewer (read-only).
        // 3. Selain itu: masuk sebagai sales / operator.
        if ($is_admin) {
            $role       = 'admin';
            $is_viewer  = false;
        } else if ($is_viewer || strtolower($department) === 'direksi') {
            $role       = 'operator';
            $is_viewer  = true;
        }

        // Simpan sesi login ke CodeIgniter 3
        // Lengkap dengan semua variasi key session yang biasa dipakai di CI3 Before PO
        $session_data = array(
            // Identitas Token
            'token'        => $token,
            'sso_token'    => $token,

            // User ID
            'user_id'      => $user_id,
            'id_user'      => $user_id,
            'id'           => $user_id,

            // Nama & Username
            'name'         => $name,
            'nama'         => $name,
            'full_name'    => $name,
            'nama_user'    => $name,
            'username'     => $username,

            // Email & Role / Level (Lengkap untuk berbagai controller/view BeforePO)
            'email'        => $email,
            'role'         => $is_admin ? 'admin' : $role,
            'Role'         => $is_admin ? 'admin' : $role,
            'level'        => $is_admin ? 'admin' : $role,
            'Level'        => $is_admin ? 'admin' : $role,
            'level_name'   => $is_admin ? 'Admin' : 'Sales',
            'level_user'   => $is_admin ? 'admin' : ($role === 'operator' ? 'operator' : 'sales'),
            'id_level'     => $is_admin ? 1 : 2,
            'id_role'      => $is_admin ? 1 : 2,
            'role_id'      => $is_admin ? 1 : 2,
            'user_level'   => $is_admin ? 'admin' : $role,
            'hak_akses'    => $is_admin ? 'admin' : $role,
            'akses'        => $is_admin ? 'admin' : $role,
            'is_admin'     => $is_admin ? 1 : 0,
            'admin'        => $is_admin ? 1 : 0,
            'department'   => $department,
            'divisi'       => $department,

            // Viewer Flag (Read-only untuk Direksi non-admin)
            'is_viewer'    => $is_viewer,

            // Status Login
            'logged_in'    => TRUE,
            'is_logged_in' => TRUE,
            'is_login'     => TRUE,
            'status'       => 'login',
            'login_via'    => 'sso_portal_absensi',
            'logged_time'  => date('Y-m-d H:i:s'),
        );

        // Jika BeforePO memiliki database lokal, coba sinkronkan data user lokal jika ada
        try {
            $this->load->database();
            if (isset($this->db) && $this->db->conn_id) {
                $tables = array('users', 'tb_user', 'tbl_user', 'user', 'm_user', 'sales', 'tb_sales');
                foreach ($tables as $tbl) {
                    if ($this->db->table_exists($tbl)) {
                        $this->db->group_start();
                        $this->db->where('username', $username);
                        if (!empty($email)) {
                            $this->db->or_where('email', $email);
                        }
                        $this->db->group_end();
                        $db_user = $this->db->get($tbl)->row_array();
                        if (!empty($db_user)) {
                            foreach ($db_user as $k => $v) {
                                if (!in_array(strtolower($k), array('password', 'pass', 'pwd', 'token'), TRUE)) {
                                    // Jangan menimpa status admin jika akun dari token adalah admin
                                    if ($is_admin && in_array(strtolower($k), array('role', 'level', 'hak_akses', 'akses', 'is_admin'), TRUE)) {
                                        continue;
                                    }
                                    $session_data[$k] = $v;
                                }
                            }
                            break;
                        }
                    }
                }
            }
        } catch (Exception $e) {
            // Abaikan jika database lokal tidak dapat diakses
        }

        $this->session->set_userdata($session_data);

        log_message('info', "[SSO CI3] User {$username} ({$email}) berhasil login via SSO. Role: {$role}, Level: " . $session_data['level']);

        // Alihkan ke halaman antara yang ringan (bukan langsung ke halaman data yang berat),
        // supaya ?token=... tidak terpampang di address bar selama halaman data dimuat.
        redirect('sso/masuk');
    }

    /**
     * Halaman antara setelah SSO sukses: membersihkan address bar lalu membuka Data Testindo.
     */
    public function masuk() {
        if (!$this->session->userdata('is_logged_in')) {
            redirect($this->get_portal_url());
            return;
        }
        $this->load->view('sso_masuk');
    }

    /**
     * Verifikasi JWT HS256. Mengembalikan isi token (array) bila tanda tangan cocok
     * dan belum kedaluwarsa, selain itu NULL.
     */
    private function verify_jwt($jwt) {
        $secret = $this->config->item('sso_jwt_secret');
        if (empty($secret)) {
            $secret = getenv('SSO_JWT_SECRET') ?: (isset($_ENV['SSO_JWT_SECRET']) ? $_ENV['SSO_JWT_SECRET'] : null);
        }
        if (empty($secret)) {
            log_message('error', '[SSO CI3] SSO_JWT_SECRET belum diisi di .env atau config.php');
            return NULL;
        }

        $parts = explode('.', $jwt);
        if (count($parts) !== 3) return NULL;
        list($header64, $payload64, $signature64) = $parts;

        $header = json_decode($this->base64url_decode($header64), TRUE);
        if (!is_array($header) || !isset($header['alg']) || $header['alg'] !== 'HS256') return NULL;

        $expected = hash_hmac('sha256', $header64 . '.' . $payload64, $secret, TRUE);
        if (!hash_equals($expected, (string) $this->base64url_decode($signature64))) return NULL;

        $payload = json_decode($this->base64url_decode($payload64), TRUE);
        if (!is_array($payload)) return NULL;

        // Toleransi 60 detik untuk selisih jam antar server
        $now = time();
        if (isset($payload['exp']) && $now > $payload['exp'] + 60) return NULL;
        if (isset($payload['nbf']) && $now + 60 < $payload['nbf']) return NULL;

        return $payload;
    }

    private function base64url_decode($data) {
        return base64_decode(strtr($data, '-_', '+/') . str_repeat('=', (4 - strlen($data) % 4) % 4));
    }

    /**
     * Endpoint Logout: /sso/logout atau /auth/logout
     */
    public function logout() {
        $this->session->sess_destroy();
        redirect($this->get_portal_url());
    }
}
