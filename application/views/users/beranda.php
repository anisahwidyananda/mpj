<?php
  $cek     = $user->row();
  $id_user = $cek->id_user;
  $nama    = $cek->nama;
  $email   = $cek->email;

  $tgl = date('m-Y');
?>

<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <!-- Basic datatable -->
      <div class="panel panel-flat bg-info">
        <div class="panel-heading">
          <h3 class="panel-title">
            <center>Selamat Datang, <?php echo ucwords($nama); ?></center>
          </h3>
        </div>
      </div>
      <!-- /basic datatable -->

      <div class="row">
        <div class="col-lg-12">

          <!-- Quick stats boxes -->
          <div class="row">
            <div class="col-lg-4">

              <!-- Current server load -->
              <div class="panel bg-teal-400">
                <div class="panel-body">

                  <h3 class="no-margin"><?php echo $jml_proyek; ?></h3>
                  Jumlah Proyek
                </div>

                <div id="server-load"></div>
              </div>
              <!-- /current server load -->

            </div>

            <div class="col-lg-4">

              <!-- Current server load -->
              <div class="panel bg-orange-400">
                <div class="panel-body">

                  <h3 class="no-margin"><?php echo $jml_progressbulan; ?></h3>
                  Jumlah Progress Bulanan
                </div>

                <div id="server-load"></div>
              </div>
              <!-- /current server load -->

            </div>

            <div class="col-lg-4">

              <!-- Today's revenue -->
              <div class="panel bg-pink-400">
                <div class="panel-body">

                  <h3 class="no-margin"><?php echo $jml_progress; ?></h3>
                  Jumlah Progres Mingguan
                </div>

                <div id="today-revenue"></div>
              </div>
              <!-- /today's revenue -->

            </div>
          </div>
          <!-- /quick stats boxes -->


        <div class="row">
          <div class="col-lg-6">

         
            <div class="box"></div>

          </div>
          
          <div class="col-lg-6">

                <div class="panel-body">
                  <fieldset class="content-group">

                  </fieldset>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>