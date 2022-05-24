<?php
	include 'header.php';
?>
  <div class="row">
    <div class="col s3">       
      <ul class="list">
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>panelusers"> Todos los usuarios
          </a>
        </li>
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>panel"> Todas las notas
          </a>	
        </li>
        <li class="option">
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>new"> Lo de más allá...
          </a>	
        </li>
      </ul>
    </div>
    <div class="col s9">
      <?php
        /*print_r($notas);
			  foreach($view->notitas as $notas){*/

		  ?>
			<div class="note <?=$notas->color?>">
		    <!--Botón de eliminar -->
				<div class="delete-button">
				  <a href="<?=SITE_URL?>note/<?=$notas->id?>/remove">
					  <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
					</a>	
				</div>
				<!--Botón de eliminar -->
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
			 // }
			?>
  </div>
<?php
	include 'footer.html';
?>
