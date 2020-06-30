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
            <form class="form-horizontal" name="form" action= "../../proses/aksiTambahSekolah.php" method="POST">
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
                    <input type="text" id="namasekolah" name="nama_sekolah" class="form-control" placeholder="Nama Sekolah">
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-8">
                    <textarea type="text" id="alamat" name="alamat_sekolah" class="form-control" placeholder="Alamat"> </textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Penanggung Jawab</label>

                  <div class="col-sm-8">
                    <input type="text" id="nama_pj" name="nama_penanggungjawab" class="form-control" placeholder="Nama Penanggung Jawab">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nomor Handphone</label>

                  <div class="col-sm-8">
                    <input type="text" id="nohppj" name="no_hp_pj" class="form-control" placeholder="Nomor Handphone">
                  </div>
                </div>



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