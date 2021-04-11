<?php

namespace App\Controllers\Component;

class Menu
{
  protected $menu = [
    "ENCHÈRES" => "accueil",
    "VENDRE" => "addAnnonce",
    "CONTACT" => "contact",
  ];

  public function __construct($link = "")
  { ?>
    <link rel="stylesheet" href="assets/styles/style.css" />
    <link rel="stylesheet" href="assets/styles/header.css">
    <div class="header">
      <a href="accueil"><img class="headerLogo" src="assets/img/headerLogo.png" alt="logo Benzone"></a>
      <nav>
        <?php $this->displayMenu($link) ?>
      </nav>
      <?php
      /* $string = $_SERVER["REQUEST_URI"];
      if (\str_contains($string, 'login')) {
        echo $string;
      } */
      ?>
      <a class="headerLink connexion" href="login">CONNEXION</a>
    </div>
<?php }

  public function displayMenu($link)
  {
    foreach ($this->menu as $key => $value) {
      if ($key != $link) {
        echo "<a class='headerLink' href='$value'>$key</a> ";
      } else {
        echo "<a class='headerLink' id='actualLink' href='$value'>$key</a> ";
      }
    }
  }
}
