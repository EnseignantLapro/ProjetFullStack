<?php
class Arme
{
        private $_id;
        private $_Nom;

        public function __construct($id,$Nom){
        $this->_id = $id;
        $this->_Nom = $Nom;
        }
//id Arme
        public function getId(){
        return $this->_id;
        }
//Nom Arme 
        public function getNom(){
        return $this->_Nom;
        }
//Affiche le nom et l'id de l'arme
        public function AfficheArme(){
            echo $this->_Nom.' équipé | ID Arme:'.$this->_id;
        }
//Supprime l'arme dans la BDD
        public function deleteArme()
        {
            echo "ID Arme suppression: " . $this->_id . " Arme supprimer: " . $this->_Nom;
            global $Bdd;
            $delet = $Bdd->prepare("DELETE FROM `arme` WHERE `id_arme` = " . $this->_id);
            $delet->execute(array($this->_id));
        }
 }
?>