<?php
class RolesController{
    static public function ctrCreateRole(){
        if(isset($_POST["newRolesName"])){
            $table = "roles";
            $data = array("roles_name" => $_POST["newRolesName"]);
            $response = ModelRoles::mdlAddRoles($table,$data);

            if($response == "ok"){
                header("Refresh:0");
            }
        }
    }
    static public function ctrShowRoles($item, $value){
        $table = "roles";
        $request = ModelRoles::modShowRoles($table, $item, $value);
        return $request;
    }
    static public function ctrEditRoles(){
        if(isset($_POST["editRolesName"])){
            $table = "roles";
            $data = array("roles_id"=>$_POST["editRolesID"], "roles_name"=>$_POST["editRolesName"]);
            $response = ModelRoles::mdlEditRoles($table, $data);
            if($response == "ok"){
                header("Refresh:0");
            }
        }

    }
}
?>