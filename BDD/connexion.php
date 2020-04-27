<?php
class user
{
    //propriétes:
    private $_Mail;
    private $_MDP;
    private $_Bdd;


    //méthodes:
    public function __construct($Bdd)
    {
        $this->_Bdd = $Bdd;
    }
    public function UsersNew($pseudo, $mail, $MDP)
    { //Fonction qui creer un nouvelle utiliateur

   $this->_Bdd->query('INSERT INTO `user`(`id_user`, `pseudo`, `mail`, `mdp`, `dollars`) VALUES (NULL, "'. $pseudo . '","' . $mail . '","' . $MDP . '", "0")');
    }
    public function usersConnexion($NDC, $MDP)
    { //Fonction qui permet au utilisateur deja creer de se connecter
        $LesNVusers = $this->_Bdd->query('SELECT * FROM `user` WHERE mail = "' . $NDC . '" && mdp = "' . $MDP . '"');
     
        $admin = $LesNVusers->fetch();
        $this->_Mail = $admin['mail'];
        $this->_MDP = $admin['mdp'];
    }
    public function Compar2($NDC, $MDP)
    {
        if ($NDC == $this->_Mail) {
            if ($MDP == $this->_MDP) {
              
                return true;
            }
        }
     
        return false;
    }
}
