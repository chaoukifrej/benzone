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
      if ($_SESSION['is_connected'] ?? false) { ?>
        <a class="headerLink connexion" href="perso"><?= strtoupper($_SESSION['lastname']); ?> <?= strtoupper($_SESSION['firstname']); ?></a>
        <?php } else {
        if (strpos($_SERVER["REQUEST_URI"], 'login')) { ?>
          <a class="headerLink connexion" id='actualLink' href="login">CONNEXION</a>
        <?php } else { ?>
          <a class="headerLink connexion" href="login">CONNEXION</a>
      <?php }
      } ?>

    </div>
<?php }

  public function displayMenu($link)
  {
    foreach ($this->menu as $key => $value) {
      if ($key != $link) {
        if ($_SESSION['is_connected'] ?? false) {
          echo "<a class='headerLink' href='$value'>$key</a> ";
        } else {
          if ($key == 'VENDRE') {
            echo "<a class='headerLink' href='login'>$key</a> ";
          } else {
            echo "<a class='headerLink' href='$value'>$key</a> ";
          }
        }
      } else {
        echo "<a class='headerLink' id='actualLink' href='$value'>$key</a> ";
      }
    }
  }
}
