<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=SITE_URL?>css/style.css">
    <link rel="icon" type="image/svg" href="<?=SITE_URL?>css/Notitas_icono.svg">
    <title>Notitas</title>

    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Itim&family=Luckiest+Guy&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="bar-container">
      <div class="bar">
        <!--El título esta aquí-->
        <a href="<?=SITE_URL?>all" alt="Notita Logo" title="Notita Logo">
          <img src="<?=SITE_URL?>css/Notitas_Logo.svg" alt="Notitas 2.0">
        </a>

        <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>new"> new note </a>


        <a class="sign" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>login-off">
          Sign off
        </a>

        <div class="avatar">
          <?php
          if(isset($view->avatar)){ ?>
            <img class="avatar" src="https://www.gravatar.com/avatar/<?=$view->avatar?>" alt="Avatar">
          <?php
          }else{
          ?>
            <img class="avatar2" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=https://i.imgur.com/nTgwSKj.png" alt="Avatar default" />

          <?php
          }
          ?>
        </div>
            </div>
    </div>
    <script src="<?=SITE_URL?>js/script.js"></script>
