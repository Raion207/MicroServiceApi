<?php

class Classes{
// dbection
    private $db;
// Table
    private $db_table = "classes";
// Columns
    public $idC;
    public $libelleC;

// Db dbection
    public function __construct($db){
        $this->db = $db;
    }

// CREATE
    public function createClasses(){

        $this->libelleC=htmlspecialchars(strip_tags($this->libelleC));
        $sqlQuery = "INSERT INTO". $this->db_table .
            "SET libelleC = '".$this->libelleC."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// READ
    public function getClasses(){
        $sqlQuery = "SELECT idC, libelleC FROM " . $this->db_table ;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

// READ ONE
    public function getOneClasse(){
        $sqlQuery = "SELECT idC, libelleC FROM ". $this->db_table .
            " WHERE idC = ".$this->idC;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->libelleC = $dataRow['libelleC'];
    }

// UPDATE
    public function updateClasse(){
        $this->libelleC=htmlspecialchars(strip_tags($this->libelleC));
        $this->idC=htmlspecialchars(strip_tags($this->idC));

        $sqlQuery = "UPDATE ". $this->db_table .
            "SET libelleC = '".$this->libelleC."'
            WHERE idC = ".$this->idC;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteClasse(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idC = ".$this->idC;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>