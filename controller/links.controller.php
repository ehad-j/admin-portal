<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Link edited successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="linkdata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, could not be edited!",
				text: "Make sure inputs are valid, and avoid duplicate links",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="linkdata.php";
				});


		</script>';
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
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Link deleted successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="linkdata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, could not be deleted!",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="linkdata.php";
				});


		</script>';
            }
        }
    }
    static public function ctrCreateLinks()
    {
        if (isset($_POST["createLinkURL"])) {
            $table = "links";
            $data = array(
                "link_url" => $_POST["createLinkURL"],
                "link_name" => $_POST["createLinkName"],
                "roles_id" => $_POST["createRolesID"]
            );
            $response = ModelLinks::mdlCreateLinks($table, $data);
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Link created successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="linkdata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, could not be saved!",
				text: "Make sure inputs are valid, and avoid duplicate links",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="linkdata.php";
				});


		</script>';
            }
        }
    }
}
?>
