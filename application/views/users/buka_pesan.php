
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->

    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat">
        <div class="panel-heading">
          <h5 class="panel-title">Pesan</h5>
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
                  <tr align='left'>
                    <td>
                      <b> <?php echo ucwords($t_pesan->nama_lengkap); ?> </b> <i><?php echo $t_pesan->tgl_pesan; ?></i>
                      <br>
                      <b>Subject :</b> <?php echo $t_pesan->isi; ?>
                    </td>
                  </tr>
                  <?php
                  $no = 1;
                  $t_list = $this->db->get_where('tbl_pesan', array('id_parent' => $t_pesan->id_pesan))->result();
                  foreach ($t_list as $baris) {
                    $pengirim = $this->db->get_where('tbl_user', array('id_user' => $baris->pengirim))->row();
                    $penerima = $this->db->get_where('tbl_user', array('id_user' => $baris->penerima))->row();

                    if ($baris->pengirim == $t_pesan->pengirim ) {
                  ?>
                    <tr align='left'>
                      <td>
                        <b> <?php echo ucwords($pengirim->nama_lengkap); ?> </b> <i><?php echo $baris->tgl_pesan; ?></i>
                        <br>
                        <b>Subject :</b> <?php echo $baris->isi; ?>
                      </td>
                    </tr>
                  <?php
                    }else{
                  ?>
                    <tr align='right'>
                      <td>
                        <b> <?php echo ucwords($pengirim->nama_lengkap); ?> </b> <i><?php echo $baris->tgl_pesan; ?></i>
                        <br>
                        <b>Subject :</b> <?php echo $baris->isi; ?>
                      </td>
                    </tr>
                  <?php
                    }
                  $no++;
                  }?>
            </table>

            <hr>

            <a href="users/pesan" class="btn btn-default">Kembali</a>

          </div>

      </div>
    </div>
