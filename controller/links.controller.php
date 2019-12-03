<?php
class LinksController{
    static public function ctrShowLinks($item, $value){
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
                echo '<script>window.location="linkdata.php"</script>';
            }
        }
    }
    static public function ctrDeleteLinks(){
        if(isset($_POST["deleteLinkID"])){
            $table = "links";
            $data = array(
                "link_id" => $_POST["deleteLinkID"],
                "link_url" => $_POST["deleteLinkURL"],
                "link_name" => $_POST["deleteLinkName"],
                "roles_id" => $_POST["deleteRolesID"]
            );
            $response = ModelLinks::mdlDeleteLinks($table, $data);
            if($response == "ok"){
                echo '<script>window.location="linkdata.php"</script>';
            }
        }
    }
}
?>
