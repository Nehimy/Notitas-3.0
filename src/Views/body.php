<?php
include 'header.php';
?>
<!--Basic contaniner-->
<div class="container-transparent">
  <div class="white-transparent">
    <div class="container-white">
      <div class="white">
        <?php
        include($view->part);
        ?>
      </div>
    </div>
  </div>
</div>
<?php
include($view->bottonNextBack);
include 'footer.php';
?>
