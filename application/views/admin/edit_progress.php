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
          <h5 class="panel-title">Edit Progress <?php echo ucwords($query->progress_nama); ?></h5>
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
            <input type="hidden" name="progress_id" value="<?=$query->progress_id?>">
            <input type="hidden" name="progress_bulan_id" value="<?=$query->progress_bulan_id?>">
            <input type="hidden" name="project_id" value="<?=$project_id?>">
            <div class="form-group">
              <label class="control-label col-lg-2"><b>Data Progress</b></label>
              <div class="col-lg-10">
                <div class="form-group">
                  <input type="text" name="progress_nama" class="form-control" value="<?php echo $query->progress_nama; ?>" placeholder="Masukkan Nama Progress" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_tanggal_mulai" class="form-control" value="<?php echo $query->progress_tanggal_mulai; ?>" placeholder="Masukkan Tanggal Mulai" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_tanggal_akhir" class="form-control" value="<?php echo $query->progress_tanggal_akhir; ?>" placeholder="Masukkan Tanggal Akhir" readonly>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_plan" class="form-control" value="<?php echo $query->progress_plan; ?>" placeholder="Masukkan Plan Progress" required>
                </div>
                <div class="form-group">
                  <input type="text" name="progress_actual" class="form-control" value="<?php echo $query->progress_actual; ?>" placeholder="Masukkan Actual Progress" required>
                </div> 
                <div class="form-group">
                  <input type="text" name="progress_status" class="form-control" value="<?php echo $query->progress_status; ?>" placeholder="Masukkan Status Progress" required>
                </div>
              </div>
            </div>

            <a href="admin/tabel_jk/<?=$project_id?>" class="btn btn-default">Kembali</a>
            <button type="submit" name="btnupdate" class="btn btn-primary" style="float:right;">Update</button>
          </form>
          <hr>

        </div>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
