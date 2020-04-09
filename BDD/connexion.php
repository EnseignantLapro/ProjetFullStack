<?php
class user{
    //propriétes:
    private $_nom;
    private $_MDP;
    

    //méthodes:
    public function __construct(){

        
     
    }
    public function UsersNew($pseudo, $mail, $MDP){//Fonction qui creer un nouvelle utiliateur

        try
        {
            $maBase=new PDO('mysql:host=localhost; dbname=fullstack;
            charset=utf8','root', 'root');
            $LesNVusers=$maBase->query('INSERT INTO `Users`(`pseudo`, `mail`, `mdp`) VALUES ("'.$pseudo.'","'.$mail.'","'.$MDP.'")') ;
        }    
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
        
    }
    public function usersConnexion($NDC, $MDP){//Fonction qui permet au utilisateur deja creer de se connecter

        try
        {
            $maBase=new PDO('mysql:host=localhost; dbname=fullstack;
            charset=utf8','root', 'root');
            $LesNVusers=$maBase->query('SELECT `pseudo`,`mdp` FROM `Users` WHERE "'.$NDC.'"=`pseudo` && "'.$MDP.'"=`mdp');
            $admin = $LesNVusers->fetch();
            $this->_nom = $admin['pseudo'];
            $this->_MDP = $admin['mdp'];
        }    
    
            catch (Exception $erreur){
                echo 'Erreur : '.$erreur ->getMessage();
        }
        
    }
    public function Compar2($NDC, $MDP){ 
        if($NDC == $this->_nom){
            if($MDP == $this->_MDP){
                return true;
            }
        }
        return false;
    }

    
    
    
    

}