<div class="first-contaniner-form">
  <div class="container-form-edit-user">
    <form method="POST" action="<?=SITE_URL?>user/<?=$view->user->id?>/update">
      <p for="name">Correo:</p>
      <input class="input-text" type="text" name ="mail" value= "<?=$view->user->mail?>">
      <p for="name">contraseña:</p>
      <input class="input-text" type="text" name ="password" value= "">
      <div class="container-bottons">
        <input class="botton" type="submit" value="Save" >
      </div>
    </form>
  </div>
</div>
