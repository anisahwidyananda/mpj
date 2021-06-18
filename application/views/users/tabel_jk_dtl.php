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
                        <label class='label label-success label-lg'>Sedang Berjalan</label>
                      <?php
                      }else{ ?>
                        <label class='label label-danger label-lg'>Selesai</label>
                      <?php
                      } ?>
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
    <!-- /dashboard content -->