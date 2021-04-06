<?php 

class Guerrier extends Personnage2{

    //propiétés



    //méthodes
    public function __construct($nom){
        Parent::__construct($nom);
    }
    

    public function Appeller(){
        ?>
        <div class = guerrier> je m'appelle <?php echo $this->_nom ?> Le Guerrier </div>
        <?php
    }
}
?>