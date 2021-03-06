<?php

class User{

    private $_id;
    private $_nom;
    private $_prenom;
    private $_mdp;
    private $_bdd;


    public function __construct($bdd){
        $this->_bdd = $bdd;

    }

    public function setUser($id,$nom,$prenom,$mdp,){
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_mdp = $mdp;
    }

    public function setUserbyid($id){
        $Result = $this->_bdd->query("SELECT * FROM `User` WHERE `id`='".$id."' ");
        if($tab = $Result->fetch()){ 
            $this->setUser($tab["id"],$tab["login"],$tab["mdp"],$tab["prenom"]);
            //chercher son personnage
            $personnage = new Personnage($this->_bdd);
            $personnage->setPersonnageById($tab["idPersonnage"]);
            $this->_MonPersonnage = $personnage;
        }
    }

    public function setPersonnage($Perso){
        $this->_MonPersonnage = $Perso;
        //je mémorise en base l'association du personnage dans user
        $req ="UPDATE `User` SET `idPersonnage`='".$Perso->getID()."' WHERE  `id` = '".$this->_id."'";
        $Result = $this->_bdd->query($req);
    }

    public function getPrenom(){
        return $this->_prenom;
    }

    public function getNomPersonnage(){
        return $this->_MonPersonnage->getNom();
    }

    public function ConnecteToi(){
           //traitement du formulaire
    $access = false;
    if( isset($_POST["login"]) && isset($_POST["password"])){
        //verif mdp en BDD

        $Result = $this->_bdd->query("SELECT * FROM `User` WHERE `login`='".$_POST['login']."' AND `mdp` = '".$_POST['password']."'");
        if($tab = $Result->fetch()){ 
             //si mdp = ok
            $access = true;
            $_SESSION["Connected"]=true;
            $afficheForm = false;
            //si on est co on affiche le formulaire de deco
            $this->DeconnectToi();
        }else{
            $afficheForm = true;
        }
    }else{
        $afficheForm = true;
    }
    
    if($afficheForm){
    ?>
        <form action="" method="post" >
            <div>
                <label for="login">Enter your login: </label>
                <input type="text" name="login" id="login" required value="Rapidecho">
            </div>
            <div >
                <label for="password">Enter your pass: </label>
                <input type="password" name="password" id="password" required value="Julien1234">
            </div>
            <div >
                <input type="submit" value="Go!" >
            </div>
        </form>

    <?php
    }

    return $access;
    }
    }

    public function Deconnectetoi(){
        
         //traitement du formulaire
    $afficheForm = true;
    $access = true;
    if( isset($_POST["logout"]) && isset($_POST["logout"])){
        //si on se deco on raffiche le formulaire de co
        $_SESSION["Connected"]=false;
        session_unset();
        session_destroy();
        $this->ConnectToi();
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
}


?>