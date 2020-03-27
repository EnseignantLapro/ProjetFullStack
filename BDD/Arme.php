<?php
//DEV BY GARNON
class Arme
{
        //TODO attention les membre privé ne sont pas des variables de code
        private $_idArme;
        private $_bdd;
        private $_reqArme;
        private $_armeinfo;
        private $_nom;
        private $_prix;
        private $_bonusDegat;
        private $_bonusDurabilite;

        //Recupère les données de l'arme en fonction de son id
        //TODO Expliquer en commentaire les paramètre du constructeur
        public function __construct($bdd, $idarme, $creation)
        {
                $this->_bdd = $bdd;
                $this->_idArme = $idarme;
                if ($creation != 1) {
                        $this->_reqArme = $this->_bdd->query('SELECT * FROM arme WHERE id_arme = ' . $this->_idArme . '');
                        $armeinfo = $this->_reqArme->fetch();
                        $this->_nom=$armeinfo['nom'];
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
                //TODO return $this->_armeinfo['prix'];
        }
        //Retourne dégat de l'arme
        public function getDegat()
        {
                //TODO return $this->_armeinfo['bonus_degat'];
        }
        //Retourne durabilité de l'arme
        public function getDurabilite()
        {
                //TODO return $this->_armeinfo['bonus_durabilite'];
        }
        //Créé l'arme
        public function createArme($nom,$prix,$durabilite,$degats)
        {
                $create = $this->_bdd->query("INSERT INTO `arme` ( `nom`, `prix`, `bonus_durabilite`, `bonus_degat`) VALUES ('".$nom."', '".$prix."', '".$durabilite."', '".$degats."')");
                //TODO Récupérer l'id donnée par la base
        }
        //Supprime l'arme dans la BDD
        public function deleteArme()
        {
                $delete = $this->_bdd->prepare("DELETE FROM `arme` WHERE `id_arme` = ?");
                $delete->execute(array($this->_idArme));
        }
        //Change l'attaque du heros dans la table assoshero et change l'id de l'arme du heros
        //TODO id User passer l'objet user ; et idem pour idHero passer le nero
        public function equiperArme($id_user, $id_hero)
        {
                $reqAssos = $this->_bdd->query('SELECT * FROM assoshero WHERE id_user = ' . $id_user . ' AND id_hero = ' . $id_hero . '');
                $assosinfo = $reqAssos->fetch();
                $reqHero = $this->_bdd->query('SELECT * FROM typehero WHERE id_hero = ' . $assosinfo['id_hero'] . '');
                $heroinfo = $reqHero->fetch();
                $upID = $this->_bdd->query('UPDATE assoshero SET id_arme = ' . $this->_idArme . ' WHERE id_user = ' . $id_user . ' AND id_hero = ' . $id_hero . '');
                $attaquefinale = $heroinfo['attaque'] + $this->_armeinfo['bonus_degat'];
                echo "<br>L'attaque de " . $heroinfo['nom'] . " est passée de " . $assosinfo['attaque'] . " à " . $attaquefinale;
                $upArme = $this->_bdd->query('UPDATE assoshero SET attaque = ' . $attaquefinale . ' WHERE id_user = ' . $id_user . '');
        }
}
