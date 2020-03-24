<?php
//DEV BY GARNON
class Arme
{
        private $_idArme;
        private $_bdd;
        private $_reqArme;
        private $_armeinfo;

        //Recupère les données de l'arme en fonction de son id
        public function __construct($bdd, $idarme)
        {
                $this->_bdd = $bdd;
                $this->_idArme = $idarme;
                $this->_reqArme = $this->_bdd->query('SELECT * FROM arme WHERE id_arme = ' . $this->_idArme . '');
                $this->_armeinfo = $this->_reqArme->fetch();
        }
        //Retourne nom de l'arme
        public function getNom()
        {
                return $this->_armeinfo['nom'];
        }
        //Retourne prix de l'arme 
        public function getPrix()
        {
                return $this->_armeinfo['prix'];
        }
        //Retourne dégat de l'arme
        public function getDegat()
        {
                return $this->_armeinfo['bonus_degat'];
        }
        //Supprime l'arme dans la BDD
        public function deleteArme()
        {
                echo "ID Arme supprimée: " . $this->_idArme . " Nom arme supprimée : " . $this->_armeinfo['nom'];
                $delete = $this->_bdd->query("DELETE FROM `arme` WHERE `id_arme` = " . $this->_idArme . "");
        }
        //Change l'attaque du heros dans la table assoshero et change l'id de l'arme du heros
        public function equiperArme($id_user,$id_hero)
        {
                $reqAssos = $this->_bdd->query('SELECT * FROM assoshero WHERE id_user = ' . $id_user . ' AND id_hero = '. $id_hero .'');
                $assosinfo = $reqAssos->fetch();
                $reqHero = $this->_bdd->query('SELECT * FROM typehero WHERE id_hero = ' . $assosinfo['id_hero'] . '');
                $heroinfo = $reqHero->fetch();
                $upID = $this->_bdd->query('UPDATE assoshero SET id_arme = ' . $this->_idArme . ' WHERE id_user = ' . $id_user . ' AND id_hero = '. $id_hero .'');
                $attaquefinale = $heroinfo['attaque'] + $this->_armeinfo['bonus_degat'];
                echo "<br>L'attaque de " . $heroinfo['nom'] . " est passée de " . $assosinfo['attaque'] . " à " . $attaquefinale;
                $upArme = $this->_bdd->query('UPDATE assoshero SET attaque = ' . $attaquefinale . ' WHERE id_user = ' . $id_user . '');
        }
}
