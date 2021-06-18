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

              <form class="form-horizontal" action="" method="post">
              <legend class="text-bold">Data Progress Proyek Perminggu</legend>

              <div class="heading-elements">
            <ul class="icons-list">
              <li><a data-action="collapse"></a></li>
            </ul>
          </div>
              <a href="admin/tambah_progress/<?=$project_id?>" class="btn btn-primary">Tambah Progress</a>
        </div>

        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Nama Progres</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Akhir</th>
              <th>Plan Progress</th>
              <th>Actual Progress</th>
              <th>Status</th>
              <th>Aksi</th>
              <!-- <th class="text-center" width="80"></th> -->
            </tr>
          </thead>
          <tbody>
              <?php
                  $no = 1;
                  if ($progress) :
                  foreach ($progress as $pg) :
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?php echo $pg->progress_nama; ?></td>
                      <td><?php echo $pg->progress_tanggal_mulai; ?></td>
                      <td><?php echo $pg->progress_tanggal_akhir; ?></td>
                      <td><?php echo $pg->progress_plan; ?></td>
                      <td><?php echo $pg->progress_actual; ?></td>
                      <td><?php
                      if($pg->progress_status == "1"){ ?>
                        <label class='label label-success label-lg'>Progress</label>
                      <?php
                      }else{ ?>
                        <label class='label label-danger label-lg'>Telat</label>
                      <?php
                      } ?>
                  </td>
                  <td>
                    <a href="admin/tabel_jk_detail/ep/<?php echo $pg->progress_id; ?>" class="btn btn-success">Edit</a>
                    <a href="admin/tabel_jk_detail/h/<?php echo $pg->progress_id; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                  </td>
                </tr>
              <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
              </tbody>
            </table>
      </div>
      <!-- /basic datatable -->
    </div>
    <!-- /dashboard content