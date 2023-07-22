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
$eleve->getOneEleve();

if($eleve->nomE != null){
    $emp_arr = array(
        "idE" => $eleve->idE,
        "nomE" => $eleve->nomE,
        "prenomE" => $eleve->prenomE,
        "idClasse" => $eleve->idClasse,
        "idFormation" => $eleve->idFormation
    );

    http_response_code(200);
    echo json_encode($emp_arr);
}
else{
    http_response_code(404);
    echo json_encode("Eleve non trouvé !");
}

/* Profs */
$prof->idP = isset($_GET['idP']) ? $_GET['idP'] : die();
$prof->getOneProf();

if($prof->nomP != null){
    $emp_arr = array(
        "idP" => $prof->idP,
        "nomP" => $prof->nomP,
        "prenomP" => $prof->prenomP,
        "idClasse" => $prof->idClasse
    );

    http_response_code(200);
    echo json_encode($emp_arr);
}
else{
    http_response_code(404);
    echo json_encode("Prof non trouvé !");
}

/* Classes */
$classe->idC = isset($_GET['idC']) ? $_GET['idC'] : die();
$classe->getOneClasse();

if($classe->libelleC != null){
    $emp_arr = array(
        "idC" => $classe->idC,
        "libelleC" => $classe->libelleC
    );

    http_response_code(200);
    echo json_encode($emp_arr);
}
else{
    http_response_code(404);
    echo json_encode("Classe non trouvée !");
}

/* Materiels */
$mate->idM = isset($_GET['idM']) ? $_GET['idM'] : die();
$mate->getOneMateriel();

if($mate->libelleM != null){
    $emp_arr = array(
        "idM" => $mate->idM,
        "libelleM" => $mate->libelleM
    );

    http_response_code(200);
    echo json_encode($emp_arr);
}
else{
    http_response_code(404);
    echo json_encode("Matériel non trouvé !");
}

/* Cours */
$cours->idCo = isset($_GET['idCo']) ? $_GET['idCo'] : die();
$cours->getOneCours();

if($cours->libelleC != null){
    $emp_arr = array(
        "idCo" => $cours->idCo,
        "libelleCo" => $cours->libelleCo
    );

    http_response_code(200);
    echo json_encode($emp_arr);
}
else{
    http_response_code(404);
    echo json_encode("Cours non trouvé !");
}

/* Formations */
$form->idF = isset($_GET['idF']) ? $_GET['idF'] : die();
$form->getOneFormation();

if($form->libelleF != null){
    $emp_arr = array(
        "idF" => $form->idF,
        "libelleF" => $form->libelleF,
        "descriptionF" => $form->descriptionF
    );

    http_response_code(200);
    echo json_encode($emp_arr);
}
else{
    http_response_code(404);
    echo json_encode("Formation non trouvée !");
}

?>