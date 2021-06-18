<!-- Advanced login -->

  <div class="panel panel-body login-form">

    <form action="#" id="form-lanjut" class="form-horizontal">

      <div class="text-center">
        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
        <h5 class="content-group">Form Daftar <small class="display-block">Silahkan daftar</small></h5>
        
        <div id="msg"></div>

      </div>

      <hr>
              <div class="form-group has-feedback has-feedback-left">
          <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" id="nama" required>
          <div class="form-control-feedback">
            <i class="icon-user-check text-muted"></i>
          </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
          <input type="email" class="form-control" placeholder="Masukkan Email" name="email" id="email" required>
          <div class="form-control-feedback">
            <i class="icon-mention text-muted"></i>
          </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
          <input type="text" class="form-control" placeholder="Masukkan Username" name="username" id="username" required>
          <div class="form-control-feedback">
            <i class="icon-user-check text-muted"></i>
          </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
          <input type="password" class="form-control" placeholder="Masukkan Password" name="password" id="password" required>
          <div class="form-control-feedback">
            <i class="icon-user-lock text-muted"></i>
          </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
          <input type="password" class="form-control" placeholder="Ulangi Password" name="password2" id="password2" required>
          <div class="form-control-feedback">
            <i class="icon-user-lock text-muted"></i>
          </div>
        </div>

      <div class="form-group has-feedback has-feedback-right">
        <a href="" class="btn btn-default"><i class="icon-circle-left2 position-left"></i> Kembali</a>
        <button type="submit" class="btn btn-success" name="btndaftar" id="btndaftar" value="Daftar" style="float:right;"> Daftar <i class="icon-circle-right2 position-right"></i></button>
        <br><br>
        <hr>
      </div>
            </div>
          </div>
          </div>
        </div>
    </form>
</div>
</div>

  <script type="text/javascript">
  $(document).ready(function() {
    $('#data').hide();

      $('#btndaftar').click(function(){
       var btndaftar  = $('#btndaftar');
       var nama       = $('#nama');
       var email      = $('#email');
       var username   = $('#username');
       var password   = $('#password');
       var password2  = $('#password2');
       var re         = "";

       if(email.val() != ''  && re != /\S+@\S+\.\S+/ && username.val() != '' && password.val() != '' && password2.val() != ''){

          $.ajax({
          type : 'POST',
          data :$('#form-daftar').serialize(),
          url  : '<?php echo base_url(); ?>web/proses_daftar',
          cache: false,
          dataType: "JSON",
          beforeSend: function() {
              $('#btndaftar').html('Proses... <i class="icon-spinner6 position-right"></i>');
              $('#btndaftar').attr('disabled',true);
          },
          success: function(data){

            if (data.status == "gagal") {
              // $("#msg").hide();
              // $("#msg").html('');
              $("#msg2").show();
              $("#msg2").html(data.pesan2);
            }else{

              $('#form-daftar')[0].reset();

              $("#data").hide();

              $('[name="nama"]').focus();

              $("#msg").show();
              $("#msg").html(data.pesan2);

              $("#msg2").hide();
              $("#msg2").html('');

            }

              $('#btndaftar').html('Daftar <i class="icon-envelop3 position-right"></i>');
              $('#btndaftar').attr('disabled',false);
          }
        });
       }
       //return false;
      });


  });

  </script>
