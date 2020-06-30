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
            <form class="form-horizontal" name="form" action= "../../proses/aksiTambahPengajar.php" method="POST">
              <div class="box-body">
              <?php
               require_once "../../helper/flash_message.php";
              ?>  
                <div class="form-group">
                  <label type="text" class="col-sm-2 control-label">Id Pengajar</label>

                  <div class="col-sm-8">
                    <input type="text" id="idpengajar" name="id_pengajar" class="form-control" placeholder="Id Pengajar">
                  </div>
                </div>


                <div class="form-group">
                <label class="col-sm-2 control-label">Status</label>
                <div class="col-sm-8">
                <select class="form-control select2" style="width: 100%;" name="status">
                  <option selected="selected">-</option>
                  <option value="Tetap">Tetap</option>
                  <option value="Freelance">Freelance</option>
                </select>
                </div>
                </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-8">
                    <input id="email" name="email" class="form-control" placeholder="Email">
                  </div>
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