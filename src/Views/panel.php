<?php
	include 'header.php';
?>
  <div class="row">
    <div class="col s3">       
      <ul class="list">
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>panel-users"> Todos los usuarios
          </a>
        </li>
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>panel-notes"> Todas las notas
          </a>	
        </li>
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>new"> Lo de más allá...
          </a>	
        </li>
      </ul>
    </div>
    <div class="col s9">
  </div>
<?php
	include 'footer.html';
?>
