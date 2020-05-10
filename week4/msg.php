<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
        <?php
        echo"Hey ".$_SESSION["user"]."<br>";
        echo"My Valentine is ".$_POST["val"]."<br>";
        ?>
    </body>
</html>