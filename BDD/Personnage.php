<?php

class Personnage{


    private $_nom;


    public function __construct($id){
        //récupérer le bon personnage avec son id
        //simule un user
        $this->_nom = "test2";

    }

    public function afficherInfo(){

        echo "je suis".$this->_nom;
    }
}

?>