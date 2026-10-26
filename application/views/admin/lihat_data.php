<?php
include 'header.php';
?>
<div class="card">
  <div class="card-header">
    <strong class="card-title">Data Log</strong>
  </div>
  <div class="card-body">
    <!-- Credit Card -->
    <?php foreach($your_table as $u){ ?>
    <div id="pay-invoice">
      <div class="card-body">
        <div class="card-title">
          <h3 class="text-center">Data Log dengan Nomor PO <?php echo $u->nomor_po ?> </h3>
        </div>
        <hr>
        <form action="#" method="post">
          <div class="card-body card-block">
            <div class="form-group"><label class=" form-control-label">Update</label><input type="text" id="update_status" name="update_status" class="form-control" value="<?php echo $u->update_status ?>" readonly=""></div>
            <div class="form-group"><label class=" form-control-label">Update Log</label><textarea id="update_status_log" name="update_status_log" class="form-control" rows="5" id="comment" readonly=""><?php echo $u->update_status_log ?></textarea></div>
            <div class="form-group"><label class=" form-control-label">Action</label><input type="text" id="aksi_status" name="aksi_status" class="form-control" value="<?php echo $u->aksi_status ?>" readonly=""></div>
            <div class="form-group"><label class=" form-control-label">Action Log</label><textarea id="aksi_status_log" name="aksi_status_log" class="form-control" rows="5" id="comment" readonly=""><?php echo $u->aksi_status_log ?></textarea></div>
            <div class="form-group"><label class=" form-control-label">PIC</label><input type="text" id="pic_nama" name="pic_nama" class="form-control" value="<?php echo $u->pic_nama ?>" readonly=""></div>
            <div class="form-group"><label class=" form-control-label">PIC Log</label><textarea id="pic_nama_log" name="pic_nama_log" class="form-control" rows="5" id="comment" readonly=""><?php echo $u->pic_nama_log ?></textarea></div>
            <div class="form-group"><label class=" form-control-label">Date</label><input type="date" id="tanggal_status" name="tanggal_status" class="form-control" value="<?php echo $u->tanggal_status ?>" readonly=""></div>
            <div class="form-group"><label class=" form-control-label">Date Log</label><textarea id="tanggal_status_log" name="tanggal_status_log" class="form-control" rows="5" id="comment" readonly=""><?php echo $u->tanggal_status_log ?></textarea></div>
          <!-- <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block col-md-6">
            <i class="fa fa-save fa-lg"></i>&nbsp;
            <span id="payment-button-amount">Save</span>
            </button>
            <button id="payment-button" type="reset" class="btn btn-lg btn-info btn-block col-md-6">
            <i class="fa fa-close fa-lg"></i>&nbsp;
            <span id="payment-button-amount">Reset</span>
            </button> -->
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
  </div> <!-- .card -->
  <?php
  include 'footer.php';
  ?>