<?php

namespace App\Views;


/* Uses */

use App\Controllers\Component\Menu;


class Annonce
{
  protected $advert;
  protected $bidder;

  public function __construct($advert, $bidder)
  {
    $this->advert = $advert;
    $this->bidder = $bidder;
  }

  // function de transformation date
  public function createDateFrom($date)
  {
    return new \DateTime($date);
  }

  public function checkDate()
  {
    $now = new \DateTime();
    $date = new \DateTime($this->advert['final_date']);
    if ($date > $now) {
      return true;
    } else {
      return false;
    }
  }

  //Affichage de la page annonce
  public function render()
  {
?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title><?= $this->advert['brand']; ?>
        <?= $this->advert['model']; ?> - Benzone</title>
      <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
      <link rel="stylesheet" href="assets/styles/style.css" />
      <link rel="stylesheet" href="assets/styles/annonce.css" />
    </head>

    <body>
      <?php
      //Ajout Header
      new Menu();
      ?>
      <div id="mainContainer">
        <a class="btnRetour" href="accueil"> <img src="assets/img/arrow.svg" alt=""> Retour</a>
        <!-- Titre -->
        <h1>
          <?= $this->advert['brand']; ?>
          <?= $this->advert['model']; ?> -
          <?= $this->createDateFrom($this->advert['vehicle_year'])->format('Y'); ?>
        </h1>

        <!-- Premier paragraphe -->
        <p class="termineAndEnchere"><?php if ($this->checkDate()) { ?>
            <span class="terminele">Termine le</span> <span class="termineDate"> <?= $this->createDateFrom($this->advert['final_date'])->format('d/m/Y'); ?></span>
          <?php } else { ?>
            <span style="font-weight: 500;" class="terminele">TERMINÉ !</span>
          <?php }; ?>
          <span class="enchere">Meilleure enchère : </span><span class="enchereNB"><?= (int)$this->advert['actual_price']; ?> €</span>
        </p>

        <!-- Image Véhicule -->
        <img class="imgVehicle" src="<?= $this->advert['picture']; ?>" alt="">

        <!-- Description -->
        <p class="description"><?= $this->advert['description']; ?></p>

        <!-- DIV container -->
        <div class="divContainerDescription">
          <!-- Description ++ DIV -->
          <div class="descriptionContainer">
            <p>
              <span class="firstD">PUISSANCE :</span>
              <span class="secondD"><?= $this->advert['power']; ?>cv</span>
            </p>
            <p>
              <span class="firstD">NOMBRE DE KILOMETRE :</span>
              <span class="secondD"><?= $this->advert['vehicle_km']; ?>km</span>
            </p>
            <p>
              <span class="firstD">DATE D'IMMATRICULATION :</span>
              <span class="secondD"><?= $this->createDateFrom($this->advert['vehicle_year'])->format('d/m/Y'); ?></span>
            </p>
            <p>
              <span class="firstD">PROPRIETAIRE :</span>
              <span class="secondD"><?= ucfirst($this->advert['ownerfn']); ?> <?= ucfirst($this->advert['ownerln']); ?></span>
            </p>
          </div>

          <!-- Description -- DIV -->
          <div class="descriptionContainer">
            <p>
              <span class="firstD">CONTROLE TECHNIQUE :</span>
              <span class="secondD">Oui</span>
            </p>
            <p>
              <span class="firstD">CARTE GRISE :</span>
              <span class="secondD">Française</span>
            </p>
            <p>
              <span class="firstD">VENDEUR :</span>
              <span class="secondD">Particulier</span>
            </p>
            <p>
              <span class="firstD">PRIX DE RESERVE :</span>
              <span class="secondD">Oui</span>
            </p>
          </div>

          <!-- Encher DIV -->
          <?php if ($this->checkDate()) { //! annonce non terminé 
          ?>
            <?php if ($_SESSION['is_connected'] ?? false) { //? utilisateur connecté 
            ?>
              <div class="descriptionContainer encherirContainer">
                <h3 class="titreE">Enchérir</h3>
                <form action="annonce" method="post">
                  <label for="price">Montant</label>
                  <input type="number" name="new_price" id="price">
                  <input type="hidden" name="id" value="<?= $this->advert['id']; ?>">
                  <input type="hidden" name="actual_price" value="<?= $this->advert['actual_price']; ?>">
                  <button type="submit">Valider</button>
                </form>
              </div>
            <?php } else { //? utilisateur NON connecté 
            ?>
              <div class="descriptionContainer encherirContainer notConnected">
                <h3 class="titreE">Enchérir</h3>
                <p class="notConnectedP">Connectez-vous pour enchèrir</p>
                <br /><a class="notConnectedA" href="login">Connexion</a>
              </div>
            <?php };
          } elseif ($this->bidder['bidderln'] ?? false) { //! annonce terminé sans Bidder 
            ?>
            <div class="descriptionContainer encherirContainer notConnected">
              <h3 class="titreE">Remporté par :</h3>
              <p style="font-size:1.1rem" class="notConnectedP"><?= ucfirst($this->bidder['bidderln']); ?> <?= $this->bidder['bidderfn']; ?></p>
            </div>

          <?php } else { //!annonce terminé avec Bidder 
          ?>
            <div class="descriptionContainer encherirContainer notConnected">
              <h3 class="titreE">Remporté par :</h3>
              <p style="font-size:1.1rem" class="notConnectedP"> Aucune personne</p>
            </div>
          <?php }; ?>
        </div>
      </div>

      <?php
        //var_dump($this->bidder);
      ; ?>
      <?php include __DIR__ . "/../controllers/Component/footer.php"; ?>
    </body>

    </html>

<?php
  }
}
