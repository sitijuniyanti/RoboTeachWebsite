<aside class="main-sidebar">
   <!-- sidebar: style can be found in sidebar.less -->
   <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
         <div class="pull-left image">
            <img src="<?= assets_Url('img/admin.jpg'); ?>" class="img-circle" alt="User Image">
         </div>
         <div class="pull-left info">
            <p>Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

         <li>
            <a href="index.php?hal=dashboard">
               <i class="fa fa-home"></i> <span>Dashboard</span>
            </a>
         </li>

         <li>
            <a href="index.php?hal=data_pengajar">
               <i class="fa fa-users"></i> <span>Data Pengajar</span>
            </a>
         </li>

         <li>
            <a href="index.php?hal=data_sekolah">
               <i class="fa fa-users"></i> <span>Data Sekolah</span>
            </a>
         </li>

         <li class="treeview">
            <a href="#">
               <i class="fa fa-dashboard"></i> <span>Data Penjadwalan</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
               </span>
            </a>
            <ul class="treeview-menu">
               <li><a href="index.php?hal=data_jadwal"><i class="fa fa-circle-o"></i> Data Jadwal</a></li>
               <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Data Jadwal Pengajar</a></li>
            </ul>
         </li>

         <li>
            <a href="index.php?hal=siswa">
               <i class="fa fa-users"></i> <span>Data Peralatan</span>
            </a>
         </li>

         <li>
            <a href="index.php?hal=siswa">
               <i class="fa fa-users"></i> <span>Data Monitoring Pengajar</span>
            </a>
         </li>

      </ul>
   </section>
   <!-- /.sidebar -->
</aside>