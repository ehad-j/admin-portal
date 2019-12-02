<?php
    require_once "connection.php";
    class ModelUsers{
        static public function modShowUsers($table,$item,$value)
        {
            // Check this if statement, could result in error if no username input
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
            $stmt -> close();
            $stmt = null;
        }
        static public function mdlEditUser($table, $data){
            $stmt = Connection::connector()->prepare("UPDATE $table SET first_name = :first_name, last_name = :last_name, email = :email, roles_id = :roles_id WHERE user_id = :user_id");
            $stmt -> bindParam(":first_name", $data["first_name"], PDO::PARAM_STR);
            $stmt -> bindParam(":last_name", $data["last_name"], PDO::PARAM_STR);
            $stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt -> bindParam(":roles_id", $data["roles_id"], PDO::PARAM_STR);
            $stmt -> bindParam(":user_id", $data["user_id"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }

            $stmt -> close();
            $stmt = null;
        }
        static public function mdlCreateUser($table, $data){
            $stmt = Connection::connector()->prepare("INSERT INTO $table(email, first_name, last_name, pass) VALUES (:email, :first_name, :last_name, :pass)");
            $stmt -> bindParam(":email", $data["email"], PDO::PARAM_STR);
            $stmt -> bindParam(":first_name", $data["first_name"], PDO::PARAM_STR);
            $stmt -> bindParam(":last_name", $data["last_name"], PDO::PARAM_STR);
            $stmt -> bindParam(":pass", $data["pass"], PDO::PARAM_STR);

            if($stmt -> execute()){

                return "ok";

            }else{

                return "error";

            }
            $stmt -> close();
            $stmt = null;
        }
        static public function modGetUsrRole($table, $data){
            $stmt = Connection::connector()->prepare("SELECT roles_name FROM roles WHERE roles_id = :roles_id");
            $stmt->bindParam(":roles_id", $data["roles_id"],PDO::PARAM_STR);
            return $stmt -> fetch();
            $stmt -> close();
            $stmt = null;
        }
    }
