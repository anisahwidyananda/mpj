<!-- Main content -->
<div class="content-wrapper">
  <br><br><br>
  <!-- Content area -->
  <div class="content">

    <!-- Dashboard content -->
    <div class="row">
      <div class="panel panel-flat col-md-12">

          <div class="panel-body">
            <fieldset class="content-group">
              <legend class="text-bold">Lihat Grafik Perbulan</legend>

              <?php
              $link_id1 = strtolower($this->uri->segment(3));
              $link_id2 = strtolower($this->uri->segment(4));?>


              <form class="form-horizontal" action="" method="post">
                <div class="col-md-1" style="text-align:right;"><b>Pilih Proyek</b></div>
                <div class="col-md-2">
                    <select class="form-control" name="project" required>
                      <option value="0">-- Pilih Proyek --</option>
                      <?php
                      foreach ($project->result() as $p) {
                      ?>
                        <option value="<?php echo $p->project_id; ?>" <?php if($link_id1 == $p->project_id){echo "selected";} ?>><?php echo $p->project_nama; ?></option>
                      <?php
                      } ?>
                    </select>
                </div>

                <div class="col-md-1" style="text-align:right;"><b>Tahun</b></div>
                <div class="col-md-2">
                    <select class="form-control" name="tahun" required>
                      <?php
                      $max = date('Y');
                      for ($i=2019; $i <= $max; $i++) {
                        if ($i == substr($link_id2,3,7)) {
                          $sel = "selected";
                        }else{
                          $sel = "";
                        }
                      ?>
                        <option value="<?php echo $i; ?>" <?php echo $sel; ?>><?php echo $i; ?></option>
                      <?php
                      } ?>
                    </select>
                </div>
                

                <div class="col-md-2">
                    <button type="submit" name="btncek" class="btn btn-default">Cek</button>
                </div>
              </form>

              </b></div>
              <div id="progress_bulan"></div>
              <div class="panel-body">
                <div id ="grafik"></div>
              </div>


                          <div class="col-md-12">
                            <a href="" class="btn btn-default" style="float:right;">Beranda</a>
                          </div>

            </fieldset>

          </div>

      </div>

    </div>
    <?php 
      $plan = array();
      $actual = array();
      $tanggal = array();
      if (isset($data)) {
        foreach ($data as $key => $value) {
          $plan[] = (float) $value->progress_bulan_plan;
          $actual[] = (float) $value->progress_bulan_actual;
          $tanggal[] = DATE("F",strtotime($value->progress_bulan_bulan));
        }
      }
    ?>

    <script src="assets/js/linechart/highcharts.js"></script>
    <script src="assets/js/linechart/exporting.js"></script>
    <script type="text/javascript">
       Highcharts.chart('progress_bulan', {
        chart: {
            type: 'area'
        },
        title: {
            text: 'Grafik Progress Bulan'
        },
        subtitle: {
            text: 'Project'
        },
        xAxis: {
            categories: <?=json_encode($tanggal)?>,
            tickmarkPlacement: 'on',
            title: {
                enabled: false
            }
        },
        yAxis: {
            title: {
                text: 'Progress'
            },
            labels: {
                formatter: function () {
                    return this.value;
                }
            }
        },
        tooltip: {
            split: true,
            valueSuffix: ''
        },
        plotOptions: {
            area: {
                stacking: 'normal',
                lineColor: '#666666',
                lineWidth: 1,
                marker: {
                    lineWidth: 1,
                    lineColor: '#666666'
                }
            }
        },
        series: [{
            name: 'Plan Progress',
            data: <?=json_encode($plan)?>
        }, {
            name: 'Actual Progress',
            data: <?=json_encode($actual)?>
        }]
    });
    </script>
    <!-- /dashboard content -->
