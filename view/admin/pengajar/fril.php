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
         <form class="form-horizontal" name="form" action="" method="POST">
            <div class="box-body">
               <?php
               require_once view_path('part/flash-message.php');
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
            <div class="box-footer">
               <label class="col-sm-2 control-label"></label>
               <button type="submit" name="simpan" class="btn btn-primary">Simpan Data</button>
            </div>
         </form>
      </div>
      <!-- /.box-body -->

   </div>
</div>