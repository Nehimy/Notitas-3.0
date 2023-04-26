<div class="container-global">
  <div class="container-panel">
    <div class="panel">
      <!--Search-->
      <p class="style-text-big border-top">
        <form class="margin-botton"  action="<?=SITE_URL?>panel-notes" method="GET">
          <div class="container-input-search-panel">
            <input class="input-search-panel" placeholder="Search" type="text" name="search" required="required" value="" >
            <input class="button-search-panel" type="submit" value="search">
          </div>
        </form>
      </p>
      <!-- New note -->
      <!-- <div class="padding-text"> -->
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
          <a class="style-text-big padding-text" alt="Todos los usuarios" title="Todos los users de Notitas"
             href="<?=SITE_URL?>all">
            Cuenta de usuario.
          </a>
        </p>
      <p class="style-text-big border-botton"</p>
    </div>
  </div>
  <div class="container-transparent-content">
    <div class="white-transparent">
      <div class="container-white">
        <div class="white">
          <?php
          include 'panel-notes.php';
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
