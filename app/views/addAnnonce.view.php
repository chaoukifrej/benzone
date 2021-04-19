<?php

/**
 * controllers/addAnnonce.php - Controleur pour ajouter une annonce
 */

/* Namespace */

namespace App\Views;


use App\Controllers\Component\Menu;
use DateTime;

/* Class Name= AddAnnonce */

class AddAnnonce
{
    public function date($days)
    {
        $date =  new DateTime();
        return date('Y-m-d', strtotime($days, date_timestamp_get($date)));
    }

    public function render()
    {

?>

        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <title>Créer une Annone - Benzone</title>
            <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
            <link rel="stylesheet" href="./assets/styles/style.css" />
            <link rel="stylesheet" href="./assets/styles/addannonce.css" />
        </head>

        <body>

            <?php
            new Menu('VENDRE');
            ?>
            <div id="pageG">
                <h2 id="titleAddAnnonce">AJOUTER UNE ANNONCE</h2>

                <form action="addAnnonce" method="POST">
                    <div class="grid-container">

                        <div class="item1">
                            <label for="">Marque</label><br>
                            <select name="brand" id="selectBrand" multiple>
                                <option value="abarth">ABARTH</option>
                                <option value="ac">AC</option>
                                <option value="aixam">AIXAM</option>
                                <option value="ALFA ROMEO">ALFA ROMEO</option>
                                <option value="alke">ALKE</option>
                                <option value="alpina">ALPINA</option>
                                <option value="alpine">ALPINE</option>
                                <option value="apal">APAL</option>
                                <option value="ariel">ARIEL</option>
                                <option value="aston martin">ASTON MARTIN</option>
                                <option value="austin">AUSTIN</option>
                                <option value="auto union">AUTO UNION</option>
                                <option value="autobianchi">AUTOBIANCHI</option>
                                <option value="bellier">BELLIER</option>
                                <option value="bentley">BENTLEY</option>
                                <option value="bmw">BMW</option>
                                <option value="bollore">BOLLORE</option>
                                <option value="bugatti">BUGATTI</option>
                                <option value="buik">BUIK</option>
                                <option value="burby s">BURBY S</option>
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
                                <option value="de soto">DE SOTO</option>
                                <option value="de tomaso">DE TOMASO</option>
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
                                <option value="land rover">LAND ROVER</option>
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
                                <option value="mercedes amg">MERCEDES AMG</option>
                                <option value="mercedes">MERCEDES</option>
                                <option value="mercury">MERCURY</option>
                                <option value="mg">MG</option>
                                <option value="mia electric">MIA ELECTRIC</option>
                                <option value="microcar">MICROCAR</option>
                                <option value="minauto">MINAUTO</option>
                                <option value="mini">MINI</option>
                                <option value="mitsubishi">MITSUBISHI</option>
                                <option value="morgan">MORGAN</option>
                                <option value="morris">MORRIS</option>
                                <option value="mpm motors">MPM MOTORS</option>
                                <option value="mvs">MVS</option>
                                <option value="nash">NASH</option>
                                <option value="nissan">NISSAN</option>
                                <option value="noun electric">NOUN ELECTRIC</option>
                                <option value="NSU">NSU</option>
                                <option value="OLDSMOBIL">OLDSMOBIL</option>
                            </select>
                        </div>
                        <div class="item2">
                            <!-- Label / Input prix de départ -->
                            <label for="">Prix de départ</label><br>
                            <input id="inputStartPrice" type="text" name="firstPrice">
                        </div>
                        <div class="item3">
                            <!-- Label / Input durée de l'enchère -->
                            <label for="">Fin de l'enchère</label><br>
                            <input id="inputTimeEnchere" type="date" name="finalDate" value="<?= $this->date('+15 days'); ?>" min="<?= $this->date('+7 days'); ?>">
                        </div>
                        <div class="item4">
                            <!-- Label / Input photos -->
                            <label for="">Photos : </label><br>
                            <input id="inputPicture" type="text" name="picture">
                        </div>
                        <div class="item5">
                            <label for="">Modèle : </label><br>
                            <input id="inputModel" name="model" type="text">
                        </div>
                        <div class="item6">
                            <label for="">Puissance (CV) : </label><br>
                            <input id="inputPower" name="power" type="number">
                        </div>
                        <div class="item7">
                            <!-- Label / Text Area description -->
                            <label for="">Description : </label><br>
                            <textarea name="descriptionAnnonce" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="item8">
                            <label for="">Kilométrage : </label><br>
                            <input id="inputKM" type="number" name="km"><br>
                        </div>
                        <div class="item9">
                            <label for="">Année du véhicule : </label><br>
                            <input id="inputBirth" type="date" name="vehicleYear"><br>

                        </div>
                        <div class="item10" style="text-align: center;"> <input id="btnValidate" type="submit"></div>
                    </div>

                </form>

            </div>



            <?php include __DIR__ . "/../controllers/Component/footer.php"; ?>

            <script type="text/javascript" src="./assets/js/addAnnonce.js"></script>
        </body>

        </html>

<?php
    }
}
