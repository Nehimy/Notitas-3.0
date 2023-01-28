<?php
include 'body.php';
if(($view->admin)){
  include 'panel.php';
}else{
  /*include 'header.php';*/
}

?>
<?php
/*echo $view->admin? '<div class="col s9">' : '<div class="col s9otro">';*/
?>
<!-- Search GET -->
<div class="content-container-user-panel">
  <div class="element-container">
  <div class="container-shearch">
    <form action="<?=SITE_URL?>panel-notes" class ="form-search" method="GET">
      <input placeholder="Search" type="text" name="search" required="" value="">
      <img class="search" src="<?=SITE_URL?>css/search.svg" alt="Notitas 3.0">
      <input class="button-search" type="submit" value="search">
    </form>
  </div>
    <?php
    foreach($view->notitas as $notas){
    ?>
      <div class="note <?=$notas->color?>">
        <div class="delete-button">        <!--Botón de eliminar -->
          <a href="<?=SITE_URL?>note/<?=$notas->id?>/remove/admin">
            <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
          </a>
        </div>
        <div class="title-box">        <!-- Ver la nota -->
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
    <div class="button_container">      <!-- BACK-->
      <?php
      if(isset($view->pgBack) ){
      ?>
        <a class="text-a back-button-margin" id="go-back" onmouseover="SaveOver(this)"
           onmouseout="SaveOut(this)" href="<?=SITE_URL?>page<?=$view->pgBack.$view->search?>"> Back </a>
      <?php
      }
      ?>
      <?php
      if(isset($view->pgNext)){
      ?>
        <a class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)"
           href="<?=SITE_URL?>page<?=$view->pgNext.$view->search?>"> Next </a>      <!-- NEXT-->
      <?php
      }
      ?>
    </div>
  </div>
</div>
<?php
include 'footer.html';
?>
