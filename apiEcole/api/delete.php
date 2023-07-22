<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../database.php';
include_once '../Eleves.php';
include_once '../Profs.php';
include_once '../Cours.php';
include_once '../Classes.php';
include_once '../Formations.php';
include_once '../Materiels.php';

$database = new Database();
$db = $database->getConnection();
$eleve = new Eleves($db);
$prof = new Profs($db);
$cours = new Cours($db);
$classe = new Classes($db);
$formation = new Formations($db);
$materiel = new Materiels($db);

/* Eleves */
$eleve->idE = isset($_GET['idE']) ? $_GET['idE'] : die();

if($eleve->deleteEleve()){
    echo json_encode("Eleve supprimé !");
} else{
    echo json_encode("Erreur !");
}

/* Profs */
$prof->idP = isset($_GET['idP']) ? $_GET['idP'] : die();

if($prof->deleteProf()){
    echo json_encode("Prof supprimé !");
} else{
    echo json_encode("Erreur !");
}

/* Classes */
$classe->idC = isset($_GET['idC']) ? $_GET['idC'] : die();

if($classe->deleteClasse()){
    echo json_encode("Classe supprimée !");
} else{
    echo json_encode("Erreur !");
}

/* Materiels */
$mate->idM = isset($_GET['idM']) ? $_GET['idM'] : die();

if($mate->deleteMateriel()){
    echo json_encode("Matériel supprimé !");
} else{
    echo json_encode("Erreur !");
}

/* Cours */
$cours->idCo = isset($_GET['idCo']) ? $_GET['idCo'] : die();

if($cours->deleteCours()){
    echo json_encode("Cours supprimé !");
} else{
    echo json_encode("Erreur !");
}

/* Formation */
$form->idF = isset($_GET['idF']) ? $_GET['idF'] : die();

if($form->deleteFormation()){
    echo json_encode("Formation supprimée !");
} else{
    echo json_encode("Erreur !");
}

?>