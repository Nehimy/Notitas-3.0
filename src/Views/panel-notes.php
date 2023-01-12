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
  <div class="container-search">
    <form action="<?=SITE_URL?>panel-notes" class ="form-search" method="GET">
      <input id="mysearch" placeholder="Search" type="text" name="search" required="" value="">
      <div class="search-button">
        <img class="search" src="http://prueba.ney/css/search.svg" alt="Notitas 3.0">
        <input class="button-search" type="submit" value="">
      </div>
    </form>
  </div>
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
          <a class="text-a back-button-margin" id="go-back" onmouseover="SaveOver(this)"
             onmouseout="SaveOut(this)" href="<?=SITE_URL?>page<?=$view->pgBack.$view->search?>"> Back </a>
        <?php
        }
        ?>
        <!-- NEXT-->
        <?php
        if(isset($view->pgNext)){
        ?>
          <a class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)"
             href="<?=SITE_URL?>page<?=$view->pgNext.$view->search?>"> Next </a>
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
