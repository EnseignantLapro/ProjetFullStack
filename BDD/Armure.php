<?php
//DEV BY GARNON
class Armure
{
        private $_idArmure;
        private $_bdd;
        private $_reqArmure;
        private $_armureinfo;

        //Recupère les données de l'armure en fonction de son id
        public function __construct($bdd, $idarmure, $creation)
        {
                $this->_bdd = $bdd;
                $this->_idArmure = $idarmure;
                if ($creation != 1) {
                        $this->_reqArmure = $this->_bdd->query('SELECT * FROM armure WHERE id_armure = ' . $this->_idArmure . '');
                        $this->_armureinfo = $this->_reqArmure->fetch();
                }
        }
        //Retourne nom de l'armure
        public function getNom()
        {
                return $this->_armureinfo['nom'];
        }
        //Retourne prix de l'armure 
        public function getPrix()
        {
                return $this->_armureinfo['prix'];
        }
        //Retourne dégat de l'armure
        public function getDegat()
        {
                return $this->_armureinfo['bonus_defense'];
        }
        //Retourne durabilité de l'armure
        public function getDurabilite()
        {
                return $this->_armureinfo['bonus_durabilite'];
        }
        //Créé l'armure
        public function createArmure($nom,$prix,$durabilite,$degats)
        {
                $create = $this->_bdd->query("INSERT INTO `armure` (`id_armure`, `nom`, `prix`, `bonus_durabilite`, `bonus_defense`) VALUES (NULL, '".$nom."', '".$prix."', '".$durabilite."', '".$defense."')");
        }
        //Supprime l'armure dans la BDD
        public function deleteArmure()
        {
                $delete = $this->_bdd->prepare("DELETE FROM `armure` WHERE `id_armure` = ?");
                $delete->execute(array($this->_idArmure));
        }
        //Change l'attaque du heros dans la table assoshero et change l'id de l'armure du heros
        public function equiperArmure($id_user, $id_hero)
        {
                $reqAssos = $this->_bdd->query('SELECT * FROM assoshero WHERE id_user = ' . $id_user . ' AND id_hero = ' . $id_hero . '');
                $assosinfo = $reqAssos->fetch();
                $reqHero = $this->_bdd->query('SELECT * FROM typehero WHERE id_hero = ' . $assosinfo['id_hero'] . '');
                $heroinfo = $reqHero->fetch();
                $upID = $this->_bdd->query('UPDATE assoshero SET id_armure = ' . $this->_idArmure . ' WHERE id_user = ' . $id_user . ' AND id_hero = ' . $id_hero . '');
                $defensefinale = $heroinfo['defense'] + $this->_armureinfo['bonus_defense'];
                echo "<br>L'attaque de " . $heroinfo['nom'] . " est passée de " . $assosinfo['defense'] . " à " . $defensefinale;
                $upArmure = $this->_bdd->query('UPDATE assoshero SET defense = ' . $defensefinale . ' WHERE id_user = ' . $id_user . '');
        }
}
