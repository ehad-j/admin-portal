<?php
require_once "connection.php";

class ModelLinks{
    static public function modShowLinks($table, $item, $value){
        if($value != NULL && $item != NULL){
            $stmt = Connection::connector()->prepare("SELECT * FROM $table WHERE $item = $value OR $item = 1");
            $stmt -> execute();
            return $stmt -> fetchAll();
        }
        else {


            $stmt = Connection::connector()->prepare("SELECT * FROM $table");
            $stmt->execute();
            return $stmt->fetchAll();
        }
    }
    static public function mdlEditLinks($table, $data){
        $stmt = Connection::connector()->prepare("UPDATE $table SET link_url = :link_url, link_name = :link_name, roles_id = :roles_id WHERE link_id = :link_id");
        $stmt -> bindParam(":link_url", $data["link_url"], PDO::PARAM_STR);
        $stmt -> bindParam(":link_name", $data["link_name"], PDO::PARAM_STR);
        $stmt -> bindParam(":roles_id", $data["roles_id"], PDO::PARAM_STR);
        $stmt -> bindParam(":link_id", $data["link_id"], PDO::PARAM_STR);
        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;
    }
    static public function mdlDeleteLinks($table, $data){
        $stmt = Connection::connector()->prepare("DELETE FROM $table WHERE link_id = :link_id");
        $stmt -> bindParam(":link_id", $data["link_id"], PDO::PARAM_STR);
        if($stmt -> execute()){

            return "ok";

        }else{

            return "error";

        }

        $stmt -> close();
        $stmt = null;
    }
    static public function mdlCreateLinks($table, $data){
        $stmt = Connection::connector()->prepare("INSERT INTO $table(link_url, link_name, roles_id) VALUES (:link_url, :link_name, :roles_id)");
        $stmt -> bindParam(":link_url", $data["link_url"], PDO::PARAM_STR);
        $stmt -> bindParam(":link_name", $data["link_name"], PDO::PARAM_STR);
        $stmt -> bindParam(":roles_id", $data["roles_id"], PDO::PARAM_STR);
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
