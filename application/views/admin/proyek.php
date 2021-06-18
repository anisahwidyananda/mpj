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
          <h5 class="panel-title">Tambah Proyek</h5>
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
            <div class="form-group">
              <label class="control-label col-lg-2"><b>Isi Proyek</b></label>
              <div class="col-lg-10">
                <div class="form-group">
                  <input type="text" name="project_nama[]" class="form-control" value="" placeholder="Masukkan Nama Proyek" required>
                </div>
                <div class="form-group">
                  <input type="number" name="project_nilai[]" class="form-control" value="" placeholder="Masukkan Nilai Proyek" required>
                </div>
                <div class="form-group">
                  <input type="number" name="project_dp[]" class="form-control" value="" placeholder="Masukkan DP & Retenensi" required>
                </div>
                <div class="form-group">
                  <input type="text" name="project_status[]" class="form-control" value="" placeholder="Masukkan Status Proyek" required>
                  <p class="help-block "><i class="glyphicon glyphicon-info-sign"></i> Status Proyek yang dibuat</p>
                </div>
                <hr>
                
              </div>
            </div>
            <hr>

            <a href="admin/t_ip" class="btn btn-default">Tabel Proyek</a>
            <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
          </form>
          <hr>

        </div>

      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
