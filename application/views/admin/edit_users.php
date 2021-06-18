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
              <legend class="text-bold">Edit User</legend>

            <form class="form-horizontal" action="" method="post">
              <div class="form-group">
                <label class="control-label col-lg-2">Nama</label>
                <div class="col-lg-10">
                  <input type="text" name="nama" class="form-control" value="<?php echo $e_user->nama; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-2">Email</label>
                <div class="col-lg-10">
                  <input type="email" name="email" class="form-control" value="<?php echo $e_user->email; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-2">Username</label>
                <div class="col-lg-10">
                  <input type="text" name="username" class="form-control" value="<?php echo $e_user->username; ?>" >
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-lg-2">Password</label>
                <div class="col-lg-10">
                  <input type="text" name="password" class="form-control" value="" placeholder="Password User">
                  <i>*Abaikan jika tidak ingin merubah password</i>
                </div>
              </div>

              <br>
              <table width="100%">
                  
              </table>
              <hr>
              <a href="admin/lihat_users" class="btn btn-default"><< Kembali</a>
              <button type="submit" name="btnupdate" class="btn btn-success" style="float:right;">Update</button>
             
            </form>
            </fieldset>

          </div>

      </div>
    </div>
    <!-- /dashboard content -->
