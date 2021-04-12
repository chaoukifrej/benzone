<?php

/**
 * index.php - Point d'entrée de l'application
 * C'est ici que l'on défini les routes 
 * et les fonctions des controleurs qui dervont être appelées
 */

/* Imports */
require_once __DIR__ . "/core/Router.class.php"; // Routeur
include_once __DIR__ . "/controllers/home.php";
include_once __DIR__ . "/controllers/default.php";
include_once __DIR__ . "/controllers/perso.php";
include_once __DIR__ . "/controllers/login.php";
include_once __DIR__ . "/controllers/annonce.php";
include_once __DIR__ . "/controllers/contact.php";
include_once __DIR__ . "/controllers/addAnnonce.php";




use App\Router\Router;
use App\Controllers\Home;
use App\Controllers\DefaultPage;
use App\Controllers\Perso;
use App\Controllers\Login;
use App\Controllers\AddAnnonce;



//controller annonce class Annonce
use App\Controllers\Annonce;

//controller contact class Contact
use App\Controllers\Contact;


/**
 * Requête
 */
$method = $_SERVER['REQUEST_METHOD']; // Récupération du verbe
$uri = $_GET['uri']; // Récupération de l'URI


/**
 * Router
 */

/* Création du routeur */
$router = new Router($uri, $method);


/**
 * Routes
 */

/* GET / - Page d'accueil accés direct*/
$router->get("/",  [new Home(), 'render']);

/* GET / - Page d'accueil accés par clic*/
$router->get("/accueil",  [new Home(), 'render']);

// GET /addAnnonce - AJOUTER UNE ANNONCE 
$router->get("/addAnnonce", [new AddAnnonce(), 'render']);

/* POST / - Add Car */
$router->post("/addAnnonce", [new AddAnnonce(), 'addCar']);

/* GET Page perso*/
$router->get("/perso", [new Perso(), 'render']);

//POST - Page Perso 
if (isset($_POST['is_connected'])) {
    $router->post("/perso", [new Perso(), 'disconnection']);
} else {
    $router->post("/perso", [new Perso(), 'updatePerso']);
    $router->post("/perso", [new Perso(), 'displayPerso']);
}


/* GET / - Page de connexion */
$router->get("/login", [new Login(), 'render']);

/* POST / - Page d'inscription */
if (isset($_POST['firstname']) and isset($_POST['lastname'])) {
    $router->post("/login", [new Login(), 'registration']);
} else {
    /* POST / - Page de connexion */
    $router->post("/login", [new Login(), 'connection']);
}






// GET / - Page annonce
$router->get("/annonce",  [new Annonce(), 'render']);

// POST / - Page annonce
$router->post("/annonce",  [new Annonce(), 'databaseSetActualPrice']);

// GET / - Page contact
$router->get("/contact",  [new Contact(), 'render']);






/* Route par défaut */
$router->default([new DefaultPage(), 'render']);



/**
 * Recherche de routes correspondantes
 */

/* Démarrage du routeur */
$router->start();
