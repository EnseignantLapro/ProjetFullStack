<?php
class Arme
{
        private $_id;
        private $_Nom;
        private $_Prix;
        private $_Durabilite;
        private $_Degat;

        public function __construct($id, $Nom, $Prix, $Durabilite, $Degat)
        {
                $this->_id = $id;
                $this->_Nom = $Nom;
                $this->_Prix = $Prix;
                $this->_Durabilite = $Durabilite;
                $this->_Degat = $Degat;
        }
        //id Arme
        public function getId()
        {
                
                return $this->_id;
        }
        //Nom Arme 
        public function getNom()
        {
                return $this->_Nom;
        }
        //Prix arme
        public function getPrix()
        {
                return $this->_Prix;
        }
        //Bonus durabilité
        public function getDurabilite()
        {
                return $this->_Durabilite;
        }
        //Bonus dégat arme
        public function getDegat()
        {
                return $this->_Degat;
        }
        //Affiche nom / id / Prix / durabilité / dégat de l'arme
        public function AfficheArme()
        {
                echo 'ID Arme:' . $this->_id . ' | Arme:' . $this->_Nom.' | prix:'.$this->_Prix.'$ | Durabilité:'.$this->_Durabilite.' | Dégat :'.$this->_Degat ;
        }
        //Supprime l'arme dans la BDD
        public function deleteArme()
        {
                echo "ID Arme suppression: " . $this->_id . " Arme supprimer: " . $this->_Nom;
                global $Bdd;
                $delet = $Bdd->prepare("DELETE FROM `arme` WHERE `id_arme` = " . $this->_id);
                $delet->execute(array($this->_id));
        }

        //Craft arme
        public function craftArme($Nom,$Prix,$Durabilite,$Degat)
        {
                global $Bdd;
                $ajout = $Bdd->prepare("INSERT INTO `arme` (`nom`, `prix`, `durabilite`, `bonus_degat`)
                 VALUES (:nom_arme,:prix,:bonus_durabilite,:bonus_degat)");
                $ajout->execute(['nom_arme' => $Nom,
                'prix' => $Prix,
                'bonus_durabilite' => $Durabilite,
                'bonus_degat' => $Degat
                ]);

   
        }
}
