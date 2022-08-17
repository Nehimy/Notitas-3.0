<?php
 include 'panel.php';
?>

<div class="col s9">
  <form method="GET">
    <input id="mysearch" placeholder="Search" type="text" name="search" required="" value="">
    <div class="searchBoton">
      <img class="search" src="http://prueba.ney/css/search.svg" alt="Notitas 2.0">
      <input class="boton-search" type="submit" value="">
    </div>
  </form>
  <div class="transparent-box">
    <div class="white-box">
      <!--white-box-->
      <?php
      //Obtener el id del usuario
      foreach($view->users as $users){
        //}
      ?>
      <div class="user-box">
        <div class="delete-button">
          <a href="<?=SITE_URL?>user/<?=$users->id?>/edit">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Edit.svg" alt="Editar notita" title="Editar notita">
          </a>
          <a href="<?=SITE_URL?>user/<?=$users->id?>/remove">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
        <!--Botón de eliminar -->
        <div class="title-box">
          <a onmouseover="colorTitleOver(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>user/<?=$users->id?>/view">
            <?=$users->nick; ?>
          </a>
        </div>
      </div>
      <?php
      }
      ?>
      <!--white-box-->
    </div>
  </div>
</div>
<script src="<?=SITE_URL?>js/script.js"></script>
<?php
 include 'footer.html';
?>
