<?php
class Eleves{
// dbection
    private $db;
// Table
    private $db_table = "eleves";
// Columns
    public $idE;
    public $nomE;
    public $prenomE;
    public $idClasse;
    public $idFormation;


// Db dbection
    public function __construct($db){
        $this->db = $db;
    }

// CREATE
    public function createEleves(){

        $this->nomE=htmlspecialchars(strip_tags($this->nomE));
        $this->prenomE=htmlspecialchars(strip_tags($this->prenomE));
        $this->idClasse=htmlspecialchars(strip_tags($this->idClasse));
        $this->idFormation=htmlspecialchars(strip_tags($this->idFormation));
        $sqlQuery = "INSERT INTO". $this->db_table .
            "SET nomE = '".$this->nomE."',
            prenomE = '".$this->prenomE."',
            idClasse = '".$this->idClasse."',
            idFormation = '".$this->idFormation."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// READ
    public function getEleves(){
        $sqlQuery = "SELECT idE, nomE, prenomE, idClasse, idFormation FROM " . $this->db_table ;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

// READ ONE
    public function getOneEleve(){
        $sqlQuery = "SELECT idE, nomE, prenomE, idClasse, idFormation FROM ". $this->db_table .
            " WHERE idE = ".$this->idE;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->nomE = $dataRow['nomE'];
        $this->prenomE = $dataRow['prenomE'];
        $this->idClasse = $dataRow['idClasse'];
        $this->idFormation = $dataRow['idFormation'];
    }

// UPDATE
    public function updateEleve(){
        $this->nomE=htmlspecialchars(strip_tags($this->nomE));
        $this->prenomE=htmlspecialchars(strip_tags($this->prenomE));
        $this->idClasse=htmlspecialchars(strip_tags($this->idClasse));
        $this->idFormation=htmlspecialchars(strip_tags($this->idFormation));
        $this->idE=htmlspecialchars(strip_tags($this->idE));

        $sqlQuery = "UPDATE ". $this->db_table .
            "SET nomE = '".$this->nomE."',
            prenomE = '".$this->prenomE."',
            idClasse = '".$this->idClasse."',
            idFormation = '".$this->idFormation."'
            WHERE idE = ".$this->idE;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteEleve(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idE = ".$this->idE;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>