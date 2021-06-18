<?php
$query = $ep->row(); ?>

<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Edit Progress <?php echo ucwords($query->progress_bulan_bulan); ?></h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                    <?php
                    echo $this->session->flashdata('msg');
                    ?>
        </div>
        <hr style="margin:0px;">
        <div class="panel-body">
          <form class="form-horizontal" action="" method="post">
            <input type="hidden" name="progress_bulan_id" value="<?=$query->progress_bulan_id?>">
            <div class="form-group">
              <label class="control-label col-lg-2"><b>Data Progress Perbulan</b></label>
              <div class="col-lg-10">
                <div class="form-group">
                  <input type="text" name="progress_bulan_bulan" class="form-control" value="<?php echo $query->progress_bulan_bulan; ?>" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_bulan_plan" class="form-control" value="<?php echo $query->progress_bulan_plan; ?>" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_bulan_actual" class="form-control" value="<?php echo $query->progress_bulan_actual; ?>" readonly>
                </div>
                <div class="form-group">
                  <input type="number" name="progress_bulan_pembayaran" class="form-control" value="<?php echo $query->progress_bulan_pembayaran; ?>" placeholder="Masukkan Rencana Pembayaran" required>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_bulan_status" class="form-control" value="<?php echo $query->progress_bulan_status; ?>" placeholder="Masukkan Status Progress" required>
                </div>
              </div>
            </div>

            <a href="admin/tabel_bln/" class="btn btn-default">Kembali</a>
            <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Update</button>
          </form>
          <hr>

        </div>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
