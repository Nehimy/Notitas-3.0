<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?=SITE_URL?>css/style.css">
    <!--link rel="stylesheet" href="<?=SITE_URL?>css/materialize.css">-->
    <link rel="icon" type="image/svg" href="<?=SITE_URL?>css/Notitas_icono.svg">
    <title>Notitas</title>

    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Itim&family=Luckiest+Guy&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="navigation-bar">
      <ul class = "list-bar">
        <!--El título esta aquí-->
        <li class="logo">
          <a href="<?=SITE_URL?>all" alt="Notita Logo" title="Notita Logo">
            <img src="<?=SITE_URL?>css/Notitas_Logo.svg" alt="Notitas 2.0">
          </a>
        </li>
        <li class="new-note" >
          <a alt="Crea nueva notita" title="Crea nueva notita" class="space" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>new"> new note </a>
        </li>
      </ul>
      <div class="box-container">
      <ul class = "list-bar list-bar2">
      <li>
        <a class="sign" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>login-off">
          Sign off
        </a>
      </li>
      <li>
        <a>
        </a>
      </li>
      </ul>
      </div>
      <div class="avatar">
        <!-- <img class="avatar" src="<?=SITE_URL?>css/avatar_default.svg" alt="Avatar"> -->
        <!-- <img class="avatar" src="https://i.imgur.com/nTgwSKj.png" alt="Avatar"> -->
        <!-- <img class="avatar" src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50" alt="Avatar"> -->
        <img class="avatar" src="https://www.gravatar.com/avatar/<? $img->hash ?>" alt="Avatar">
      </div>

    </div>
    <script src="<?=SITE_URL?>js/script.js"></script>
