<?php session_start();
?>
<html>
    <body>
        <?php
        echo $_SESSION['Favcolor']; 
       echo $_SESSION['Favanimal'];
     /* print_r($_SESSION)*/
     ?>
</body>