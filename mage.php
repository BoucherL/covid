<?php

class mage extends Personnage2{



    public function __construct($nom){
        Parent::__construct($nom);
    }

    public function Invoquer(){
        ?>
        <div class = mage> je m'appelle <?php echo $this->_nom ?> Le Mage</div>
        <?php
    }
}
?>