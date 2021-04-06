<?php
//session_start();
//include "User.php";
//include "Personnage.php";
include "Personnage2.php";
include "Guerrier.php";
include "mage.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css.css" rel="stylesheet">
    <title>Test covid</title>
</head>
<body>
<?php
    //include "fonction.php";
    //if($access){
        
        //echo "BIENVENUE SUR MON SITE";

    //}else{
       // echo "Marche pas";
       // echo $errormsg;
   // }
    $perso1 = new Personnage2("Corsair");
    $perso1->Appellertt();

    $guerrierchaud = new Guerrier("Olaf");
    $guerrierchaud->Appeller();

    $magelegendaire = new mage("Arceus");
    $magelegendaire->Invoquer();
?>
</body>
</html>