<?php
include 'header.php';
?>
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
<div class="box-form">
  <div class="box2-form">
    <form method="POST">
      <p class="titulo login-title">Inicio de sesión</p>
      <?php if (isset($view->error)): ?>
      <p class="error-tip"><?=$view->error?></p>
      <?php endif; ?>
      <p class="titulo" for="name">Nombre:</p>
      <input type="text" name="name" value="">
      <p class="titulo" for="password">Contraseña:</p>
      <input type="password" name="password" value="">
      <input class="boton boton-login" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save">
    </form>
  </div>
</div>
<!--Formulario-->
