<?php 

class Personnage{

    protected $_id;
    protected $_nom;
    protected $_vie;
    protected $_degat;
    protected $_bdd;

    public function __construct($bdd){
        $this->_bdd = $bdd;
    }
    public function setPerso($id,$nom,$vie,$degat){
        $this->_id = $id;
        $this->_nom = $nom;
        $this->_vie = $vie;
        $this->_degat = $degat;
    }

    public function setPersonnageById($id){
        $Result = $this->_bdd->query("SELECT * FROM 'Personnage'")
        if($tab = $Result->fetch()){
            $this->setUser($tab[""])
        }
    }
    public function getListPersonnage(){
        $Result = $this->_bdd->query("SELECT * FROM 'Personnage'");
        ?>
        <form action ="" method="post">
        <select name="idPersonnage" id="idPersonnage">
        <option value="">Choisi un perso</option>
        <?php while($tab=$Result->fetch()){
            echo '<option value="'.$tab["id"].'"> '.$tab["nom"].'</option>';
        } 
        ?>
        </select>
    </form>
    <?php
    if (isset($_POST["idPersonnage"])){
        $this->setPersonnageById($_POST["idPersonnage"]);
    }

    return $this;
    }

}
?>