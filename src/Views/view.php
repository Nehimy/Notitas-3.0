<div class="container-see-note">
  <div class="see-note single-note <?=$view->notita->color?>">
    <!-- container title -->
    <div class="container-title">
      <!-- container emoji -->
      <div class="container-emoji">
        <div class="container-eddit">
          <a class="eddit" href="<?=SITE_URL?>note/<?=$view->notita->id?>/edit">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
                 src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
          </a>
        </div>
        <div class="container-delete">
          <a class="delete" href="<?=SITE_URL?>note/<?=$view->notita->id?>/remove">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)"
                 src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
      </div>
      <div class="second-container-title">
        <div class="title">
          <?=$view->notita->title?>
        </div>
      </div>
    </div>
    <div class="container-content-note">
      <?=$view->notita->content?>
    </div>

  </div>

<script src="<?=SITE_URL?>js/script.js"></script>
