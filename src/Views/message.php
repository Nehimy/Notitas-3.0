<?php
?>
<html>
  <head>
    <link rel="stylesheet" href="http://prueba.ney/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&amp;display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&amp;family=Itim&amp;family=Luckiest+Guy&amp;display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="box-light-blue">
      <div class="box-white">
        <div>
          <div class="text-p"><?php echo $view->content ?> </div>
          <a  class="text-a" id="go-back" onmouseover="SaveOver(this)" onmouseout="SaveOut(this)" href="<?=SITE_URL.$view->url?>"> <?php echo $view->button ?>
          </a>
          <!-- - </button> -->
        </div>
      </div>
    </div>
    <script src="<?=SITE_URL?>js/script.js"></script>
  </body>
</html>
<?php
?>
