# Démo routeur

## Le projet

Ce projet est une base d'application PHP utilisant un système de routage. Le **routeur** peut prendre en charge les requêtes **GET** et **POST**.

### Architecture du projet

```
app
 | controllers <-- Dossier des (classes) controleurs
 | core <-- Dossier contenant les classes de base du projet
 |   | Router.class.php <-- Classe Routeur
 |   | Route.class.php <-- Class Route
 | index.php <-- Point d'entrée de l'applicatoin

assets
 | images <-- images
 | scripts <-- scripts js
 | styles <-- style css
 
```

### Mode de fonctionnement

Le fichier .htaccess configure le serveur Apache pour qu'il cherche en priorité si le fichier demandé dans la requête existe dans le dossier assets (par exemple: /assets/styles.style.css). Si ce n'est pas le cas, le point d'entrée de l'application index.php est appelé.


## Ajouter une route

### Créer le controller

Dans le dossier app/controllers, créez une **nouvelle classe** contenant une **methode** permettant de **traiter la requête** et **d'afficher la page**. Vous pouvez également ajouter une nouvelle méthode à une classe controleur existante.

N'hésitez pas à vous inspirer des classes existantes.


### Créer la route

Dans le fichier index.php, importez votre controller (si ce n'est pas déjà le cas). Si vous utilisez un namespace, n'oubliez pas ajouter un use si vous souhaitez utilise un alias.

Vous pouvez ensuite ajouter à la suite des routes existantes votre ou vos nouvelles routes.

Pour une route **GET**:
```
$router->get("/chemin",  [new NomDeLaClasseController(), 'nom_de_la_methode']);
```

Pour une route **POST**:
```
$router->post("/chemin",  [new NomDeLaClasseController(), 'nom_de_la_methode']);
```