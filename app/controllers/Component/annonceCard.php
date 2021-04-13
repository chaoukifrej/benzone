<?php

namespace App\Controllers\Component;

use DateTime;

class AnnonceCard
{
  protected $annonce;

  public function __construct($annonce)
  {
    $this->annonce = $annonce;
    echo $this->render();
  }

  public function checkDate()
  {
    $now = new DateTime();
    $date = new DateTime($this->annonce['final_date']);
    if ($date > $now) {
      return true;
    } else {
      return false;
    }
  }
  public function getDate()
  {
    $date = new DateTime($this->annonce['vehicle_year']);
    return $date->format('Y');
  }

  public function render()
  {
    if ($this->checkDate()) {
      //donc annonce non terminé
      return <<<HTML
    <form action="annonce" method="get">
      <button id="btnSubmitAnnonce" type="submit">
      <div class="annonceCard">
            <h3>{$this->annonce['brand']} {$this->annonce['model']} <span>{$this->getDate()}</span></h3>
            <div class="pContainer">
              <p><span>MEILLEURE ENCHERE : </span><br/>{$this->annonce['actual_price']} €</p>
              <p><span>TERMINE LE : </span><br/>{$this->annonce['final_date']}</p>
            </div>
            <img src="{$this->annonce['picture']}" alt="image véhicule">
            <input type="hidden" name="id" value="{$this->annonce['id']}">
          </div>
        </button>
    </form>
HTML;
    } else {
      return <<<HTML
      <form action="annonce" method="get">
        <button id="btnSubmitAnnonce" type="submit">
        <div class="annonceCard">
              <h3>{$this->annonce['brand']} {$this->annonce['model']} <span> {$this->getDate()}</span></h3>
              <div class="pContainer">
                <p><span>MEILLEURE ENCHERE : </span><br/>{$this->annonce['actual_price']} €</p>
                <p><span style="color:red; font-size:0.9rem;">TERMINÉ !</span><br/></p>
              </div>
              <img src="{$this->annonce['picture']}" alt="image véhicule">
              <input type="hidden" name="id" value="{$this->annonce['id']}">
            </div>
          </button>
      </form>
  HTML;
    };
  }
}
