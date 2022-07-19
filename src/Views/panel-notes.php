<?php
 include 'panel.php';
?>
<div class="col s9">
  <div class="transparent-box">
    <div class="white-box">
      <?php
       foreach($view->notitas as $notas){
      ?>
      <div class="note <?=$notas->color?>">
        <!--Botón de eliminar -->
        <div class="delete-button">
          <a href="<?=SITE_URL?>note/<?=$notas->id?>/remove/admin">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
        <!-- Ver la nota -->
        <div class="title-box">
          <a onmouseover="colorTitleOver(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>note/<?=$notas->id?>">
            <?=$notas->title; ?>
          </a>
        </div>
        <div class="font-index">
          <?=$notas->content;?>
        </div>
      </div>
      <?php
       }
       $pg = $view->pg + 1;
      ?>
      <a class="color_text" href="<?=SITE_URL?>page<?=$pg?>">Next</a>
    </div>
  </div>
</div>
<?php
 include 'footer.html';
?>
