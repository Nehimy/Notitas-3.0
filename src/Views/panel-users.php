<?php
include 'panel.php';
?>

<div class="col s9">
  <!-- Search GET -->
  <div class="container-search">
    <form class="form-search" method="GET">
      <input id="mysearch" placeholder="Search" type="text" name="search" required="" value="">
      <div class="search-button">
          <img class="search" src="http://prueba.ney/css/search.svg" alt="Notitas 2.0">
          <input class="button-search" type="submit" value="">
        </div>
    </form>
  </div>
  <!-- Search GET -->
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
      <!-- Botones -->
      <div class="button_container">
        <!-- BACK-->
        <?php
        if(isset($view->back)){
        ?>
          <a class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)"
             href="<?=SITE_URL?>p<?=$view->back?>"> Back </a>
        <?php
        }
        ?>
        <!-- NEXT-->
        <?php
        if(isset($view->next)){
        ?>
           <a class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" href="<?=SITE_URL?>p<?=$view->next?>"> Next </a>
        <?php
        }
        ?>
      </div>
      <!-- Botones -->
      <!--white-box-->
    </div>
  </div>
</div>
<script src="<?=SITE_URL?>js/script.js"></script>
<?php
 include 'footer.html';
?>
