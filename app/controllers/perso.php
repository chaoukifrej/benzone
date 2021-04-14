<?php


/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

include_once __DIR__ . '/../views/perso.view.php';
include_once __DIR__ . "/../models/Users.model.php";
include_once __DIR__ . "/../models/Adverts.model.php";


use App\Views\Perso as PersoView;
use App\Controllers\Component\Menu;
use App\Models\Users;
use App\Models\Adverts;


class Perso
{

    protected $advert;

    /* fonction modification base de données */

    public function updatePerso()
    {
        //connexion data base 
        include  __DIR__ . "/../core/database.php";

        $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
        $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);


        $query = $dbh->prepare("UPDATE users SET `lastname`= ?, `firstname`= ?, `email`= ?, `password`= ? WHERE id = ?");
        $result = $query->execute([$lastname, $firstname, $email, $password, 1]);
    }



    /* fonction deconexion  */
    public function disconnection()
    {
        include  __DIR__ . "/../core/database.php";

        // passage isConnected a 0
        $userRequest = $dbh->prepare('UPDATE users SET is_connected = ? WHERE id = ?');
        $userRequest->execute([0, $_SESSION['id']]);

        session_destroy();
        header('Location: accueil');
    }
}
