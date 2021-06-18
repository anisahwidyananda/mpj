<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="panel panel-flat">

          <div class="panel-body">
            <?php
            echo $this->session->flashdata('msg');
            ?>
            <fieldset class="content-group">
              <legend class="text-bold">Tambah Progress Mingguan</legend>

              <form class="form-horizontal" action="" method="post">
                <input type="hidden" name="project_id" value="<?=$project_id?>">
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama Progress</label>
                  <div class="col-lg-10">
                    <input type="text" name="progress_nama" class="form-control" value="" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Mulai</label>
                  <div class="col-lg-10">
                    <input type="date" name="progress_tanggal_mulai" class="form-control" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Tanggal Akhir</label>
                  <div class="col-lg-10">
                    <input type="date" name="progress_tanggal_akhir" class="form-control" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Plan Progress</label>
                  <div class="col-lg-10">
                    <input type="float" name="progress_plan" class="form-control" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Actual Progress</label>
                  <div class="col-lg-10">
                    <input type="float" name="progress_actual" class="form-control" value="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Status Progress</label>
                  <div class="col-lg-10">
                    <input type="text" name="progress_status" class="form-control" value="">
                  </div>
                </div>

                
                <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
              </form>

            </fieldset>

            <a href="admin/tabel_jk/<?=$project_id?>" class="btn btn-default"><< Kembali</a>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
