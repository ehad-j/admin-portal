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
}
?>