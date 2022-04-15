<?php
	include 'header.php';
?>
	<!--Contenedor-->
	<div id="sky-blue-set">
	  <div class="transparent-set">
		  <div class="white-set">
			   <?php
				  foreach($view->notitas as $nota){
			  ?>
			  <div class="note <?=$nota->color?>">
				  <!--Botón de eliminar -->
				  <div class="delete-button">
					  <a href="<?=SITE_URL?>note/<?=$nota->id?>/remove">
						  <img onmouseover="bigImg(this)" onmouseout="normalImg(this)" src="<?=SITE_URL?>css/Delete.svg" alt="Delete notita" title="Delete notita">
					  </a>	
				  </div>
				  <!--Botón de eliminar -->
				  <div class="title-box">				
						  <a onmouseover="colorTitleOver(this)" onmouseout="colorTitleOut(this)" href="<?=SITE_URL?>note/<?=$nota->id?>">
							  <?=$nota->title; ?>
						  </a>					
				  </div>
				  <div class="font-index">
				    <?=$nota->content;?>
				  </div> 
			  </div>			
			  <?php
				  }
			  ?>
			  </div>
			</div>
		</div>
		<script src="<?=SITE_URL?>js/script.js"></script>
<?php
	include 'footer.html';
?>

