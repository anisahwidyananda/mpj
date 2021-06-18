<?php
$sub_menu2 = strtolower($this->uri->segment(2)); ?>
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
          <h5 class="panel-title">Data User</h5>
          <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>

                    <?php
                    echo $this->session->flashdata('msg');

                    ?>
<br>
                    <a href="admin/lihat_users/t" class="btn btn-primary">Tambah User</a>
                    <?php
                    ?>
                    <hr>
        </div>

        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Nama</th>
              <th>Username</th>
              <th>Email</th>
              <th>Status</th>
              
            </tr>
          </thead>
          <tbody>
              <?php
              $no = 1;
              foreach ($level_users->result() as $baris) {
              ?>
                <tr>
                  <td><?php echo $no.'.'; ?></td>
                  <td><?php echo $baris->nama; ?></td>
                  <td><?php echo $baris->username; ?></td>
                  <td><?php echo $baris->email; ?></td>
                  
                  <td>
                    <a href="admin/lihat_users/p/<?php echo $baris->id_user; ?>" class="btn btn-info">Lihat</a>
                    <a href="admin/lihat_users/e/<?php echo $baris->id_user; ?>" class="btn btn-success">Edit</a>
                    <a href="admin/lihat_users/h/<?php echo $baris->id_user; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                  </td>
                </tr>
              <?php
              $no++;
              } ?>
          </tbody>
        </table>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content -->
