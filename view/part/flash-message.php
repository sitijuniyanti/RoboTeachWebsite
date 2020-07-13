<?php
$msgStatus = isset($_SESSION['flash_message']['status']) ? $_SESSION['flash_message']['status'] : "";
$msgTitle = isset($_SESSION['flash_message']['title']) ? $_SESSION['flash_message']['title'] : "";
$message = isset($_SESSION['flash_message']['message']) ? $_SESSION['flash_message']['message'] : "";
$msgType = isset($_SESSION['flash_message']['type']) ? $_SESSION['flash_message']['type'] : "";
$msgIcon = 'fa-info';
switch ($msgStatus) {
   case 'error':
      $msgStatus = 'danger';
      $msgIcon = 'fa-ban';
      break;
   case 'warning':
      $msgStatus = 'warning';
      $msgIcon = 'fa-warning';
      break;
   case 'success':
      $msgStatus = 'success';
      $msgIcon = 'fa-check';
      break;
   case 'info':
      $msgStatus = 'info';
      $msgIcon = 'fa-info';
      break;
   default:
      $msgStatus = 'danger';
      break;
}
?>
<?php if ($msgType == 'alert') : ?>
   <div style="border-radius:0;" class="alert alert-<?= $msgStatus ?> alert-dismissible ">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa <?= $msgIcon ?>"></i><?= $msgTitle ?></h4>
      <p><?= $message ?></p>
   </div>
<?php endif ?>
<?php if ($msgType == 'callout') : ?>
   <div style="border-radius:0;" class="callout callout-<?= $msgStatus ?>">
      <h4><?= $msgTitle ?></h4>
      <p><?= $message ?></p>
   </div>
<?php endif ?>
<?php
if (isset($_SESSION['flash_message'])) {
   unset($_SESSION['flash_message']);
}
?>