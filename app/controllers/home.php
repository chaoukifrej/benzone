<?php

/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Controllers;

/* Includes */

include __DIR__ . "/../views/home.view.php";
include __DIR__ . "/../models/Adverts.model.php";


/* Uses */

use App\Views\Home as HomeView;
use App\Models\Adverts;


class Home
{
    protected $adverts;

    public function render()
    {
        $Adverts = new Adverts();
        $Adverts->databaseGetAdverts();
        $this->adverts = $Adverts->getAdverts();
        $homeView = new HomeView($this->adverts);
        $homeView->render();
    }
}
