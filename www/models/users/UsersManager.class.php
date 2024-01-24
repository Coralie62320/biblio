<?php
require_once "models/utils/ConnexionManager.class.php";
require_once "models/users/User.class.php";

class UserManager extends ConnexionManager
{
    private User $user;

    public function setUser($identifiant, $password)
    {
        $connexion = $this->getConnexionBdd();
        $req = $connexion->prepare("SELECT * FROM user");
        $req->execute();
        $users = $req->fetchALL(PDO::FETCH_ASSOC);
        $req->closeCursor();

        foreach ($users as $user) {
            // logique
            if ($user['identifiant'] === $identifiant) {
                if (password_verify($password, $user['password'])) {
                    $user = new User($user['id_user'], $user['identifiant'], $user['password']);
                    return $this->user = $user;
                }
            }
        }
    }

    /**
     * Get the value of user
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }
}
