<?php
 include 'header.php';
?>
<!--Contenedor-->
<div id="sky-blue-set">
  <div class="transparent-set">
    <div class="white-set">
      <div class="see-note <?=$view->notita->color?>">
        <div class="delete-view" >
          <a href="<?=SITE_URL?>note/<?=$view->notita->id?>/edit">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
          </a>
          <a href="<?=SITE_URL?>note/<?=$view->notita->id?>/remove">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
        <div class="title-of-view title-box-view"> <?=$view->notita->title?> </div>
        <div class="font">
          <?=$view->notita->content?>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?=SITE_URL?>js/script.js"></script>
<?php
 include 'footer.html';
?>
