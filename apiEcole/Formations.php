<?php

class Formations{
// dbection
    private $db;
// Table
    private $db_table = "formation";
// Columns
    public $idF;
    public $libelleF;

// Db dbection
    public function __construct($db){
        $this->db = $db;
    }

// CREATE
    public function createFormations(){

        $this->libelleF=htmlspecialchars(strip_tags($this->libelleF));
        $this->descriptionF=htmlspecialchars(strip_tags($this->descriptionF));
        $sqlQuery = "INSERT INTO". $this->db_table .
            "SET libelleF = '".$this->libelleF."',
            descriptionF = '".$this->descriptionF."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// READ
    public function getFormations(){
        $sqlQuery = "SELECT idF, libelleF, descriptionF FROM " . $this->db_table ;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

// READ ONE
    public function getOneFormation(){
        $sqlQuery = "SELECT idF, libelleF, descriptionF FROM ". $this->db_table .
            " WHERE idF = ".$this->idF;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->libelleF = $dataRow['libelleF'];
        $this->descriptionF = $dataRow['descriptionF'];
    }

// UPDATE
    public function updateFormation(){
        $this->libelleF=htmlspecialchars(strip_tags($this->libelleF));
        $this->descriptionF=htmlspecialchars(strip_tags($this->descriptionF));
        $this->idF=htmlspecialchars(strip_tags($this->idF));

        $sqlQuery = "UPDATE ". $this->db_table .
            "SET libelleF = '".$this->libelleF."',
            descriptionF = '".$this->descriptionF."'
            WHERE idF = ".$this->idF;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteFormation(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idF = ".$this->idF;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>