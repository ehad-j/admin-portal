<?php
class LinksController{
    static public function ctrShowRoles($item, $value){
        $table = "links";
        $request = ModelLinks::modShowLinks($table, $item, $value);
        return $request;
    }
    static public function ctrEditLinks(){
        if (isset($_POST["editLinkURL"])){
            $table = "links";
            $data = array(
                "link_id" => $_POST["editLinkID"],
                "link_url" => $_POST["editLinkURL"],
                "link_name" => $_POST["editLinkName"],
                "roles_id" => $_POST["editRolesID"]
            );
            $response = ModelLinks::mdlEditLinks($table, $data);
            if($response == "ok"){
                header("Refresh:0");
            }
        }
    }
}
?>
