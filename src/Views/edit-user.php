<?php
include 'panel.php';
?>
<div class="col s9">
  <div class="transparent-box">
    <div class="white-box">
      <div class=" user-box user-box-edit">
        <form method="POST" action="<?=SITE_URL?>user/<?=$view->user->id?>/update">
          <div class="box-input">
            <p class="titulo" for="name">Correo:</p>
            <input type="text" name ="mail" value= "<?=$view->user->mail?>">
            <p class="titulo" for="name">contraseña:</p>
            <input class="input-edit-user" type="text" name ="password" value= "">
            <input class="boton position" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save" >
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
