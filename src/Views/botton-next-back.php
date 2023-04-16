<!-- Botton next and back-->
<div class="container-next-back">
  <?php
  if(isset($view->pgBack) ){
  ?>
    <a class="button-next-back" id="go-back" onmouseover="SaveOver(this)"
       onmouseout="SaveOut(this)" href="<?=SITE_URL?>page<?=$view->pgBack.$view->search?>"> Back </a>
  <?php
  }
  ?>
  <?php
  if(isset($view->pgNext)){
  ?>
    <a class="button-next-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)"
       href="<?=SITE_URL?>page<?=$view->pgNext.$view->search?>"> Next </a>
  <?php
  }
  ?>
</div>
<?php
include 'footer.html';
?>
