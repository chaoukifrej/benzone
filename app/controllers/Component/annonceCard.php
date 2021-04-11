<?php

namespace App\Controllers\Component;

class AnnonceCard
{
  protected $annonce;

  public function __construct()
  {
    //echo $this->render();
  }

  public function render()
  {
    return <<<HTML
    <div class="annonceCard">
      <h3>{$this->annonce['brand']} {$this->annonce['model']}</h3>
      <div class="pContainer">
        <p><span>MEILLEURE ENCHERE : </span><br/>{$this->annonce['actual_price']} €</p>
        <p><span>TERMINE LE : </span><br/>{$this->annonce['final_date']}</p>
      </div>
      <img src="{$this->annonce['picture']}" alt="image véhicule">
    </div>
HTML;
  }

  //Set the value of annonce
  public function setAnnonce($annonce)
  {
    $this->annonce = $annonce;
    return $this; //@return  self
  }
}
