<?php
	include 'header.php';
?>
  <div class="row">
    <div class="col s3">       
      <ul class="list">
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" onmouseover="colorText(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>panel-users"> Todos los usuarios
          </a>
        </li>
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" onmouseover="colorText(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>panel-notes"> Todas las notas
          </a>	
        </li>
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" onmouseover="colorText(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>new"> Lo demás...
          </a>	
        </li>
      </ul>
    </div>
    <!--Contenedor-->
    <!--<div class="col s9">
      
	    <div class="transparent-box">
		    <div class="white-box">
        </div>
		  </div>
  </div>-->
  <script src="<?=SITE_URL?>js/script.js"></script>
<?php
	include 'footer.html';
?>
