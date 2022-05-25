<?php
	include 'panel.php';
?>




<div class="col s9">
  <div class="transparent-box">
	  <div class="white-box">
	    <?php
	      foreach($view->all as $users){
	        echo "$users->nick";
	        echo "<br>";
        }
      ?>
    </div>
	</div>
</div>
