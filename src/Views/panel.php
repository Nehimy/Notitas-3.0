<?php
	include 'header.php';
?>
  <div class="row">
    <div class="col s3">       
      <ul class="list">
        <li class="option">
          
          <div class="box">
            <form method="POST"  action="<?=SITE_URL?>search-for">
              <input id="mysearch" placeholder="Search" type="text" name="palabra" required="" value="">  
              <img class="search" src="http://prueba.ney/css/search.svg" alt="Notitas 2.0">
              <input class="boton-search" type="submit">
            </form>
          </div>
        </li>
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
  <script src="<?=SITE_URL?>js/script.js"></script>
<?php
	include 'footer.html';
?>
