<div class="container-see-note">
  <div class="see-note single-note <?=$view->notita->color?>">
    <!-- container title -->
    <div class="container-title">
      <!-- container emoji -->
      <div class="container-emoji">
        <a href="<?=SITE_URL?>note/<?=$view->notita->id?>/edit">
          <img class="edit-emoji"
               src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
          </a>
          <a href="<?=SITE_URL?>note/<?=$view->notita->id?>/remove">
            <img class="delete-emoji"
                 src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
      </div>
      <div class="second-container-title">
        <div class="title">
          <?=$view->notita->title?>
        </div>
      </div>
    </div>
    <div class="container-content-note text-content">
      <?=$view->notita->content?>
    </div>

  </div>
</div>
