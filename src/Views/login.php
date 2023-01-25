<?php
 include 'body.php';
?>


<div class="bglayer" style="display: block;">
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




<!--Formulario-->
