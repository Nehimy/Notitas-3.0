<?php
    include 'panel.php';
?>
<div class="col s9">
  <div class="transparent-box">
    <div class="white-box">
      <?php

       //$mitad = round(count($view->notitas)/ 2);
      foreach($view->notitas as $notes){
      ?>
      <div class="note <?=$notes->color?>">
        <!--Botón de eliminar -->
        <div class="delete-button">
          <a href="<?=SITE_URL?>note/<?=$notes->id?>/remove/admin">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
        <!--Botón de ver nota -->
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
       <a class="color_text" href="<?=SITE_URL?>page"> Next </a>
    </div>
  </div>
</div>
<?php
    include 'footer.html';
?>
