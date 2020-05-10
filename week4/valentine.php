<?php 
    session_start();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    
<?php
   $name = $_GET["name"]
   $_SESSION["USER"] = $name
   echo "hi"


   ?>
   <form action="msg.php">
       My valentine <input type="text" name="val">
   <input type="submit" value="Send">
   </form>
</body>
</html>