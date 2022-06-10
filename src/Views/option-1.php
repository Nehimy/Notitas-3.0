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
      <div class="box-white">
        <div>
        <div class="text-p"><?php echo $view->user->nick ." ". $view->content ?> .</div>
        <button class="text-a" id="go-back" onclick="retornar()" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)">Regresar atras!</button>
        </div>
      </div>
    </div>
    <script src="<?=SITE_URL?>js/script.js"></script>
  </body>
</html>
<?php
?>
