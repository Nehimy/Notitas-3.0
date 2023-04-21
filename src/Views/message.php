<?php
include 'header.php';
?>
<div class="container-login">
  <div class="container-form-login">
    <div class="container-login-white">
      <div class="text"><?php echo $view->content ?> </div>
      <a class="botton bt-menssage" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)"
         href="<?=SITE_URL.$view->url?>"> <?php echo $view->button ?>
      </a>
      <!-- - </button> -->
    </div>
  </div>
</div>
<?php
?>
