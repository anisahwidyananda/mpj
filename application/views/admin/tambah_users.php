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
              <legend class="text-bold">Tambah User</legend>

              <form class="form-horizontal" action="" method="post">
                <div class="form-group">
                  <label class="control-label col-lg-2">Username</label>
                  <div class="col-lg-10">
                    <input type="text" name="username" class="form-control" value="" required>
                    <i>*Passwordnya sama dengan <b>Username</b></i>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Nama</label>
                  <div class="col-lg-10">
                    <input type="text" name="nama" class="form-control" value="" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2">Email</label>
                  <div class="col-lg-10">
                    <input type="text" name="email" class="form-control" value="" required>
                  </div>
                </div>

                
                <button type="submit" name="btnsimpan" class="btn btn-primary" style="float:right;">Simpan</button>
              </form>

            </fieldset>

            <a href="admin/lihat_users" class="btn btn-default"><< Kembali</a>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
