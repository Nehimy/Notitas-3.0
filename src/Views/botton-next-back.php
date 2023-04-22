<!-- Botton next and back-->
<div class="container-next-back">
  <?php
  if(isset($view->pgBack) ){
  ?>
    <div class="container-back">
      <a class="button-next-back"
         href="<?=SITE_URL?>page<?=$view->pgBack.$view->search?>"> Back </a>
    </div>
  <?php
  }
  ?>
  <?php
  if(isset($view->pgNext)){
  ?>
    <div class="container-next">
      <a class="button-next-back"
         href="<?=SITE_URL?>page<?=$view->pgNext.$view->search?>"> Next </a>
    </div>
  <?php
  }
  ?>
</div>
