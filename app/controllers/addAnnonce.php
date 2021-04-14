<?php

/**
 * controllers/addAnnonce.php - Controleur pour ajouter une annonce
 */

/* Namespace */

namespace App\Controllers;

include __DIR__ . "/../views/addAnnonce.view.php";

use App\Views\AddAnnonce as AddAnnonceView;
use App\Models\Adverts;


/* Class Name= AddAnnonce */

class AddAnnonce
{

  public function render()
  {
    $addAnnonceview = new AddAnnonceView();

    $addAnnonceview->render();
  }

  public function addCar()
  {
    $adverts = new Adverts();

    $adverts->addCar();
  }
}
