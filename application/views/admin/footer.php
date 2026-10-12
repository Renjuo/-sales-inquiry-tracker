<script>/* Halaman tanpa header.php (export report) */ window.jQuery || document.write('<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"><\/script>');</script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js?v=<?php echo filemtime(FCPATH . 'assets/js/main.js'); ?>"></script>
<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/lib/data-table/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/jszip.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/js/lib/data-table/pdfmake.min.js"></script>
<script defer src="<?php echo base_url(); ?>assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/lib/data-table/datatables-init.js"></script>
    

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>

    <script>
    $(function () {
        // Hanya mempertahankan inisialisasi DataTable agar tabel tetap berfungsi normal
        $("#bootstrap-data-table")
            .DataTable({
                responsive: true,
                lengthChange: false,
                autoWidth: true,
                buttons: [
                    "copy",
                    "csv",
                    "excel",
                    "pdf",
                    "print",
                    "colvis",
                ],
            })
            .buttons()
            .container()
            .appendTo("#bootstrap-data-table_wrapper .col-md-6:eq(0)");
    });
</script>

</body>
</html>