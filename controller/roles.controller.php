<?php
class RolesController{
    static public function ctrCreateRole(){
        if(isset($_POST["newRolesName"])){
            $table = "roles";
            $data = array("roles_name" => $_POST["newRolesName"]);
            $response = ModelRoles::mdlAddRoles($table,$data);

            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Role created successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="roledata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, role could not be created!",
				text: "Make sure inputs are valid, and avoid duplicate roles",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="roledata.php";
				});


		</script>';
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
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Role edited successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="roledata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, role could not be edited!",
				text: "Make sure inputs are valid, and avoid duplicate roles",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="roledata.php";
				});


		</script>';
            }
        }

    }
    static public function ctrDeleteRoles(){
        if(isset($_POST["deleteRolesID"])) {


            $table = "roles";
            $data = array("roles_id" => $_POST["deleteRolesID"], "roles_name" => $_POST["deleteRolesName"]);
            $response = ModelRoles::mdlDeleteRoles($table, $data);
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Role deleted successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="roledata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, role could not be Deleted!",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="roledata.php";
				});


		</script>';
            }
        }

    }
}
?>
