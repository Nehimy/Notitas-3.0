<div class="container-see-note">
  <div class="see-note single-note <?=$view->notita->color?>">
    <div class="container-title">
      <a class="eddit" href="<?=SITE_URL?>note/<?=$view->notita->id?>/edit">
        <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
             src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
      </a>
      <a class="delete" href="<?=SITE_URL?>note/<?=$view->notita->id?>/remove">
        <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
             src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
      </a>
      <div class="title">
        <?=$view->notita->title?>
      </div>
    </div>

    <div class="text-content one-note">
      <?=$view->notita->content?>
    </div>
  </div>
</div>

<script src="<?=SITE_URL?>js/script.js"></script>
