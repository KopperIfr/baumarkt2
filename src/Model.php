<?php

class Model {
    protected $dbc;
    
    protected function __construct($dbc)
    {
        $this->dbc = $dbc;
    }

    protected function getAllTableData($tableName) {
        $table = [];
        $sql = "SELECT * FROM $tableName";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($table, $row);
        }
        return $table;
    }
    
}