<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
class UserController{
    // Function to validate user when logging in
    static public function ctrUserLogin(){
        if(isset($_POST["aUser"]) && isset($_POST["aPassword"])){ // If email and password is not null
            $table = "users";
            $table1 = "roles";
            $item = "email";
            $pass = $_POST["aPassword"];
            $value = $_POST["aUser"];
            $response = ModelUsers::modShowUsers($table, $item, $value); // Retrieving user of that email
            if($response["email"]==$value && password_verify($pass, $response["pass"])){ // If input matches with database, begin session, otherwise output error
                $_SESSION["beginSession"] = "ok";
                $_SESSION["roles_id"] = $response["roles_id"];
                $_SESSION["first_name"] = $response["first_name"];
                $_SESSION["last_name"] = $response["last_name"];
                $_SESSION["user_id"] = $response["user_id"];
                $data = array("roles_id" => $response["roles_id"]);
                echo '<script>
							window.location = "index.php";
						</script>';

            }
            else{
                echo '<div class="alert alert-danger"> Incorrect Information, Please Try Again</div>';
            }
        }
    }
    // Function to display all users
    static public function ctrShowUser($item,$value){
        $table = "users";
        $request = ModelUsers::modShowUsers($table,$item,$value);
        return $request;
    }
    static public function ctrEditUser(){

        if(isset($_POST["editFirst"])){
            $table = "users";
            $data = array("first_name" => $_POST["editFirst"],
                "last_name"=>$_POST["editLast"],
                "email"=>$_POST["editEmail"],
                "roles_id"=>$_POST["editRoles"],
                "user_id"=>$_POST["editUserID"]
            );
            $response = ModelUsers::mdlEditUser($table,$data);
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "User edited successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../userdata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, user could not be edited!",
				text: "Make sure inputs are valid, and avoid duplicate users",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../userdata.php";
				});


		</script>';
            }
        }
        }
    static public function ctrCreateUser(){
        if(isset($_POST["createUserID"])){
            $table = "users";
            $pass = password_hash($_POST["createPass"], PASSWORD_DEFAULT);
            $data = array("email" => $_POST["createUserID"],
                "first_name"=>$_POST["createFirst"],
                "last_name"=>$_POST["createLast"],
                "pass"=>$pass);
            $response = ModelUsers::mdlCreateUser($table, $data);
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Registered successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../index.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, could not be registered!",
				text: "User may already exist, or invalid input",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../index.php";
				});


		</script>';
            }
        }
    }
    static public function ctrSuCreateUser(){
        if(isset($_POST["createUserID"])){
            $table = "users";
            $pass = password_hash($_POST["createPass"], PASSWORD_DEFAULT);
            $data = array("email" => $_POST["createUserID"],
                "first_name"=>$_POST["createFirst"],
                "last_name"=>$_POST["createLast"],
                "pass"=>$pass);
            $response = ModelUsers::mdlCreateUser($table, $data);
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Registered successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../userdata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, could not be registered!",
				text: "User may already exist, or invalid input",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../userdata.php";
				});


		</script>';
            }
        }
    }
    static public function ctrDeleteUser(){
        if(isset($_POST["deleteUserID"])){
            $table = "users";
            $data = array(
                "user_id" => $_POST["deleteUserID"],
                "email" => $_POST["deleteEmail"],
                "roles_id" => $_POST["deleteRolesID"],
                "first_name" => $_POST["deleteFirst"],
                "last_name" => $_POST["deleteLast"]
            );
            $response = ModelUsers::mdlDeleteUser($table, $data);
            if ($response == "ok") {


                echo '<script>
		swal({
				type: "success",
				title: "Deleted successfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../userdata.php";
				});


		</script>';

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, could not be deleted!",
				text: "Make sure data has not already been deleted, or user is not a Super Admin.",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location="../userdata.php";
				});


		</script>';
            }


        }
    }
    static public function ctrChangePassword(){
        if(isset($_POST["oldPassword"])){
            $table = "users";
            $item = "user_id";
            $value = $_SESSION["user_id"];
            $response = ModelUsers::modShowUsers($table, $item, $value);
            $oldPass = $_POST["oldPassword"];
            if (password_verify($oldPass, $response["pass"])){
                $newPass = password_hash($_POST["editPassword"], PASSWORD_DEFAULT);
                $data = array(
                    "pass" => $newPass,
                    "user_id" => $value
                );
                $result = ModelUsers::mdlEditPassword($table, $data);
                if ($result == "ok") {


                    echo '<script>
		swal({
				type: "success",
				title: "Password changed sucessfully!",
				text: "Please logout and login again to confirm changes.",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location.href = window.location.href;
				});


		</script>';

                }
                else{
                    echo '<script>
		swal({
				type: "error",
				title: "Error, password could not be changed",
				text: "Make sure your password input is valid",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location.href=window.location.href;
				});


		</script>';
                }

            }
            else{
                echo '<script>
		swal({
				type: "error",
				title: "Error, password could not be changed",
				text: "Incorrect password",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location.href=window.location.href;
				});


		</script>';
            }
        }

    }
    static public function ctrSuChangePassword(){
        if(isset($_POST["editPassword"])){
            $table = "users";
            $item = "user_id";
            $value = $_POST["UserID"];
            $response = ModelUsers::modShowUsers($table, $item, $value);
            $newPass = password_hash($_POST["editPassword"], PASSWORD_DEFAULT);
            $data = array(
                "pass" => $newPass,
                "user_id" => $value
                );
            $result = ModelUsers::mdlEditPassword($table, $data);
            if ($result == "ok") {


                    echo '<script>
		swal({
				type: "success",
				title: "Password changed sucessfully!",
				icon: "success",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location.href = window.location.href;
				});


		</script>';

                }
                else{
                    echo '<script>
		swal({
				type: "error",
				title: "Error, password could not be changed",
				text: "Make sure your password input is valid",
				icon: "error",
				showConfirmButton: true,
				confirmButtonText: "Close",
				closeOnConfirm: false

				}).then(function(){
				    window.location.href=window.location.href;
				});


		</script>';
                }

            }
        }







}