<?php
include 'panel.php';
?>
<div class="col s9">
  <div class="transparent-box">
    <div class="white-box">
      <div class=" user-box user-box-edit">
        <form method="POST" action="<?=SITE_URL?>user/<?=$view->editUser->id?>/update">
          <div class="box-input">
            <input type="text" name ="mail" value= "<?=$view->editUser->mail?>">
            <input class="input-edit-user" type="text" name ="password" value= "">
            <input class="boton position" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save" >
          </div>
        </form>
      </div>
    </div>
  </div>
</div>