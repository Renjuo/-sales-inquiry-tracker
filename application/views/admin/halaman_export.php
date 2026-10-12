<?php
include 'header.php';
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Export Data</strong>
                        <div class="toolbar-sub text-muted" style="font-size: 12.5px;">Unduh data inquiry ke Excel. Kosongkan tanggal untuk mengekspor semua tanggal.</div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('export_advanced'); ?>" method="post">
                            <div class="filter-grid" style="display: grid; gap: 12px; grid-template-columns: repeat(2, minmax(0, 1fr));">
                                <div class="form-group mb-0" style="grid-column: 1 / -1;">
                                    <label>Tanggal input</label>
                                    <div class="drp">
                                        <input type="hidden" id="dat" name="dat">
                                        <input type="hidden" id="dat2" name="dat2">
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="prog_stat">Progress Status</label>
                                    <select class="form-control" name="prog_stat" id="prog_stat">
                                        <option>Semua</option>
                                        <option>Sudah PO</option>
                                        <option>Sudah Quote</option>
                                        <option>Belum Quote</option>
                                        <option>Ditunda</option>
                                        <option>Close/Gagal</option>
                                    </select>
                                </div>
                                <div class="form-group mb-0">
                                    <label for="pics">Sales</label>
                                    <select class="form-control" name="pics" id="pics">
                                        <option>Semua</option>
                                        <option>Alfian</option>
                                        <option>Alfin Rusdi</option>
                                        <option>Bayu</option>
                                        <option>Erdi</option>
                                        <option>Fahrie</option>
                                        <option>Faoji</option>
                                        <option>Hanifan</option>
                                        <option>Irsyad</option>
                                        <option>Rafael</option>
                                        <option>Ridwan</option>
                                        <option>Redha</option>
                                        <option>Syaehu</option>
                                        <option>Yovan</option>
                                        <option>Zulfikri</option>
                                        <option>Belum ada sales</option>
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary" style="height: 42px; border-radius: 12px; padding: 0 22px;">
                                    <i class="fa fa-download"></i>&nbsp; Export Excel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
