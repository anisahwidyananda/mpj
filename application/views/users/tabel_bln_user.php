<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="panel panel-flat col-md-6">

          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Lihat Tabel Progress Per Bulan</legend>

              <b>Pilih Proyek:</b> <br>
              <?php
              foreach ($project as $p) {
              ?>
                <div class="col-md-12">
                  <a href="users/tabel_bln_user/<?php echo $p->project_id ?>" class="btn btn-primary btn-lg" style="width:100%;margin:5px;"><?php echo $p->project_nama; ?></a>
                </div>
              <?php
              } ?>
            </fieldset>
            <div class="col-md-12">
              <a href="" class="btn btn-default" style="float:right;">Beranda</a>
            </div>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
