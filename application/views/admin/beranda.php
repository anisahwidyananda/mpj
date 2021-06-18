<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="col-lg-12">

        <!-- Quick stats boxes -->
        <div class="row">
          <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-teal-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $level_users->num_rows(); ?></h3>
                Jumlah User yang daftar
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

          <div class="col-lg-4">

            <!-- Current server load -->
            <div class="panel bg-pink-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $jml_proyek; ?></h3>
                Jumlah Project yang diinput
              </div>

              <div id="server-load"></div>
            </div>
            <!-- /current server load -->

          </div>

          <div class="col-lg-4">

            <!-- Today's revenue -->
            <div class="panel bg-blue-400">
              <div class="panel-body">

                <h3 class="no-margin"><?php echo $jml_progress; ?></h3>
                Jumlah Progress Keseluruhan
              </div>

              <div id="today-revenue"></div>
            </div>
            <!-- /today's revenue -->

          </div>
        </div>

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
