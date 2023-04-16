<?php
include 'header.php';

?>
<div class=" container-transparent">
  <div class="white-transparent">
    <div class="container-white">
      <div class="white">
        <form class="container-new-note-form" method="POST">
            Título:
          <input class="input-text input-size" type="text" name ="title" value="" required="">
            Contenido:
          <textarea class="textarea-text textarea-size" name="content"
                    rows="10" cols="50" required=""></textarea>
          <select class="select-color" name="color" onChange="changeColor(this)">
            <option value="yellow">Amarillo</option>
            <option value="pink">Rosa</option>
            <option value="lilac">Lila</option>
            <option value="lightBlue">Celeste</option>
          </select>
          <input class="botton" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save">
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
