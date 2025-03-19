<?php

if(isset($_SESSION['success'])){
    foreach($_SESSION['success'] as $succ){?>

     <?php echo $succ ?>
    <?php }
    unset($_SESSION['success']);
  }
?>