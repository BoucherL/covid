<?php
session_start();
include "fonction.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test covid</title>
</head>
<body>
<?php    
    if($access){
        
        echo "BIENVENUE SUR MON SITE";

    }else{
        echo "Marche pas";
        echo $errormsg;
    }
?>
</body>
</html>