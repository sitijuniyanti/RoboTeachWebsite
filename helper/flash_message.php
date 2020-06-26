<?php
    $msgStatus=isset($_SESSION['message']['msg_status'])?$_SESSION['message']['msg_status']:"";
    $msgTitle=isset($_SESSION['message']['msg_title'])?$_SESSION['message']['msg_title']:"";
    $message =isset($_SESSION['message']['message'])?$_SESSION['message']['message']:"";
    $msgType =isset($_SESSION['message']['msg_type'])?$_SESSION['message']['msg_type']:"";
    $msgIcon='fa-info';
    switch ($msgStatus) {
      case 'error':
        $msgStatus='danger';
        $msgIcon='fa-ban';
        break;
      case 'warning':
        $msgStatus='warning';
        $msgIcon='fa-warning';
        break;
      case 'success':
        $msgStatus='success';
        $msgIcon='fa-check';
        break;
      case 'info':
        $msgStatus='info';
        $msgIcon='fa-info';
        break;
      default:
        $msgStatus='danger';
        break;
    }
?>
<?php if($msgType == 'alert'): ?>
<div style="border-radius:0;" class="alert alert-<?=$msgStatus ?> alert-dismissible ">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa <?=$msgIcon ?>"></i><?=$msgTitle ?></h4>
    <p><?=$message ?></p>
</div>
<?php endif ?>
<?php if($msgType == 'callout'): ?>
<div style="border-radius:0;" class="callout callout-<?=$msgStatus ?>">
    <h4><?=$msgTitle ?></h4>
    <p><?=$message ?></p>
</div>
<?php endif ?>
<?php 
if(isset($_SESSION['message'])){
    unset($_SESSION['message']);
}
?>