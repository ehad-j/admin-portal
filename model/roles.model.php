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
            $stmt =  Connection::connector()->prepare("SELECT * FROM $table WHERE roles_id != 1");
            $stmt -> execute();

            return $stmt -> fetchAll();
        }
    }
    static public function mdlEditRoles($table, $data){
        $stmt = Connection::connector()->prepare("UPDATE $table SET roles_name = :roles_name WHERE roles_id = :roles_id");
        $stmt -> bindParam(":roles_name", $data["roles_name"], PDO::PARAM_STR);
        $stmt -> bindParam(":roles_id", $data["roles_id"], PDO::PARAM_STR);

        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;
    }
    static public function mdlDeleteRoles($table, $data){
        $stmt =Connection::connector()->prepare("DELETE FROM $table WHERE roles_id = :roles_id");
        $stmt->bindParam(":roles_id", $data["roles_id"], PDO::PARAM_STR);
        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;
    }
}
?>
