<?php

namespace App\Controllers\Component;

class AnnonceCard
{
  protected $annonce;

  public function __construct($annonce)
  {
    $this->annonce = $annonce;
    echo $this->render();
  }

  public function render()
  {
    return <<<HTML
    
    <form action="annonce" method="get">
      <button id="btnSubmitAnnonce" type="submit">
      <div class="annonceCard">
            <h3>{$this->annonce['brand']} {$this->annonce['model']}</h3>
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
  }
}
