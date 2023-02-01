<!DOCTYPE html>
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
    <div class="container">
      <div class="bar-container">
        <div class="bar">
          <!--El título esta aquí-->
          <div class="container-logo">
            <a href="<?=SITE_URL?>all" alt="Notita Logo" title="Notita Logo">
              <img src="<?=SITE_URL?>css/Notitas_Logo.svg" alt="Notitas 2.0">
            </a>
          </div>
          <div class="container-new-note">
            <a class="space style-text-big" alt="Crea nueva notita" title="Crea nueva notita" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>new"> new note </a>
          </div>

          <!--Search-->
          <div class="search-container" >
            <form action="<?=SITE_URL?>panel-notes" class ="form-search" method="GET">

              <div class="container-input-search">
                <input class="input-search" placeholder="Search" type="text" name="search" required="required" value="" >
                <!-- <div class="container-glass">
                     <img class="magnifying-glass" src="<?=SITE_URL?>css/search.svg" alt="Notitas 3.0">
                   </div> -->
              </div>
              <input class="button-search" type="submit" value="search">
            </form>

          </div>
          <!--Search-->

          <div class="sing-up">
            <a class="sing style-text-big" onmouseover="colorText(this)" onmouseout="normalColor(this)" href="<?=SITE_URL?>login-off">
              Sign up
            </a>
            <div class="avatar">
              <?php
              if(isset($view->avatar)){
              ?>
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
        </div>
      <script src="<?=SITE_URL?>js/script.js"></script>
