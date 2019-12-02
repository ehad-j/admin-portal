<?php
require_once "connection.php";

class ModelLinks{
    static public function modShowLinks($table, $item, $value){
        $stmt =  Connection::connector()->prepare("SELECT * FROM $table");
        $stmt -> execute();
        return $stmt -> fetchAll();
    }
}
?>
