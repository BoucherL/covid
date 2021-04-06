<?php

class Personnage2{

    protected $_nom;


    public function __construct($nom){
        $this->_nom = $nom;

    }


    public function Appellertt(){
      ?>
      <div> <?php echo $this->_nom ?></div>
      <?php  
    }
}
?>