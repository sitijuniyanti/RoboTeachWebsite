<?php
$linkjs['core'] = [
                    "jquery3"=>"jquery/dist/jquery.min.js",
                    "jquery-ui"=>"jquery-ui/jquery-ui.min.js",
                    "bootstrap"=>"bootstrap/dist/js/bootstrap.min.js",
                    "adminlte"=>"adminlte/js/adminlte.min.js",
                    "moment"=>"moment/moment.min.js",
                    "daterangepicker"=>"bootstrap-daterangepicker/daterangepicker.js",
                    "datepicker"=>"bootstrap-datepicker/bootstrap-datepicker.min.js",
                    "tempusdominus"=>"tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js",
                    "custom"=>"bootstrap-datepicker/custom.js"];
$linkjs['plugin'] = [
                    "wysihtml5"=>"plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
                    "timepicker"=>"plugins/timepicker/bootstrap-timepicker.min.js"];
foreach($linkjs['core'] as $key=>$value){?>
    <script src="<?=baseUrl("assets/js/$value")?>">
    </script>
<?php
}

foreach($linkjs['plugin'] as $key=>$value){?>
    <script src="<?=baseUrl("assets/$value")?>">
    </script>

<?php
}

?>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>