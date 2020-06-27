<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Data Jadwal
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Data Sekolah</a></li>
      <li class="active">Tambah Data Jadwal</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Data Jadwal</h3>
          </div>

          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" name="form" action="../../proses/aksiTambahJadwal.php" method="POST">
            <div class="box-body">
              <?php
              require_once "../../helper/flash_message.php";
              ?>

              <div class="form-group">
                <label type="text" class="col-sm-2 control-label">Id Sekolah</label>

                <div class="col-sm-8">
                  <input type="text" id="idsekolah" name="id_sekolah" class="form-control" placeholder="Id Sekolah">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Sekolah</label>

                <div class="col-sm-8">
                  <input type="text" id="namasekolah" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah" disabled>
                </div>
              </div>


              <div class="form-group">
                <label class="col-sm-2 control-label">Alamat</label>

                <div class="col-sm-8">
                  <textarea type="text" id="alamat" name="alamat_sekolah" class="form-control" placeholder="Alamat" disabled> </textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Hari</label>

                <div class="col-sm-8">
                  <input type="text" id="hari" name="hari" class="form-control" placeholder="Hari">
                </div>
              </div>
              <!-- aaf -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Date</label>
                <div class="col-sm-8">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Date & time range</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservationtime">
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <!-- end aaf -->

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control datepicker datetimepicker-input" data-toggle="datetimepicker" data-target=".datepicker" />
                </div>
              </div>
              <!-- /.input group -->

              <!-- kayanya ini harus dihapus sih -->
              <!-- <div class="form-group">
                <div class='input-group date' id='datetimepicker11'>
                  <input type='text' class="form-control" />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                  </span>
                </div>
              </div> -->

              <div class="form-group">
                <label class="col-sm-2 control-label">Latitude</label>

                <div class="col-sm-8">
                  <input type="text" id="latitude" name="lat_sekolah" class="form-control" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Longitude</label>

                <div class="col-sm-8">
                  <input type="text" id="longitude" name="long_sekolah" class="form-control" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Username</label>

                <div class="col-sm-8">
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>

                <div class="col-sm-8">
                  <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                </div>
              </div>



            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <label class="col-sm-2 control-label"></label>
              <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
            </div>
        </div>
      </div>
      </form>
    </div>
    <!-- /.box -->
</div>
</section>
</div>