<?php


/**
 * controllers/home.php - Controleur accueil pour la page d'accueil
 */

/* Namespace */

namespace App\Views;



use App\Controllers\Component\Menu;



class Perso
{

    protected $advert;

    public function __construct($advert)
    {
        $this->advert = $advert;
    }

    public function countTotal()
    {
        $stock = 0;
        foreach ($this->advert as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == "actual_price") {
                    $stock += (int)$v;
                }
            }
        }

        return $stock;
    }


    /* fonction rendu visuel */
    public function render()
    {
?>


        <!-- affichage Modif Profil -->

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="./assets/style.css">
            <link rel="stylesheet" href="./assets/styles/perso.css">
            <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
            <title><?= $_SESSION['lastname'] ?> <?= $_SESSION['firstname'] ?></title>
        </head>

        <body>

            <?php
            new Menu();

            ?>
            <div class="mainContainer">
                <div class="persoInfo">
                    <form action="perso" method="POST">
                        <input type="hidden" value="0" name="is_connected">
                        <input type="submit" value="deconnexion">
                    </form>
                </div>
                <div class="profil">
                    <div class="modifProfil">
                        <form class="modif" action="perso" method="POST">
                            <h1>modifier votre profil</h1>
                            <label for="">modifier votre Nom</label>
                            <input name="lastname" type="text" value="<?= $_SESSION['lastname'] ?>">
                            <label for="">modifier votre Prenom</label>
                            <input name="firstname" type="text" value="<?= $_SESSION['firstname'] ?>">
                            <label for="">modifier votre Email</label>
                            <input name="email" type="text" value="<?= $_SESSION['email'] ?>">
                            <label for="">modifier votre Mot de passe</label>
                            <input name="password" type="password">
                            <label for="">confirmer votre nouveau mot de passe</label>
                            <input type="password">
                            <input class="button" value="Modifier" name="send" type="submit">
                        </form>
                    </div>
                </div>
                <div class="cardPerso">
                    <h3>Encheres en cours (<?= $this->countTotal() . " €"; ?>)</h3>
                    <?php
                    foreach ($this->advert as $value) { ?>
                        <form action="annonce" method="GET">
                            <button type="submit">
                                <?php echo $value['brand'] . ' ' . $value['model'] . ' ' . $value['actual_price'] . '€<br />'; ?>
                                <input type="hidden" name="id" value="<?= $value['id']; ?>">
                            </button>
                        </form>
                    <?php  } ?>
                </div>




            </div>
            <?php include __DIR__ . '/../controllers/Component/footer.php'; ?>
        </body>

        </html>
<?php
    }
}
