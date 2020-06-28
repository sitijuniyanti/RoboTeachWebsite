<script src="<?= assets('jquery/jquery.min.js') ?>"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->
<script src="<?= assets('bootstrap-3-3-7/js/bootstrap.min.js') ?>"></script>
<script src="<?= assets('fastclick/lib/fastclick.js') ?>"></script>
<script src="<?= assets('admin-lte/js/adminlte.min.js') ?>"></script>
<script src="<?= assets('jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<script src="<?= assets('jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<?php
$link_js["tambah_jadwal"] = [
  "moment/min/moment.min.js",
  "bootstrap-daterangepicker/daterangepicker.js",
  "bootstrap-datepicker/js/bootstrap-datepicker.min.js"
];

if (isset($link_js[$_GET['hal']])) {
  foreach ($link_js[$_GET['hal']] as $value) {
?>
    <script src="<?= assets($value) ?>"></script>
<?php
  }
}
?>