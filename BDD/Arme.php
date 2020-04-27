<?php
//DEV BY GARNON
class Arme
{
        private $_idArme;
        private $_bdd;
        private $_reqArme;
        private $_armeinfo;
        private $_nom;
        private $_prix;
        private $_bonusDegat;
        private $_bonusDurabilite;

        //Recupère les données de l'arme en fonction de son id, $creation = 1 VEUT DIRE QU'ON CREER L'ARME
        public function __construct($bdd, $idarme, $creation)
        {
                $this->_bdd = $bdd;
                $this->_idArme = $idarme;
                if ($creation != 1) {
                        $this->_reqArme = $this->_bdd->query('SELECT * FROM arme WHERE id_arme = ' . $this->_idArme . '');
                        $armeinfo = $this->_reqArme->fetch();
                        $this->_nom=$armeinfo['nom'];
                        $this->_prix=$armeinfo['prix'];
                        $this->_bonusDegat=$armeinfo['bonus_degat'];
                        $this->_bonusDurabilite=$armeinfo['durabilite'];
                }
        }
        //Retourne nom de l'arme
        public function getNom()
        {
                return $this->_nom;
        }

        public function getID(){
                return $this->_idArme;
        }

        //Retourne prix de l'arme 
        public function getPrix()
        {
                return $this->_prix;
        }
        //Retourne dégat de l'arme
        public function getDegat()
        {
                return $this->_bonusDegat;
        }
        //Retourne durabilité de l'arme
        public function getDurabilite()
        {
                return $this->_bonusDurabilite;
        }
        //Créé l'arme
        public function createArme($nom,$prix,$durabilite,$degats)
        {
                $create = $this->_bdd->query("INSERT INTO `arme` ( `nom`, `prix`, `durabilite`, `bonus_degat`) VALUES ('".$nom."', '".$prix."', '".$durabilite."', '".$degats."')");
        }
        //Supprime l'arme dans la BDD
        public function deleteArme()
        {
                $delete = $this->_bdd->prepare("DELETE FROM `arme` WHERE `id_arme` = ?");
                $delete->execute(array($this->_idArme));
        }
        //Change l'attaque du heros dans la table assoshero et change l'id de l'arme du heros
        public function equiperArme($id_user, $id_hero)
        {
                $reqAssos = $this->_bdd->query('SELECT * FROM hero WHERE id_hero = ' . $id_hero . '');
                $assosinfo = $reqAssos->fetch();
                $reqHero = $this->_bdd->query('SELECT * FROM typehero WHERE id_typehero = ' . $assosinfo['id_typehero'] . '');
                $heroinfo = $reqHero->fetch();
                $upID = $this->_bdd->query('UPDATE entite SET id_arme = ' . $this->_idArme . ' WHERE id_entite = ' . $assosinfo['id_entite'] . '');
                $attaquefinale = $heroinfo['attaque'] + $this->_bonusDegat;
                echo "<br>L'attaque de " . $heroinfo['nom'] . " est passée de " . $assosinfo['attaque'] . " à " . $attaquefinale;
                $upAttaqueHero = $this->_bdd->query('UPDATE hero SET attaque = ' . $attaquefinale . ' WHERE id_hero = ' . $id_hero . '');
                $upAttaqueEntite  = $this->_bdd->query('UPDATE entite SET defense = ' . $attaquefinale . ' WHERE id_entite = ' . $assosinfo['id_entite'] . '');
        }
}
