<?php
include_once "content.php";
	// session_start();

    // if(isset($_SESSION['level']) && $_SESSION['level']=="ADMIN"){
    // $level = $_SESSION['level'];

    // require_once '../config/koneksi.php';
    // $db   = new DbConnection();
    // $conn   = $db->connect();
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Pengajar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Pengajar</a></li>
        <li class="active">Tambah Data</li>
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
              <h3 class="box-title">Form Tambah Data Pengajar</h3>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label type="text" class="col-sm-2 control-label">Id Pengajar</label>

                  <div class="col-sm-8">
                    <input type="text" id="idpengajar" class="form-control" placeholder="Id Pengajar">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-8">
                    <input type="text" id="username" class="form-control" placeholder="Username">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Lengkap</label>

                  <div class="col-sm-8">
                    <input type="text" id="namalengkap" class="form-control" placeholder="Nama Lengkap">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Panggilan</label>

                  <div class="col-sm-8">
                    <input type="text" id="namapanggilan" class="form-control" placeholder="Nama Panggilan">
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-8">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">-</option>
                  <option>Tetap</option>
                  <option>Freelance</option>
                </select>
                </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-sm-8">
                <select class="form-control select2" style="width: 100%;">
                  <option selected="selected">-</option>
                  <option>Laki-laki</option>
                  <option>Perempuan</option>
                </select>
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>

                  <div class="col-sm-8">
                    <input type="text" id="tempatlahir" class="form-control" placeholder="Tempat Lahir">
                  </div>
                </div>

                <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal Lahir:</label>
                <div class="col-sm-8">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                </div>
                </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Handphone</label>

                  <div class="col-sm-8">
                    <input type="number" id="nohp" class="form-control" placeholder="Nomor Handphone">
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-8">
                    <textarea type="text" id="alamat" class="form-control" placeholder="Alamat"> </textarea>
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-8">
                    <input id="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun Join</label>

                  <div class="col-sm-8">
                    <input type="number" id="tahunjoin" class="form-control" placeholder="Tahun Join">
                  </div>
                </div>


              

                <div class="form-group">
                  <label class="col-sm-2 control-label">File input</label>
                  <div class="col-sm-10">
                  <input type="file" id="exampleInputFile">
                 </div>

                  <p class="help-block">Example block-level help text here.</p>
                </div>
                
                </div>
                </div>
                <!-- /.box-body -->
              <div class="box-footer">
              <label class="col-sm-2 control-label"></label>
                <button type="submit" class="btn btn-primary">Simpan Data</button>
              </div>
            </div>
            </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
</section>
</div>