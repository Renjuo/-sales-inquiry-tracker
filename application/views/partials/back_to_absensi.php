<?php
// Ambil URL portal absensi dari config / env / fallback
$CI =& get_instance();
$portal_url = $CI->config->item('portal_absensi_url') 
           ?: getenv('PORTAL_ABSENSI_URL') 
           ?: (isset($_ENV['PORTAL_ABSENSI_URL']) ? $_ENV['PORTAL_ABSENSI_URL'] : null)
           ?: 'https://guardian-meanwhile-upper-folders.trycloudflare.com';
?>
<!-- Tombol Kembali ke Portal Absensi Staff (Letakkan di Sidebar/Header BeforePO) -->
<a href="<?php echo htmlspecialchars(rtrim($portal_url, '/') . '/', ENT_QUOTES, 'UTF-8'); ?>" 
   style="display: inline-flex; align-items: center; gap: 8px; padding: 8px 14px; background-color: rgba(56, 189, 248, 0.1); color: #0284c7; border-radius: 8px; font-size: 13px; font-weight: 600; text-decoration: none; border: 1px solid rgba(56, 189, 248, 0.3); transition: all 0.2s;"
   title="Kembali ke Portal Absensi Staff PT Testindo">
    <span>🔙 Portal Absensi Staff</span>
</a>
