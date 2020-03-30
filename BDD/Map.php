<?php
// Creation de la classe map pour passer d'une map à une autre.

// Dev By Fresi
class Map
{
    private $_id;
    private $_Bdd;
    private $_mapSuivante;
    private $_mapPrecedente;
    private $_Nom = "Region inconnue";
    

    public function __construct($idMap, $Bdd){

        $this->_Bdd = $Bdd;
        //rajoute un control si la bdd existe pas je la simule
        if (!is_null($Bdd)) {

            $this->_id = $idMap;

            $DataMap = $Bdd->query("SELECT * from map where id_map = " . $idMap . "");

            if (isset($DataMap)) {

                while ($TabDataMap = $DataMap->fetch()){

                    $this->_Nom = $TabDataMap['nom'];
                    $this->_mapSuivante = new Map($this->_id + 1, $Bdd);
                    $this->_mapPrecedente = new Map($this->_id - 1, $Bdd);
                } 
            } else {

                echo "erreur de la requete";
            }
        }
    }

    // assesseur qui renvoie le nom de la map.
    public function getNomMap(){

        return $this->_Nom;
    }

    // assesseur qui renvoie l'id de la map.
    public function getIdMap(){

        return $this->_id;
    }

    // methode qui renvoie la valeur de la prochaine map.
    public function mapSuivante(){
        
        return $this->_mapSuivante;
    }

    // methode qui renvoie la valeur de la map precedente.
    public function mapPrecedente(){

        return $this->_mapPrecedente;
    }
}
