<?php

class Courss{
// dbection
    private $db;
// Table
    private $db_table = "cours";
// Columns
    public $idCo;
    public $libelleCo;

// Db dbection
    public function __construct($db){
        $this->db = $db;
    }

// CREATE
    public function createCours(){

        $this->libelleCo=htmlspecialchars(strip_tags($this->libelleCo));
        $sqlQuery = "INSERT INTO". $this->db_table .
            "SET libelleCo = '".$this->libelleCo."'";
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// READ
    public function getCours(){
        $sqlQuery = "SELECT idCo, libelleCo, FROM " . $this->db_table ;
        $this->result = $this->db->query($sqlQuery);
        return $this->result;
    }

// READ ONE
    public function getOneCours(){
        $sqlQuery = "SELECT idCo, libelleCo FROM ". $this->db_table .
            " WHERE idCo = ".$this->idCo;
        $record = $this->db->query($sqlQuery);
        $dataRow=$record->fetch_assoc();
        $this->libelleCo = $dataRow['libelleCo'];
    }

// UPDATE
    public function updateCours(){
        $this->libelleCo=htmlspecialchars(strip_tags($this->libelleCo));
        $this->idCo=htmlspecialchars(strip_tags($this->idCo));

        $sqlQuery = "UPDATE ". $this->db_table .
            "SET libelleCo = '".$this->libelleCo."'
            WHERE idCo = ".$this->idCo;

        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }

// DELETE
    function deleteCours(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE idCo = ".$this->idCo;
        $this->db->query($sqlQuery);
        if($this->db->affected_rows > 0){
            return true;
        }
        return false;
    }
}
?>