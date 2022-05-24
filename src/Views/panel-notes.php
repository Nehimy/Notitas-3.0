<?php
	include 'header.php';
?>

      <?php
			  foreach($view->notitas as $notas){

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
			  }
			?>
<?php
	include 'footer.html';
?>
