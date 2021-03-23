<?php
$bdd = null;
$access = null;
$errormsg = "";
//Connexion à la base
try{
    $user = "boucher_1234site";
    $mdp = "weshlesgars1234";

    $bdd = new PDO('mysql:host=mysql-boucher.alwaysdata.net;dbname=boucher_covid',$user,$mdp);
}catch(Exception $e){
    echo $e->getMessage();
}
//session
if(!is_null($bdd)){
    echo "Connecter";
    if (isset($_SESSION["Connected"]) && $_SESSION["Connected"] === true){
        $access = true;
        $access = afficheFormulaireLogout();
    }else{
        $access = false;
        $errormsg.= "Vous devez vous connecter";
        //affichage formulaire si pas de connexion session
        $access = afficheFormulaireConnexion();
    }
}else{
    $errormsg.="Vous n'avez pas accés à la base";
}

function afficheFormulaireLogout($bdd){
    //traitement du formulaire
    $afficheForm = true;
    $access = true;
    if( isset($_POST["logout"]) && isset($_POST["logout"])){
        //si on se deco on raffiche le formulaire de co
        $_SESSION["Connected"]=false;
        session_unset();
        session_destroy();
        afficheFormulaireConnexion();
        $afficheForm = false;
        $access = false;
    }else{
        $afficheForm = true;
    }

    if($afficheForm){
    ?>
        <form action="" method="post" >
            <div >
                <input type="submit" value="Deco!" name="logout">
            </div>
        </form>

    <?php
    
    }

    return $access;
}


function afficheFormulaireConnexion(){

    //traitement du formulaire
    $access = false;
    if( isset($_POST["login"]) && isset($_POST["password"])){
        //verif mdp en BDD
        $Result = $bdd->query("SELECT * FROM `user` WHERE `Nom`='".$_POST['login']."' AND `Motdepasse` = '".$_POST['password']."'");
        if($tab = $Result->fetch()){ 
        //si mdp = ok
        $access = true;
        $_SESSION["Connected"]=true;
        $afficheForm = false;
        //si on est co on affiche le formulaire de deco
        afficheFormulaireLogout($bdd);

    }else{
        $afficheForm = true;
    }
    

}else{
    $afficheForm = true;
}


    if($afficheForm){
    ?>
        <form action="" method="post" >
            <p>
                <label for="login">Enter your login: </label>
                <input type="text" name="login" id="login" required>
            </p>
            <p>
                <label for="password">Enter your pass: </label>
                <input type="password" name="password" id="password" required>
            </p>
            <p>
                <input type="submit" value="Go!" >
            </p>
        </form>

    <?php
    }

    return $access;
        
}


?>