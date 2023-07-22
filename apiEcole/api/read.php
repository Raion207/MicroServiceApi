<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

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
$eleves = $eleve->getEleves();
$allEleves = $eleves->num_rows;
echo json_encode($allEleves);
if($allEleves > 0){
    $eleveArr = array();
    $eleveArr["body"] = array();
    $eleveArr["itemCount"] = $allEleves;
    while ($row = $allEleves->fetch_assoc())
    {
        array_push($eleveArr["body"], $row);
    }
    echo json_encode($eleveArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucun élève enregistré !")
    );
}

/* Profs */
$profs = $prof->getProfs();
$allProfs = $profs->num_rows;
echo json_encode($allProfs);
if($allProfs > 0){
    $profArr = array();
    $profArr["body"] = array();
    $profArr["itemCount"] = $allProfs;
    while ($row = $allProfs->fetch_assoc())
    {
        array_push($profArr["body"], $row);
    }
    echo json_encode($profArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucun prof enregistré !")
    );
}

/* Classes */
$classes = $classe->getClasses();
$allClasses = $classes->num_rows;
echo json_encode($allClasses);
if($allClasses > 0){
    $classeArr = array();
    $classeArr["body"] = array();
    $classeArr["itemCount"] = $allClasses;
    while ($row = $allClasses->fetch_assoc())
    {
        array_push($classeArr["body"], $row);
    }
    echo json_encode($classeArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucune classe enregistrée !")
    );
}

/* Materiels */
$mates = $mate->getMateriel();
$allMates = $mates->num_rows;
echo json_encode($allMates);
if($allMates > 0){
    $mateArr = array();
    $mateArr["body"] = array();
    $mateArr["itemCount"] = $allMates;
    while ($row = $allMates->fetch_assoc())
    {
        array_push($mateArr["body"], $row);
    }
    echo json_encode($mateArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucun materiel enregistré !")
    );
}

/* Cours */
$cours = $cours->getCours();
$allCours = $cours->num_rows;
echo json_encode($allCours);
if($allCours > 0){
    $coursArr = array();
    $coursArr["body"] = array();
    $coursArr["itemCount"] = $allCours;
    while ($row = $allCours->fetch_assoc())
    {
        array_push($coursArr["body"], $row);
    }
    echo json_encode($coursArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucun cours enregistré !")
    );
}

/* Formations */
$forms = $form->getFormations();
$allForms = $forms->num_rows;
echo json_encode($allForms);
if($allForms > 0){
    $formArr = array();
    $formArr["body"] = array();
    $formArr["itemCount"] = $allForms;
    while ($row = $allForms->fetch_assoc())
    {
        array_push($formArr["body"], $row);
    }
    echo json_encode($formArr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "Aucune formation enregistrée !")
    );
}

?>