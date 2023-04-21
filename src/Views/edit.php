<div class="container-see-note center-text">
    <div class="see-note title <?=$view->notita->color?>">
      <form method="POST" action="<?=SITE_URL?>note/<?=$view->notita->id?>/update">
        <p>Título:</p>
        <input class="input-size input-text" type="text" name ="title" value= "<?=$view->notita->title?>">
        <p> Contenido: </p>
        <textarea  class="textarea-size textarea-text" name="contenido" rows="10" cols="50"> <?php echo $view->notita->content ?>
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
        <div class="container-bottons">
          <select class="<?=$view->notita->color?>" id="select-color" name="color" onChange="changeColor(this)">
            <?=$selected?>
            <?=$notSelected?>
          </select>
          <input class="botton" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" type="submit" value="Save" >
        </div>

      </form>
    </div>
</div>
