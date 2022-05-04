<html>
  <header>
  </header>
  <body>
    <form method="POST">
      </p>Inicio de sesión<p>
      <?php if (isset($view->error)): ?>
      <div class="error-tip"><?=$view->error?></div>
      <?php endif; ?>
      <label for="name">Nombre:</label><br>
      <input type="text" name="name" value=""><br>
      <label for="password">contraseña:</label><br>
      <input type="password" name="password" value=""><br><br>
      
      <!--<input id="center" type="checkbox" name="admin">Admin -->
      
      <input type="submit" value="Save">
    </form>
  <body>
<html>
