<?php
	include 'header.php';
?>

<html>
  <header>
  </header>
  <body>   
      <!--Contenedor-->
	    <div id="sky-blue-set">
	      <div class="transparent-set">
		      <div class="white-set">
        </div>
       </div>
      </div>

    <!--Cortina-->
    <div class="bglayer" style="display: block;">
    </div>
    <!--Cortina-->
    <!--Formulario-->
		<div class="box-form">
		  <div class="box2-form">
        <form method="POST">
          </p>Inicio de sesión<p>
          <?php if (isset($view->error)): ?>
          <div class="error-tip"><?=$view->error?></div>
          <?php endif; ?>
          <label for="name">Nombre:</label><br>
          <input type="text" name="name" value=""><br>
          <label for="password">Contraseña:</label><br>
          <input type="password" name="password" value=""><br><br>      
          <!--<input id="center" type="checkbox" name="admin">Admin -->
          <input type="submit" value="Save">
        </form>
      </div>
    </div>
    <!--Formulario-->
  <body>
<html>
