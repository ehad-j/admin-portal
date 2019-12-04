<?php
session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Portal</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok"&&$_SESSION["roles_id"]!=NULL){
    include "modules/home.php";
}
else{
    include "modules/login.php";
}

?>
</head>