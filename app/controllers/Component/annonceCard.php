<?php

namespace App\Controllers\Component;

class AnnonceCard
{
  protected $annonce = [
    'id' => 1,
    'first_price' => 1000,
    'actual_price' => 3000,
    'start_date' => '',
    'final_date' => '15-04-2021 à minuit',
    'description' => 'blablabla',
    'picture' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.ex4dVJr7CiFugcZ58CWvxgHaE9%26pid%3DApi&f=1',
    'brand' => 'Porsche',
    'model' => '911 Carrera S'
  ];

  public function __construct()
  {
    echo $this->render();
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
}
