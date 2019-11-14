<?php
require_once "connection.php";
class ModelRoles{
    static public function mdlAddRoles($table, $data){
        $stmt = Connection::connector()->prepare("INSERT INTO $table(roles_name) VALUES (:roles_name);)");
        $stmt->bindParam(":roles_name",$data["roles_name"],PDO::PARAM_STR);
        if($stmt -> execute()){
            return "ok";
        }
        else{
            return "error";
        }
        $stmt->close();
        $stmt=null;
    }
    static public function modShowRoles($table,$item,$value)
    {
        if($item != null){
            $stmt =  Connection::connector()->prepare("SELECT * FROM $table WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);
            $stmt -> execute();
            return $stmt -> fetch();
        }
        else{
            $stmt =  Connection::connector()->prepare("SELECT * FROM $table");
            $stmt -> execute();

            return $stmt -> fetchAll();
        }
    }
}
?>
