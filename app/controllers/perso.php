<?php


/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

include __DIR__ . '/../views/perso.view.php';
include __DIR__ . "/../models/Users.model.php";

use App\Views\Perso as PersoView;
use App\Controllers\Component\Menu;
use App\Models\Users;


class Perso
{

    protected $advert;

    public function countTotal()
    {
        $stock = 0;
        foreach ($this->advert as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == "actual_price") {
                    $stock += (int)$v;
                }
            }
        }

        return $stock;
    }

    public function winAdvert()
    {
        //. Connexion Base de données
        include  __DIR__ . "/../core/database.php";

        $this->advert = $dbh->query("SELECT c.model , c.brand, a.actual_price , a.id FROM adverts a INNER JOIN car c ON c.id = a.car_id WHERE a.bidder_id = $_SESSION[id]")->fetchAll(\PDO::FETCH_ASSOC);
    }
    // SELECT  a.id, a.actual_price, a.final_date, a.description, c.model, c.brand, c.power FROM adverts a INNER JOIN car c ON c.id = a.car_id WHERE a.bidder_id = 39

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
