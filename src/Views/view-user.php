<div class="first-contaniner-form">
  <div class="container-form-view-user">
    <div class="container-title-edit-user">
      <div class="container-emoji">
        <a href="<?=SITE_URL?>user/<?=$view->user->id?>/edit">
          <img src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
        </a>
        <a href="<?=SITE_URL?>user/<?=$view->user->id?>/remove">
          <img src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
        </a>
      </div>
      <div class="second-container-title-edit-user">
        <?=$view->user->nick?>
      </div>
    </div>
    <?=$view->user->mail?>
  </div>
</div>
