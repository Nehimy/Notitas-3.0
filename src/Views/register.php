<?php
 include 'header.php';
?>

<! DOCTYPE html>
<html>
  <head>
  </head>
  <body>
    <!--Contenedor-->
    <div id="sky-blue-set">
      <div class="transparent-set">
        <div class="white-set">
        </div>
      </div>
    </div>
    <!--Contenedor-->
    <!--Cortina-->
    <div class="bglayer" style="display: block;">
    </div>
    <!--Cortina-->
    <!--Formulario-->
    <div class="box-form color-register">
      <div class="box2-form color-register">
        <form method="POST">
          <p class="titulo login-title">Registro</p>
          <p  class="titulo" for="name">Nombre:</p>
          <input type="text" name="name" value="" required>
          <p class="titulo" for="name">Correo:</p>
          <input type="email" name="mail" value="" required>
          <p class="titulo" for="password">contraseña:</p>
          <input type="password" name="password" value="" required>
          <!--<input id="center" type="checkbox" name="admin">Admin -->
          <input class="boton boton-login" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save">
        </form>
      </div>
    </div>
    <!--Formulario-->
  </body>
</html>
