<?php
class Profs{
// dbection
    private $db;
// Table
    private $db_table = "profs";
// Columns
    public $idP;
    public $nomP;
    public $prenomP;
    public $idClasse;


// Db dbection
    public function __construct($db){
        $this->db = $db;
    }

// CREATE
    public function createProfs(){

        $this->nomP=htmlspecialchars(strip_tags($this->nomP));
        $this->prenomP=htmlspecialchars(strip_tags($this->prenomP));
        $this->idClasse=htmlspecialchars(strip_tags($this->idClasse));
        $sqlQuery = "INSERT INTO". $this->db_table .
            "SET nomP = '".$this->nomP."',
            prenomP = '".$this->prenomP."',
            idClasse = '".$this->idClasse."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// READ
    public function getProfs(){
        $sqlQuery = "SELECT idP, nomP, prenomP, idClasse FROM " . $this->db_table ;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

// READ ONE
    public function getOneProf(){
        $sqlQuery = "SELECT idP, nomP, prenomP, idClasse FROM ". $this->db_table .
            " WHERE idP = ".$this->idP;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->nomP = $dataRow['nomP'];
        $this->prenomP = $dataRow['prenomP'];
        $this->idClasse = $dataRow['idClasse'];
    }

// UPDATE
    public function updateProf(){
        $this->nomP=htmlspecialchars(strip_tags($this->nomP));
        $this->prenomP=htmlspecialchars(strip_tags($this->prenomP));
        $this->idClasse=htmlspecialchars(strip_tags($this->idClasse));
        $this->idP=htmlspecialchars(strip_tags($this->idP));

        $sqlQuery = "UPDATE ". $this->db_table .
            "SET nomP = '".$this->nomP."',
            prenomP = '".$this->prenomP."',
            idClasse = '".$this->idClasse."'
            WHERE idP = ".$this->idP;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteProf(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idP = ".$this->idP;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>