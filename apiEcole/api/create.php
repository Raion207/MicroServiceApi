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
$eleve->nomE = $_GET['nomE'];
$eleve->prenomE = $_GET['prenomE'];
$eleve->idClasse = $_GET['idClasse'];
$eleve->idFormation = $_GET['idFormation'];
if($eleve->createEleves()){
    echo "Elève ajouté !";
} else{
    echo "Erreur !";
}

/* Profs */
$prof->nomP = $_GET['nomP'];
$prof->prenomP = $_GET['prenomP'];
$prof->idClasse = $_GET['idClasse'];
if($prof->createProfs()){
    echo "Prof ajouté !";
} else{
    echo "Erreur !";
}

/* Classes */
$classe->libelleC = $_GET['libelleC'];
if($classe->createClasses()){
    echo "Classe ajoutée !";
} else{
    echo "Erreur !";
}

/* Materiels */
$mate->libelleM = $_GET['libelleM'];
if($mate->createMateriel()){
    echo "Matériel ajouté !";
} else{
    echo "Erreur !";
}

/* Cours */
$cours->libelleCo = $_GET['libelleCo'];
if($cours->createCours()){
    echo "Cours ajouté !";
} else{
    echo "Erreur !";
}

/* Formations */
$form->libelleF = $_GET['libelleF'];
$form->descriptionF = $_GET['descriptionF'];
if($form->creatFormations()){
    echo "Formation ajoutée !";
} else{
    echo "Erreur !";
}

?>