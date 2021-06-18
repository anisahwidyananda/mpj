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
              <legend class="text-bold">Data Progress Proyek Perbulan</legend>


        <table class="table datatable-basic" width="100%">
          <thead>
            <tr>
              <th width="30px;">No.</th>
              <th>Progress Bulan</th>
              <th>Plan Progress</th>
              <th>Actual Progress</th>
              <th>Rencana Pembayaran</th>
              <th>Status</th>
             
            </tr>
          </thead>
          <tbody>
              <?php
                  $no = 1;
                  if ($progress_bulan) :
                  foreach ($progress_bulan as $pb) :
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?php echo $pb->progress_bulan_bulan; ?></td>
                      <td><?php echo $pb->progress_bulan_plan; ?></td>
                      <td><?php echo $pb->progress_bulan_actual; ?></td>
                      <td><?php echo $pb->progress_bulan_pembayaran; ?></td>
                      <td><?php
                      if($pb->progress_bulan_status == "1"){ ?>
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