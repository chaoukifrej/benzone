<?php

/**
 * controllers/addAnnonce.php - Controleur pour ajouter une annonce
 */

/* Namespace */

namespace App\Controllers;

use App\Controllers\Component\Menu;

class AddAnnonce
{

  /**
   * Affichage de la création annonce
   */
  public function render(){

    ?>

<!DOCTYPE html>
    <html>

    <head>
      <meta charset="utf-8">
      <title>AddAnnonce</title>
     
      <link rel="stylesheet"  href="./assets/styles/style.css" />
      <link rel="stylesheet" href="./assets/styles/addannonce.css" />
    </head>

    <body>

      <?php include_once __DIR__ . "/Component/header.php";
      new Menu('VENDRE');
      ?>

      <div id="conteneurGeneral">
        <div id="leftBox">
      <h2 id="titleAddAnnonce" >AJOUTER UNE ANNONCE</h1>

      <form action="" method="POST">
<label for="">Marque : </label>
        <select name="brand" id="">
          <option value="abarth">ABARTH</option> <!-- Select Abarth value => abarth -->
          <option value="ac">AC</option>
          <option value="aixam">AIXAM</option>
          <option value="alfa_romeo">ALFA ROMEO</option>
          <option value="alke">ALKE</option>
          <option value="alpina">ALPINA</option>
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
        </select><br><br>

        <label for="">Modèle : </label>
        <input id="inputModel"  name="model" type="text"><br><br>

        <label for="">Puissance (CV) : </label>
        <input id="inputPower" name="power" type="number"><br><br>

        <label for="">Kilométrage : </label>
        <input id="inputKM" type="number"><br><br>

        <label for="">Année du véhicule : </label>
        <input id="inputBirth" type="number"><br><br>


        <button>Valider</button><br><br>

      </form>
  </div>

      <div id="rightBox">
        <h2>Aperçus de votre annonce :</h2>
<p id="resultat"></p>
      </div>

      </div> 

      <script type="text/javascript" src="./assets/js/addAnnonce.js"></script>
    </body>

    </html>

<?php
  }}