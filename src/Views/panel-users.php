<div class="users">
  <?php
  //Obtener el id del usuario
  foreach($view->users as $users){
  ?>
    <div class="user">
      <div class="container-title">
        <div class="container-emoji">
          <!-- delete user -->
          <a class="delete-emoji" href="<?=SITE_URL?>user/<?=$users->id?>/remove">
            <img src="<?=SITE_URL?>css/Delete.svg" alt="Delete user" title="Eliminar usuario">
          </a>
          <!-- edit user -->
          <a class="edit-emoji" href="<?=SITE_URL?>user/<?=$users->id?>/edit">
            <img src="<?=SITE_URL?>css/Edit.svg" alt="Edit user" title="Editar usuario">
          </a>
        </div>

        <!--name -->
        <div class="second-container-title">
          <a class="title-nick" href="<?=SITE_URL?>user/<?=$users->id?>/view">
            <?=$users->nick; ?>
          </a>
        </div>
      </div>
      <!--Avatar-->
      <div class="container-avatar-user">
        <?php
        if(isset($view->avatar)){
        ?>
          <img class="avatar" src="https://www.gravatar.com/avatar/<?=$view->avatar?>" alt="Avatar">
        <?php
        }else{
        ?>
          <img class="avatar2"
               src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=https://i.imgur.com/nTgwSKj.png"
               alt="Avatar default" />
        <?php
        }
        ?>
      </div>
    </div>


<?php
// llave del foreach
}
?>
</div>


<!-- Botones -->
<div class="container-next-back">
  <!-- BACK-->
  <?php
  if(isset($view->back)){
  ?>
    <a class="button-next-back"
       href="<?=SITE_URL?>p<?=$view->back?>"> Back </a>
  <?php
  }
  ?>
  <!-- NEXT-->
  <?php
  if(isset($view->next)){
  ?>
    <a href="<?=SITE_URL?>p<?=$view->next?>"> Next </a>
  <?php
  }
  ?>
</div>
