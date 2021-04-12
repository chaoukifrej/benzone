<?php

/**
 * controllers/registration.php - Controller inscription
 */

/* Namespace */

namespace App\Controllers;

class Registration
{

    public function userRegistration()
    {
        //. INSCRIPTION
        if (!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
            //. NETTOYAGE 
            $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);
            $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

            $data_validated = true;

            //. VERIFICATION
            if (filter_var($_POST["lastname"], FILTER_SANITIZE_STRING) === false) {
                $data_validated = false;
            } elseif (filter_var($_POST["firstname"], FILTER_SANITIZE_STRING) === false) {
                $data_validated = false;
            } elseif (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
                $data_validated = false;
            } elseif (filter_var($_POST["password"], FILTER_SANITIZE_STRING) === false) {
                $data_validated = false;
            }


            //. Connexion Base de données
            include_once  __DIR__ . "/../core/database.php";


            //. INSCRIPTION UTILISATEURS
            if ($data_validated === true) {
                $query = $dbh->prepare('INSERT INTO users(lastname, firstname, email, password) VALUES (?, ?, ?, ?)');
                $result = $query->execute([ucfirst($lastname), $firstname, $email, $password]);
            }
        }
        header('location: login');
    }
}
