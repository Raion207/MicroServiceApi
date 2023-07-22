<?php

class Materiels{
// dbection
    private $db;
// Table
    private $db_table = "materiels";
// Columns
    public $idM;
    public $libelleM;

// Db dbection
    public function __construct($db){
        $this->db = $db;
    }

// CREATE
    public function createMateriels(){

        $this->libelleM=htmlspecialchars(strip_tags($this->libelleM));
        $sqlQuery = "INSERT INTO". $this->db_table .
            "SET libelleM = '".$this->libelleM."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// READ
    public function getMateriels(){
        $sqlQuery = "SELECT idM, libelleM, FROM " . $this->db_table ;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

// READ ONE
    public function getOneMateriel(){
        $sqlQuery = "SELECT idM, libelleM FROM ". $this->db_table .
            " WHERE idM = ".$this->idM;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->libelleM = $dataRow['libelleM'];
    }

// UPDATE
    public function updateMateriel(){
        $this->libelleM=htmlspecialchars(strip_tags($this->libelleM));
        $this->idM=htmlspecialchars(strip_tags($this->idM));

        $sqlQuery = "UPDATE ". $this->db_table .
            "SET libelleM = '".$this->libelleM."'
            WHERE idM = ".$this->idM;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteMateriel(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idM = ".$this->idM;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>