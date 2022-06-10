<?php
 include 'header.php';
?>
<!--Contenido-->
<div id="sky-blue-set">
  <div class="transparent-set">
    <div class="white-set">
      <div class="new-litle-note">
        <form method="POST">
          <div class="titulo">
            Título:
          </div>
          <input type="text" name ="title" value="" required="">
          <div class="titulo">
            Contenido:
          </div>
          <textarea name="content" rows="10" cols="50" required=""></textarea>
          <select name="color" onChange="changeColor(this)">
            <option value="yellow">Amarillo</option>
            <option value="pink">Rosa</option>
            <option value="lilac">Lila</option>
            <option value="lightBlue">Celeste</option>
          </select>
          <input class="boton" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save">
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?=SITE_URL?>js/script.js">
</script>
<?php
 include 'footer.html';
?>
