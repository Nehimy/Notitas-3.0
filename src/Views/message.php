<?php
include 'header.php';
?>
<div class="container-login">
  <div class="container-form-login message-container-transparent">
    <div class="container-login-white message-container-white">
      <p><?php echo $view->content ?> </p>
      <div class="container-bt-menssage">
        <a class="botton bt-menssage"<
           href="<?=SITE_URL.$view->url?>"> <?php echo $view->button ?>
        </a>
      </div>
    </div>
  </div>
</div>
<?php
?>
