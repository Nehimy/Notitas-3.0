<?php
    include 'header.php';
?>
        <!--Contenido-->
<div id="sky-blue-set">
  <div class="transparent-set">
    <div class="white-set">
      <div class="new-litle-note <?=$view->notita->color?>">
        <form method="POST" action="<?=SITE_URL?>note/<?=$view->notita->id?>/update">
          <div class="titulo">Título:</div>
          <input type="text" name ="title" value= "<?=$view->notita->title?>">
          <div class="titulo"> Contenido: </div>
          <textarea name="contenido" rows="10" cols="50"> <?php echo $view->notita->content ?>
          </textarea>
          <?php
           //Obtengo el color de la nota
           $selected = $view->notita->color;
          //El arreglo de los colores
          $colors = [
          'yellow'=>'Amarillo',
          'pink'=>'Rosa',
          'lilac'=>'Lila',
          'lightBlue'=>'Celeste'
          ];

          $notSelected = '';
          //Concatenamos los colores no seleccionados de option
          foreach($colors as $colorEn => $colorEs){
          if ($colorEn != $selected){
          $notSelected = $notSelected.'<option value="'.$colorEn.'">'.$colorEs.'</option>';
          }
          }
          //La etiqueta option con el value y el color del text
          $selected = '<option value="'.$selected.'">'.$colors[$selected].'</option>';
          ?>
          <select class="<?=$view->notita->color?>" name="color" onChange="changeColor(this)">
            <?=$selected?>
            <?=$notSelected?>
            <!--
                <option value="yellow">Amarillo</option>
            <option value="pink">Rosa</option>
            <option value="lilac">Lila</option>
            <option value="lightBlue">Celeste</option>
            -->
          </select>
          <input class="boton" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save" >
        </form>
      </div>
    </div>
  </div>
</div>
<script src="<?=SITE_URL?>js/script.js"></script>
<?php
    include 'footer.html';
?>
