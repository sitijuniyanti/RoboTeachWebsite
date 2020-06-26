<?php
$linkcss['core'] = [
                    "bootstrap3"=>"css/bootstrap3/bootstrap.min.css", 
                    "font-awesome"=>"css/fontawesome/css/font-awesome.min.css",
                    "ionicons"=>"css/ionicon/ionicons.min.css",
                    "AdminLTE"=>"css/adminlte/AdminLTE.min.css",
                    "all-skins"=>"css/skins/_all-skins.min.css",
                    "select2"=>"select2/dist/css/select2.min.css"];
$linkcss['plugin'] = [
                    "wysihtml5"=>"plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"];
foreach($linkcss['core'] as $key=>$value){?>
    <link rel='stylesheet' href='<?=baseUrl("assets/$value")?>'>

<?php
}

foreach($linkcss['plugin'] as $key=>$value){?>
    <link rel='stylesheet' href='<?=baseUrl("assets/$value")?>'>
<?php
}

?>