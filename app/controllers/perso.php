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
use App\Models\Users;
use App\Models\Adverts;


class Perso
{

    protected $advert;

    public function disconnection()
    {
        $disconected = new Users();
        $disconected->disconnection();
    }

    public function updatePerso()
    {
        $user  = new Users();
        $user->updatePerso();
    }

    public function render()
    {
        $advert = new Adverts();
        $advert->winAdvert();
        $this->advert = $advert->getAdvert();
        $pagePerso = new PersoView($this->advert);
        $pagePerso->render();
    }
}
