<?php
class UserController{
    // Function to validate user when logging in
    static public function ctrUserLogin(){
        if(isset($_POST["aUser"]) && isset($_POST["aPassword"])){ // If email and password is not null
            $table = "users";
            $item = "email";
            $pass = $_POST["aPassword"];
            $value = $_POST["aUser"];
            $response = ModelUsers::modShowUsers($table, $item, $value); // Retrieving user of that email
            if($response["email"]==$value && $response["pass"] == $pass){ // If input matches with database, begin session, otherwise output error
                $_SESSION["beginSession"] = "ok";
                $_SESSION["roles_id"] = $response["roles_id"];
                $_SESSION["first_name"] = $response["first_name"];
                $_SESSION["last_name"] = $response["last_name"];
                $_SESSION["user_id"] = $response["user_id"];
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
            if($response == "ok"){
                header("Refresh:0");
            }
        }
        }




}