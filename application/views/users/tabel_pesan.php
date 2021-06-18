
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->

    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Kotak Masuk</h5>
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
                  <th>Pengirim</th>
                  <th>Subject</th>
                  <th width="20%">Tanggal kirim</th>
                  <th class="text-center" width="20%"></th>
                </tr>
              </thead>
              <tbody>
                  <?php
                  $no = 1;
                  foreach ($t_pesan as $baris) {
                    $pengirim = $this->db->get_where('tbl_user', array('id_user' => $baris->pengirim))->row();
                    $penerima = $this->db->get_where('tbl_user', array('id_user' => $baris->pengirim))->row();
                  ?>
                    <tr>
                      <td><?php echo $no.'.'; ?></td>
                      <td><?php echo $pengirim->nama_lengkap; ?></td>
                      <td><?php echo $baris->isi; ?></td>
                      <td><?php echo $baris->tgl_pesan; ?></td>
                      <td>
                        <a href="users/pesan/b/<?php echo $baris->id_pesan; ?>" class="btn btn-info">Buka</a>
                        <a href="users/pesan/bls/<?php echo $baris->id_pesan; ?>" class="btn btn-success">Balas</a>
                      </td>
                    </tr>
                  <?php
                  $no++;
                  } ?>
              </tbody>
            </table>

            <hr>
            <a href="users" class="btn btn-default">Beranda</a>
          </div>

      </div>
    </div>
