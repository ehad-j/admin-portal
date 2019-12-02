<?php
session_start();
?>

<?php
if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok"&&$_SESSION["roles_id"]!=NULL){
    include "modules/home.php";
}
else{
    include "modules/login.php";
}
