<?php
$linkjs['core'] = [
                    "jquery3"=>"jquery/dist/jquery.min.js",
                    "jquery-ui"=>"jquery-ui/jquery-ui.min.js",
                    "bootstrap"=>"bootstrap/dist/js/bootstrap.min.js",
                    "adminlte"=>"adminlte/js/adminlte.min.js"];
$linkjs['plugin'] = [
                    "wysihtml5"=>"plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"];
foreach($linkjs['core'] as $key=>$value){?>
    <script src="<?=baseUrl("assets/js/$value")?>">
    </script>
<?php
}

foreach($linkjs['plugin'] as $key=>$value){?>
    <script src="<?=baseUrl("assets/js/$value")?>">
    </script>

<?php
}

?>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>