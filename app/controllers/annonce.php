<?php

namespace App\Controllers;

/* Includes */

include __DIR__ . "/../views/annonce.view.php";
//include __DIR__ . "/../models/Adverts.model.php";


/* Uses */

use App\Views\Annonce as AnnonceView;
use App\Models\Adverts as Adverts;

class Annonce
{
  protected $advert;
  protected $bidder;

  public function databaseSetActualPrice()
  {
    $Advert = new Adverts();
    $Advert->databaseSetActualPrice();
  }

  public function render()
  {
    $Advert = new Adverts();
    $Advert->databaseGetAdvert();
    $this->advert = $Advert->getAdvert();
    $this->bidder = $Advert->getBidder();
    $annonceView = new AnnonceView($this->advert, $this->bidder);
    $annonceView->render();
  }
}
