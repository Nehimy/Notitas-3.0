<?php
    include 'panel.php';
?>
<div class="col s9">
  <div class="transparent-box">
    <div class="white-box">
      <?php

       $mitad = round(count($view->lastNotes)/ 2);
      foreach($view->lastNotes as $notes){
      ?>
      <div class="note <?=$notes->color?>">
        <!--Botón de eliminar -->
        <div class="delete-button">
          <a href="<?=SITE_URL?>note/<?=$notes->id?>/remove/admin">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
        <!--Botón de eliminar -->
        <div class="title-box">
          <a onmouseover="colorTitleOver(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>note/<?=$notes->id?>">
            <?=$notes->title; ?>
          </a>
        </div>
        <div class="font-index">
          <?=$notes->content;?>
        </div>
      </div>
      <?php
       }
       ?>
    </div>
  </div>
</div>
<?php
    include 'footer.html';
?>