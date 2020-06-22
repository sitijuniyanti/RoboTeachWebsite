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
        Tambah Data Sekolah
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Sekolah</a></li>
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
              <h3 class="box-title">Form Tambah Data Sekolah</h3>
            </div>
            
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label type="text" class="col-sm-2 control-label">Id Sekolah</label>

                  <div class="col-sm-8">
                    <input type="text" id="idsekolah" class="form-control" placeholder="Id Sekolah">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Sekolah</label>

                  <div class="col-sm-8">
                    <input type="text" id="namasekolah" class="form-control" placeholder="Nama Sekolah">
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-8">
                    <textarea type="text" id="alamat" class="form-control" placeholder="Alamat"> </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Penanggung Jawab</label>

                  <div class="col-sm-8">
                    <input type="number" id="nama_pj" class="form-control" placeholder="Nama Penanggung Jawab">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Handphone</label>

                  <div class="col-sm-8">
                    <input type="number" id="nohppj" class="form-control" placeholder="Nomor Handphone">
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-2 control-label">Latitude</label>

                  <div class="col-sm-8">
                    <input type="number" id="latitude" class="form-control" placeholder="">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Longitude</label>

                  <div class="col-sm-8">
                    <input type="number" id="longitude" class="form-control" placeholder="">
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