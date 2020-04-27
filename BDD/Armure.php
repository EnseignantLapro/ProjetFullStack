<?php
//DEV BY GARNON
class Armure
{
        private $_idArmure;
        private $_bdd;
        private $_reqArmure;
        private $_armureinfo;
        private $_nom;
        private $_prix;
        private $_bonusDefense;
        private $_bonusDurabilite;

        //Recupère les données de l'armure en fonction de son id, $creation = 1 VEUT DIRE QU'ON CREER L'ARME
        public function __construct($bdd, $idarmure, $creation)
        {
                $this->_bdd = $bdd;
                $this->_idArmure = $idarmure;
                if ($creation != 1) {
                        $this->_reqArmure = $this->_bdd->query('SELECT * FROM armure WHERE id_armure = ' . $this->_idArmure . '');
                        $armureinfo = $this->_reqArmure->fetch();
                        $this->_nom=$armureinfo['nom'];
                        $this->_prix=$armureinfo['prix'];
                        $this->_bonusDefense=$armureinfo['bonus_defense'];
                        $this->_bonusDurabilite=$armureinfo['durabilite'];
                }
        }
        //Retourne nom de l'armure
        public function getNom()
        {
                return $this->_nom;
        }

        //Retourne prix de l'armure
        public function getID(){
                return $this->_idArmure;
        }

        //Retourne prix de l'armure 
        public function getPrix()
        {
                return $this->_prix;
        }
        //Retourne defense de l'armure
        public function getDefense()
        {
                return $this->_bonusDefense;
        }
        //Retourne durabilité de l'armure
        public function getDurabilite()
        {
                return $this->_bonusDurabilite;
        }
        //Créé l'armure
        public function createArmure($nom,$prix,$durabilite,$defense)
        {
                $create = $this->_bdd->query("INSERT INTO `armure` ( `nom`, `prix`, `durabilite`, `bonus_defense`) VALUES ('".$nom."', '".$prix."', '".$durabilite."', '".$defense."')");
        }
        //Supprime l'armure dans la BDD
        public function deleteArmure()
        {
                $delete = $this->_bdd->prepare("DELETE FROM `armure` WHERE `id_armure` = ?");
                $delete->execute(array($this->_idArmure));
        }
        //Change la défense du heros dans la table hero et entite et change l'id de l'armure du heros
        public function equiperArmure($id_user, $id_hero)
        {
                $reqAssos = $this->_bdd->query('SELECT * FROM hero WHERE id_hero = ' . $id_hero . '');
                $assosinfo = $reqAssos->fetch();
                $reqHero = $this->_bdd->query('SELECT * FROM typehero WHERE id_typehero = ' . $assosinfo['id_typehero'] . '');
                $heroinfo = $reqHero->fetch();
                $upID = $this->_bdd->query('UPDATE entite SET id_armure = ' . $this->_idArmure . ' WHERE id_entite = ' . $assosinfo['id_entite'] . '');
                $defensefinale = $heroinfo['defense'] + $this->_bonusDefense;
                echo "<br>La defense de " . $heroinfo['nom'] . " est passée de " . $assosinfo['defense'] . " à " . $defensefinale;
                $upDefenseHero = $this->_bdd->query('UPDATE hero SET defense = ' . $defensefinale . ' WHERE id_hero = ' . $id_hero . '');
                $upDefenseEntite  = $this->_bdd->query('UPDATE entite SET defense = ' . $defensefinale . ' WHERE id_entite = ' . $assosinfo['id_entite'] . '');
        }
}
