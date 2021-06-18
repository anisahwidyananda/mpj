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
          <h5 class="panel-title">Tabel Proyek</h5>
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
            <table class="table datatable-basic" width="100%">
              <thead>
                <tr>
                  <th width="30px;">No.</th>
                  <th>Nama Proyek</th>
                  <th>Nilai Pekerjaan</th>
                  <th>DP & Retenensi</th>
                  <th>Status Proyek</th>
                  <th>Aksi</th>
                  <th class="text-center" width="2%"></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $no = 1;
                  if ($project) :
                  foreach ($project as $p) :
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?php echo $p->project_nama; ?></td>
                      <td><?php echo $p->project_nilai; ?></td>
                      <td><?php echo $p->project_dp; ?></td>
                      <td><?php
                      if($p->project_status == "1"){ ?>
                        <label class='label label-danger label-lg'>Carry Over</label>
                      <?php
                      }else{ ?>
                        <label class='label label-success label-lg'>New</label>
                      <?php
                      } ?>
                  </td>
                  <td>
                        <a href="admin/t_ip/ep/<?php echo $p->project_id; ?>" class="btn btn-success">Edit</a>
                        <a href="admin/t_ip/h/<?php echo $p->project_id; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
              </tbody>
            </table>

            <hr>
            <a href="admin/ip" class="btn btn-default">Tambah Proyek</a>
          </div>

      </div>
    </div>
