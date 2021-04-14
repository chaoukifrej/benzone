<?php

/**
 * controllers/login.php - Controleur accueil pour la page de connexion
 */

/* Namespace */

namespace App\Controllers;

include_once __DIR__ . '/../views/login.view.php';
include_once __DIR__ . "/../models/Users.model.php";


use App\Views\Login as LoginView;
use App\Models\Users;

class Login
{
    public function registration()
    {
        $Users = new Users();
        $Users->registration();
    }

    public function connection()
    {
        $Users = new Users();
        $Users->connection();
    }

    /**
     * Affichage de la page de connexion
     */
    public function render()
    {
        $userView = new LoginView;
        $userView->render();
    }
}
