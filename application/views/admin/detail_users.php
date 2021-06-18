<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="panel panel-flat">

          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Detail User</legend>

              <table width="100%">
                  <tr>
                    <td width="100">Nama</td>
                    <td>: <?php echo $p_user->nama; ?></td>
                  </tr>
                  <tr>
                    <td width="100">Email</td>
                    <td>: <?php echo $p_user->email; ?></td>
                  </tr>
                  <tr>
                    <td width="100">Username</td>
                    <td>: <?php echo $p_user->username; ?></td>
                  </tr>
                  
              </table>
            </fieldset>

            <a href="admin/lihat_users" class="btn btn-default"><< Kembali</a>
          </div>

      </div>
    </div>
    <!-- /dashboard content -->
