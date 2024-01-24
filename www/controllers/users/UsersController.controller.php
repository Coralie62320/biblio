<?php
require_once "models/users/UsersManager.class.php";

class UsersController
{

    private UserManager $usersManager;

    public function __construct()
    {
        $this->usersManager = new UserManager;
    }

    public function connexion()
    {
        require "views/connexion.view.php";
    }

    public function connexionUser($identifiant, $password)
    {
        $this->usersManager->setUser($identifiant, $password);
        $userEnCours = $this->usersManager->getUser();
        if ($userEnCours != null) {
            foreach ($userEnCours as $attribut => $valeur) {
                $_SESSION['user'][$attribut] = $valeur;
            }
            header('location: livres');
        }
    }

    public function deconnexion()
    {
        session_destroy();
        header('location: /');
    }
}
