<?php
$db = new DbConnection();
$conn = $db->connect();
$datasekolah = $db ->lihat_sekolah();
?>
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
              foreach($datasekolah as $row){
              ?>
              <div class="form-group">
              <label type="text" class="col-sm-2 control-label">Nama Sekolah</label>
              <div class="col-sm-8">
                <select class="form-control select2" style="width: 100%;" name="id_sekolah" id="id_sekolah">
                  <option value="" selected="selected">Pilih Nama Sekolah</option>
                  <option value="<?php echo $row['id_sekolah']?>"><?php echo $row['id_sekolah']?> - <?php echo $row['nama_sekolah']?></option>
                </select>
              
                </div>
              </div>

              <?php }?>

              <div class="form-group">
              <label type="text" class="col-sm-2 control-label">Hari</label>
              <div class="col-sm-8">
                <select class="form-control select2" style="width: 100%;" name="hari" id="hari">
                  <option value="" selected="selected">Pilih Hari</option>
                  <option value="senin">Senin</option>
                  <option value="selasa">Selasa</option>
                  <option value="rabu">Rabu</option>
                  <option value="kamis">Kamis</option>
                  <option value="jumat">Jumat</option>
                  <option value="sabtu">Sabtu</option>
                  <option value="minggu">Minggu</option>
                </select>
              
                </div>
              </div>
              <!-- aaf -->
              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-8">
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="tanggal">
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Waktu Mulai - Selesai</label>
                <div class="col-sm-8">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="reservationtime" name="waktu_mulai_selesai">
                  </div>
                </div>
                <!-- /.input group -->
              </div>
              <!-- end aaf -->

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


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <label class="col-sm-2 control-label"></label>
              <button type="submit" name="simpan" class="btn btn-primary" id="btnsimpan">Simpan Data</button>
            </div>
        </div>
      </div>
      </form>
    </div>
    <!-- /.box -->