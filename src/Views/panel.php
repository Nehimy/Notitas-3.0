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
        <div class="bar-admin">
          <!--El título esta aquí-->
          <div class="container-logo">
            <a href="<?=SITE_URL?>all" alt="Notita Logo" title="Notita Logo">
              <img src="<?=SITE_URL?>css/Notitas_Logo.svg" alt="Notitas 2.0">
            </a>
          </div>
          <div class="avatar-container">
            <?php
            if(isset($view->avatar)){
            ?>
              <img class="avatar" src="https://www.gravatar.com/avatar/<?=$view->avatar?>" alt="Avatar">
            <?php
            }else{
            ?>
              <img class="avatar2"
                   src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=https://i.imgur.com/nTgwSKj.png"
                   alt="Avatar default" />
            <?php
            }
            ?>
          </div>
        </div>
        <div class="navbar-admin">
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
              <form class ="form-search-admin border-top" action="<?=SITE_URL?>panel-notes" method="GET">
                <div class="container-input-search">
                  <input class="input-search" placeholder="Search" type="text" name="search" required="required" value="" >
                  <input class="button-search" type="submit" value="Search">
                </div>
              </form>
              <!--New note dropdown-->
              <div class="dropdown-center-text border-top">
                <!-- <a class="space style-text-big" alt="Crea nueva notita" -->
                <a class="style-text-big" alt="Crea nueva notita"
                     title="Crea nueva notita" href="<?=SITE_URL?>new"> New note </a>
              </div>
              <!-- Todas las notas dropdown -->
              <p class="border-top">
                <!-- Todas las notas -->
                <a class="style-text-big dropdown-center-text" alt="Todos las notas" title="Todos las notas de Notitas"
                   href="<?=SITE_URL?>panel-notes">Todas las notas</a>
              </p>
              <!-- Todos los usuarios dropdown-->
              <p class="border-top">
                <a class="style-text-big dropdown-center-text" alt="Todos los usuarios" title="Todos los users de Notitas"
                   href="<?=SITE_URL?>panel-users">
                  Todos los usuarios
                </a>
              </p>
              <!-- Logout -->
              <div class="dropdown-center-text border-top">
                <a class="logout style-text-big" href="<?=SITE_URL?>login-off">
                  Logout
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Panel admin -->
      <div class="container-global">
        <div class="container-panel">
          <div class="panel">
            <!--Search-->
            <p class="style-text-big border-top">
              <form class="margin-botton"  action="<?=SITE_URL?>panel-notes" method="GET">
                <div class="container-input-search-panel">
                  <input class="input-search-panel" placeholder="Search" type="text" name="search" required="required" value="" >
                  <input class="button-search-panel" type="submit" value="Search">
                </div>
              </form>
            </p>
            <!-- New note -->
            <p class="border-top">
              <a class="style-text-big padding-text" alt="Crea nueva notita" title="Crea nueva notita"
                 href="<?=SITE_URL?>new"> New note </a>
            </p>
            <p class="border-top">
              <!-- Todas las notas -->
              <a class="style-text-big padding-text" alt="Todos las notas" title="Todos las notas de Notitas"
                 href="<?=SITE_URL?>panel-notes">Todas las notas</a>
            </p>
            <p class="border-top">
              <!-- Todos los usuarios -->
              <a class="style-text-big padding-text" alt="Todos los usuarios" title="Todos los users de Notitas"
                 href="<?=SITE_URL?>panel-users">
                Todos los usuarios
              </a>
            </p>
            <p class="border-top">
              <!-- Logout-admin -->
              <a class="logout-admin style-text-big" href="<?=SITE_URL?>login-off">
                Logout
              </a>
            </p>
            <p class="style-text-big border-botton"</p>
          </div>
        </div>
        <!-- contenedor de las notas y users -->
        <div class="container-transparent-content">
          <div class="white-transparent">
            <div class="container-white">
              <div class="white-panel-admin">
                <?php
                include ($view->part);
                ?>
              </div>
            </div>
          </div>
        </div>
        <?php
        include ($view->bottonNextBack);
        ?>
      </div>
      <?php
      /* include 'panel-content.php'; */
      include 'footer.php';
      ?>
