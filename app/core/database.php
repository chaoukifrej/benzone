<?php

//. CONFIGURATION CONNEXION
$db_address = "mysql:dbname=benzone;host=localhost";
$db_user = "root";
$db_password = "root";

//. CONNEXION
$dbh = new \PDO($db_address, $db_user, $db_password);
