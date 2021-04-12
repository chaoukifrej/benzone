<?php

/**
 * controllers/addAnnonce.php - Controleur pour ajouter une annonce
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;



/* Class Name= AddAnnonce */

class AddAnnonce
{

  /**
   * 
   * FUNCTION ADD ANNONCE / INSERT BDD
   * 
   */

  // FONCTION CREER UNE VOITURE
  public function add_car()
  {
    //! Connexion Base de données
    include_once  __DIR__ . "/../core/database.php";

    //. Déclaration données
    $brand = $_POST["brand"];
    $model = $_POST["model"];
    $power = $_POST["power"];
    $km = $_POST["km"];
    $vehicleYear = $_POST["vehicleYear"];

    //? Préparation de la requête
    $query = $dbh->prepare("INSERT INTO car (model, brand ,power , vehicle_year, vehicle_km) VALUES (?,?,?,?,?)");

    //? Execution de la requête 
    $result = $query->execute([$model, $brand, $power, $vehicleYear, $km]);
  }


  // FONCTION AJOUTER UNE ANNONCE
  public function add_adverts()
  {
    include_once  __DIR__ . "/../core/database.php";

    $firstPrice = $_POST["firstPrice"];
    $finalDate = $_POST["finalDate"];
    $descriptionAnnonce = $_POST["descriptionAnnonce"];
    $picture = $_POST["picture"];

    $query = $dbh->prepare("INSERT INTO adverts (first_price, final_date, description, picture) VALUES (?,?,?,?)");
    $result = $query->execute([$firstPrice, $finalDate, $descriptionAnnonce, $picture]);

    echo $finalDate;
  }

  /**
   * 
   * FUNCTION AFFICHAGE FORM VIEW
   * 
   */

