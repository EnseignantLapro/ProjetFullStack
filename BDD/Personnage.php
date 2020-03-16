<?php

class Personnage{


    private $_nom;
    private $_vie;
    private $_id;


    public function __construct($valeurid){
        //récupérer le bon personnage avec son id
        //simule un user

        $this->_id =  $valeurid;
        $maBase=new PDO('mysql:host=??; dbname=??; charset=utf8','?','?');
        $LesDonneesBrutesDeLaBdd = $maBase->query("select * from Personnages where `idperso` =".$valeurid);
        $TableauDeDonnée = $LesDonneesBrutesDeLaBdd ->fetch();
        $this->_nom = $TableauDeDonnée['Nom'];
        $this->_vie = $TableauDeDonnée['Vie'];

    }

    public function AfficherInfo(){

        echo "<p> Mon nom est ".$this->_nom;
        echo " je possede ".$this->_vie." point de vie ";
 
     }

     public function getNom()
     {
         return $this->_nom;
     }

}

?>
