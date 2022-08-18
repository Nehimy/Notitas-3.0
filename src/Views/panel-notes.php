<?php
if(($view->admin)){
  include 'panel.php';
}else{
  include 'header.php';
}

?>
<div class="row">
  <?php
  echo $view->admin? '<div class="col s9">' : '<div class="col s9otro">';
  ?>
  <!-- Search GET -->
  <form method="GET">
    <input id="mysearch" placeholder="Search" type="text" name="search" required="" value="">
    <div class="searchBoton">
      <img class="search" src="http://prueba.ney/css/search.svg" alt="Notitas 2.0">
      <input class="boton-search" type="submit" value="">
    </div>
  </form>
  <div class="transparent-box">
    <div class="white-box">
      <?php
      foreach($view->notitas as $notas){
      ?>
        <div class="note <?=$notas->color?>">
          <!--Botón de eliminar -->
          <div class="delete-button">
            <a href="<?=SITE_URL?>note/<?=$notas->id?>/remove/admin">
              <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
            </a>
          </div>

          <!-- Ver la nota -->
          <div class="title-box">
            <a onmouseover="colorTitleOver(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>note/<?=$notas->id?>">
              <?=$notas->title; ?>
            </a>
          </div>

          <div class="font-index">
            <?=$notas->content;?>
          </div>
        </div>
      <?php
      }//llave de sierre del foreach
      ?>
      <div class="button_container">
        <!-- BACK-->
        <?php
        if(isset($view->pgBack) ){
        ?>
          <button class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)">
            <a  href="<?=SITE_URL?>page<?=$view->pgBack?>"> Back </a>
          </button>
        <?php
        }
        ?>
        <!-- NEXT-->
        <?php
        if(isset($view->pgNext)){
        ?>
          <button class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)">
            <a href="<?=SITE_URL?>page<?=$view->pgNext?>"> Next </a>
          </button>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</div>
</div>
<?php
include 'footer.html';
?>
