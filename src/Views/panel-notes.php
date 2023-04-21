<?php
/*Borrar en un futuro*/
if(($view->admin)){
  include 'panel.php';
}else{
  //include 'header.php';
}
?>
<div class="notes">
  <?php
  foreach($view->notitas as $notas){
  ?>
    <div class="note <?=$notas->color?>">
      <!--Botón de eliminar -->
      <div class="delete-button">
        <a href="<?=SITE_URL?>note/<?=$notas->id?>/remove/admin">
          <img class="delete-emoji" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
        </a>
      </div>
      <!-- Ver la nota -->
      <div class="title-box">
        <a class="url" href="<?=SITE_URL?>note/<?=$notas->id?>">
          <?=$notas->title; ?>
        </a>
      </div>
      <div class="text-content">
        <?=$notas->content;?>
      </div>
    </div>
  <?php
  }//llave de sierre del foreach
  ?>
</div>
