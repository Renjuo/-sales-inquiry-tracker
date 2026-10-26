<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="only light">
    <title>PT Your_company - Before PO</title>
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>images/favicon.png">
    <script>
        // Halaman antara setelah SSO: address bar langsung jadi alamat dasar (tanpa ?token=... / #token=...),
        // lalu halaman data dimuat. Tanpa ini token tetap terpampang selama halaman data yang berat dimuat.
        history.replaceState(null, document.title, '<?php echo base_url(); ?>');
        location.replace('<?php echo base_url('data-your_company'); ?>');
    </script>
    <style>
        body { background: #f5f7fb; margin: 0; }
        /* loader tetap tampil sampai halaman berikutnya muncul */
        #page-loader.done { opacity: 1 !important; visibility: visible !important; }
    </style>
</head>
<body>
<?php $this->load->view('loader'); ?>
</body>
</html>
