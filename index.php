<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=microservice_api', 'root', '');
    $bdd-> setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); //les noms des champs seront en miniscules
    $bdd-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //les erreurs lanceront des exceptions
}
catch (Exception $e) {
    die ('Une erreur est survenue !');
}


