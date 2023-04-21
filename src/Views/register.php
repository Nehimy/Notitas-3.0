<?php
include 'header.php';
?>

<div class="container-login">
  <div class="container-form-login">
    <div class="container-login-white">
      <form method="POST">
      <p class="titulo login-title">Registro</p>
      <p  class="titulo" for="name">Nombre:</p>
      <input class="input-text" type="text" name="name" value="" required>
      <p class="titulo" for="name">Correo:</p>
      <input class="input-text" type="email" name="mail" value="" required>
      <p class="titulo" for="password">contraseña:</p>
      <input class="input-text" type="password" name="password" value="" required>
      <input class="botton" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save">
      </form>
    </div>
  </div>
</div>
