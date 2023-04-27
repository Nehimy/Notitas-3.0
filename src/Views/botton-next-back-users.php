<!-- Botton next and back-->
<div class="container-next-back">
  <?php
  if(isset($view->back) ){
  ?>
    <div class="container-back">
      <a class="button-next-back"
         href="<?=SITE_URL?>p<?=$view->back.$view->search?>"> Back </a>
    </div>
  <?php
  }
  ?>
  <?php
  if(isset($view->next)){
  ?>
    <div class="container-next">
      <a class="button-next-back"
         href="<?=SITE_URL?>p<?=$view->next.$view->search?>"> Next </a>
    </div>
  <?php
  }
  ?>
</div>
