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
              <legend class="text-bold">Lihat Tabel Progres Proyek Per Bulan</legend>

              <b>Pilih User:</b> <br>
              <?php
              $bln = date('m');
              $thn = date('Y');
              $bln_thn = "$bln$thn";
              foreach ($t_user as $baris) {
              ?>
                <div class="col-md-12">
                  <a href="admin/tabel_jk_user/<?php echo $baris->id_user ?>/<?php echo $bln_thn; ?>" class="btn btn-primary btn-lg" style="width:100%;margin:5px;"><?php echo ucwords($baris->nama_lengkap); ?></a>
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
