
<!-- Main content -->
<div class="content-wrapper">
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->

    <div class="row">
      <!-- Basic datatable -->
      <div class="col-md-3"></div>
      <div class="panel panel-flat col-md-6">
        <div class="panel-heading">
          <h5 class="panel-title">Tulis Pesan ke <b>Admin</b></h5>
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
            <form action="" method="post">
              <textarea name="isi" class="form-control" rows="8" cols="80" placeholder="Tulis Pesan Anda . . ." required autofocus></textarea>

              <a href="users/pesan" class="btn btn-default">Kembali</a>
              <input type="submit" name="btnkirim" class="btn btn-primary" value="Kirim" style="float:right;">
              <br><br>
            </form>

            <hr>


          </div>

      </div>
    </div>
