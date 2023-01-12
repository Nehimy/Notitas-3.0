<?php
 include 'panel.php';
 ?>
<div class="col s9">
  <div class="transparent-box">
    <div class="white-box">
      <div class=" user-box user-box-edit">
        <div class="box-input">
          <div class="box-iconos">
            <a href="<?=SITE_URL?>user/<?=$view->user->id?>/edit">
              <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
            </a>
            <a href="<?=SITE_URL?>user/<?=$view->user->id?>/remove">
              <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
            </a>
          </div>
          <div class="title-of-view">
            <div class="view-user">
              <?=$view->user->nick?>
            </div>
            <div class="view-user">
              <?=$view->user->mail?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
