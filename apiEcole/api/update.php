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
$eleve->nomE = $_GET['nomE'];
$eleve->prenomE = $_GET['prenomE'];
$eleve->idClasse = $_GET['idClasse'];
$eleve->idFormation = $_GET['idFormation'];
if($eleve->updateEleve()){
    echo json_encode("Elève modifié !");
} else{
    echo json_encode("Erreur");
}

/* Profs */
$prof->idP = isset($_GET['idP']) ? $_GET['idP'] : die();
$prof->nomP = $_GET['nomP'];
$prof->prenomP = $_GET['prenomP'];
$prof->idClasse = $_GET['idClasse'];
if($prof->updateEleve()){
    echo json_encode("Prof modifié !");
} else{
    echo json_encode("Erreur");
}

/* Classes */
$classe->idC = isset($_GET['idC']) ? $_GET['idC'] : die();
$classe->libelleC = $_GET['libelleC'];
if($classe->updateClasse()){
    echo json_encode("Classe modifiée !");
} else{
    echo json_encode("Erreur");
}

/* Materiels */
$mate->idM = isset($_GET['idM']) ? $_GET['idM'] : die();
$mate->libelleM = $_GET['libelleM'];
if($mate->updateMateriel()){
    echo json_encode("Matériel modifié !");
} else{
    echo json_encode("Erreur");
}

/* Cours */
$cours->idCo = isset($_GET['idCo']) ? $_GET['idCo'] : die();
$cours->libelleCo = $_GET['libelleCo'];
if($cours->updateCours()){
    echo json_encode("Cours modifié !");
} else{
    echo json_encode("Erreur");
}

/* Formations */
$form->idF = isset($_GET['idF']) ? $_GET['idF'] : die();
$form->libelleF = $_GET['libelleF'];
$form->descriptionF = $_GET['descriptionF'];
if($form->updateFormation()){
    echo json_encode("Formation modifiée !");
} else{
    echo json_encode("Erreur");
}

?>