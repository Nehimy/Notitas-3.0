<?php
//print_r($view->user);
?>
<html>
  <head>
    <link rel="stylesheet" href="http://prueba.ney/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&amp;display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&amp;family=Itim&amp;family=Luckiest+Guy&amp;display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="box-light-blue">
      <div class="box-one">
        <div class="box-two">
          <div class="box-tres">
            <p class="text-p">El nick ya está en uso.</p>
            <a class="text-a" onmouseover="colorText(this)" href="<?= SITE_URL ?>register">Volver al registro de usuario</a>
          </div>
        </div>
      </div>
    </div>
    <script src="<?=SITE_URL?>js/script.js"></script>
  </body>
</html>
<?php
?>