  public function render()
  {

?>

    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>AddAnnonce</title>
      <link rel="stylesheet" href="./assets/styles/style.css" />
      <link rel="stylesheet" href="./assets/styles/addannonce.css" />
    </head>

    <body>

      <?php include_once __DIR__ . "/Component/header.php";
      new Menu('VENDRE');
      ?>



      <h2 id="titleAddAnnonce">AJOUTER UNE ANNONCE</h2>
      <div id="conteneurGeneral">

        <form action="addAnnonce" method="POST">
          <h4>Informations du véhicule</h4>

          <label for="">Marque : </label><br><br>
          <select name="brand" id="selectBrand">
            <option value="abarth">ABARTH</option>
            <option value="ac">AC</option>
            <option value="aixam">AIXAM</option>
            <option value="alfa_romeo">ALFA ROMEO</option>
            <option value="alke">ALKE</option>
          </select><br><br>

          <hr class="hrAddAnnonce"><br>

          <label for="">Modèle : </label><br><br>
          <input id="inputModel" name="model" type="text"><br><br>

          <hr class="hrAddAnnonce"><br>

          <label for="">Puissance (CV) : </label><br><br>
          <input id="inputPower" name="power" type="number"><br><br>

          <hr class="hrAddAnnonce"><br>

          <label for="">Kilométrage : </label><br><br>
          <input id="inputKM" type="number" name="km"><br><br>

          <hr class="hrAddAnnonce"><br>

          <label for="">Année du véhicule : </label><br><br>
          <input id="inputBirth" type="date" name="vehicleYear"><br><br>

          <h4>Informations de l'enchère</h4>

          <!-- Label / Input prix de départ -->
          <label for="">Prix de départ : </label><br><br>
          <input id="inputStartPrice" type="text" name="firstPrice">

          <br><br>
          <hr class="hrAddAnnonce"><br>

          <!-- Label / Input durée de l'enchère -->
          <label for="">Durée de l'enchère : </label><br><br>
          <input id="inputTimeEnchere" type="date" name="finalDate">

          <br><br>
          <hr class="hrAddAnnonce"><br>

          <!-- Label / Text Area description -->
          <label for="">Description : </label><br><br>
          <textarea name="descriptionAnnonce" id="" cols="30" rows="10"></textarea>

          <br><br>
          <hr class="hrAddAnnonce"><br>

          <!-- Label / Input photos -->
          <label for="">Photos : </label><br><br>
          <input type="text" name="picture">

          <br><br>
          <hr class="hrAddAnnonce"><br>


          <input type="submit"><br><br>

        </form>



      </div>

      <?php include_once __DIR__ . "/Component/footer.php";
      ?>

      <script type="text/javascript" src="./assets/js/addAnnonce.js"></script>
    </body>

    </html>

<?php
  }
}

  /*          <option value="alpina">ALPINA</option>
          <option value="alpine">ALPINE</option>
          <option value="apal">APAL</option>
          <option value="ariel">ARIEL</option>
          <option value="aston_martin">ASTON MARTIN</option>
          <option value="austin">AUSTIN</option>
          <option value="auto_union">AUTO UNION</option>
          <option value="autobianchi">AUTOBIANCHI</option>
          <option value="bellier">BELLIER</option>
          <option value="bentley">BENTLEY</option>
          <option value="bmw">BMW</option>
          <option value="bollore">BOLLORE</option>
          <option value="bugatti">BUGATTI</option>
          <option value="buik">BUIK</option>
          <option value="burby_s">BURBY S</option>
          <option value="cadillac">CADILLAC</option>
          <option value="casalini">CASALINI</option>
          <option value="caterham">CATERHAM</option>
          <option value="chatenet">CHATENET</option>
          <option value="chevrolet">CHEVROLET</option>
          <option value="chrysler">CHRYSLER</option>
          <option value="citroen">CITROEN</option>
          <option value="cupra">CUPRA</option>
          <option value="dacia">DACIA</option>
          <option value="daewoo">DAEWOO</option>
          <option value="daf">DAF</option>
          <option value="daihatsu">DAIHATSU</option>
          <option value="daimler">DAIMLER</option>
          <option value="dallara">DALLARA</option>
          <option value="dangel">DANGEL</option>
          <option value="datsun">DATSUN</option>
          <option value="de_soto">DE SOTO</option>
          <option value="de_tomaso">DE TOMASO</option>
          <option value="devinci">DEVINCI</option>
          <option value="dodge">DODGE</option>
          <option value="donkervoort">DONKERVOORT</option>
          <option value="ds">DS</option>
          <option value="due">DUE</option>
          <option value="embuggy">EMBUGGY</option>
          <option value="excalibur">EXCALIBUR</option>
          <option value="ferrari">FERRARI</option>
          <option value="fiat">FIAT</option>
          <option value="fiberfab">FIBERFAB</option>
          <option value="fisker">FISKER</option>
          <option value="ford">FORD</option>
          <option value="fuso">FUSO</option>
          <option value="gmc">GMC</option>
          <option value="goupil">GOUPIL</option>
          <option value="honda">HONDA</option>
          <option value="hotchkiss">HOTCHKISS</option>
          <option value="hudson">HUDSON</option>
          <option value="hummer">HUMMER</option>
          <option value="hyundai">HYUNDAI</option>
          <option value="infiniti">INFINITI</option>
          <option value="isuzu">ISUZU</option>
          <option value="iveco">IVECO</option>
          <option value="jaguar">JAGUAR</option>
          <option value="jeep">JEEP</option>
          <option value="jensen">JENSEN</option>
          <option value="karma">KARMA</option>
          <option value="kia">KIA</option>
          <option value="ktm">KTM</option>
          <option value="lada">LDA</option>
          <option value="lamborghini">LAMBORGHINI</option>
          <option value="lancia">LANCIA</option>
          <option value="land_rover">LAND ROVER</option>
          <option value="lexus">LEXUS</option>
          <option value="ligier">LIGIER</option>
          <option value="lincoln">LINCOLN</option>
          <option value="lola">LOLA</option>
          <option value="lotus">LOTUS</option>
          <option value="man">MAN</option>
          <option value="martin">MARTIN</option>
          <option value="maserati">MASERATI</option>
          <option value="matra">MATRA</option>
          <option value="maybach">MAYBACH</option>
          <option value="mazda">MAZDA</option>
          <option value="mclaren">MCLAREN</option>
          <option value="mega">MEGA</option>
          <option value="mercedes_amg">MERCEDES AMG</option>
          <option value="mercedes">MERCEDES</option>
          <option value="mercury">MERCURY</option>
          <option value="mg">MG</option>
          <option value="mia_electric">MIA ELECTRIC</option>
          <option value="microcar">MICROCAR</option>
          <option value="minauto">MINAUTO</option>
          <option value="mini">MINI</option>
          <option value="mitsubishi">MITSUBISHI</option>
          <option value="morgan">MORGAN</option>
          <option value="morris">MORRIS</option>
          <option value="mpm_motors">MPM MOTORS</option>
          <option value="mvs">MVS</option>
          <option value="nash">NASH</option>
          <option value="nissan">NISSAN</option>
          <option value="noun_electric">NOUN ELECTRIC</option>
          <option value="NSU">NSU</option>
          <option value="OLDSMOBIL">OLDSMOBIL</option>
          
          */