<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=SITE_URL?>css/style.css">
    <link rel="icon" type="image/svg" href="<?=SITE_URL?>css/Notitas_icono.svg">
    <title>Notitas</title>
  </head>
  <body>
    <div class="container">
      <!-- Navigation bar -->
      <div class="bar-container">
        <div class="bar">
          <!--El título esta aquí-->
          <div class="container-logo">
            <a href="<?=SITE_URL?>all" alt="Notita Logo" title="Notita Logo">
              <img src="<?=SITE_URL?>css/Notitas_Logo.svg" alt="Notitas 2.0">
            </a>
          </div>
          <!--new note-->
          <div class="container-new-note">
            <a class="space style-text-big" alt="Crea nueva notita" title="Crea nueva notita" href="<?=SITE_URL?>new"> New note </a>
          </div>

          <!--Search-->
          <form class ="form-search" action="<?=SITE_URL?>panel-notes" method="GET">
            <!-- <form class ="form-search" action="<?=SITE_URL?>search-notes" method="GET"> -->
            <div class="container-input-search">
              <input class="input-search" placeholder="Search" type="text" name="search" required="required" value="" >
              <input class="button-search" type="submit" value="Search">
            </div>
          </form>
          <!-- Logout -->
          <div class="container-logout">
            <a class="logout style-text-big" href="<?=SITE_URL?>login-off">
              Logout
            </a>
          </div>
          <!--Avatar-->
          <div class="avatar-container">
            <?php
            if(isset($view->avatar)){
            ?>
              <img class="avatar" src="https://www.gravatar.com/avatar/<?=$view->avatar?>" alt="Avatar">
            <?php
            }else{
            ?>
              <img class="avatar2" src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=https://i.imgur.com/nTgwSKj.png"
                   alt="Avatar default" />
            <?php
            }
            ?>
          </div>
        </div>
        <div class="navbar">
          <div class="container-logo">
            <a href="<?=SITE_URL?>all" alt="Notita Logo" title="Notita Logo">
              <img src="<?=SITE_URL?>css/Notitas_Logo.svg" alt="Notitas 2.0">
            </a>
          </div>
          <div class="container-dropdown">
            <label for="trigger-drop">
              <svg  class="svg-line" version="1.1" height="30" width="60">
                <line class="line-dropdown" x1="10" y1="15" x2="50" y2="15"
                      stroke-width="5" stroke="orange" stroke-linecap="round" />
                <line class="line-dropdown" x1="10" y1="25" x2="50" y2="25"
                      stroke-width="5" stroke="orange" stroke-linecap="round" />
                <line class="line-dropdown" x1="10" y1="35" x2="50" y2="35"
                      stroke-width="5" stroke="orange" stroke-linecap="round" />
              </svg>
            </label>
            <input id="trigger-drop" type="checkbox" />
            <div class="dropdown">
              <!--Search-->
              <form class ="form-search border-top" action="<?=SITE_URL?>panel-notes" method="GET">
                <div class="container-input-search">
                  <input class="input-search" placeholder="Search" type="text" name="search" required="required" value="" >
                  <input class="button-search" type="submit" value="search">
                </div>
              </form>
              <!--new note-->
              <div class="container-new-note border-top">
                <a class="space style-text-big" alt="Crea nueva notita"
                   title="Crea nueva notita" href="<?=SITE_URL?>new"> new note </a>
              </div>
              <!-- Logout -->
              <div class="container-logout border-top">
                <a class="logout style-text-big" href="<?=SITE_URL?>login-off">
                  Logout
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
