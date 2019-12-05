<?php
session_start();
require_once "controller/template.controller.php";
require_once "controller/users.controller.php";
require_once "controller/roles.controller.php";
require_once "controller/links.controller.php";

require_once "model/users.model.php";
require_once "model/roles.model.php";
require_once "model/links.model.php";
?>

<?php
if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok" && $_SESSION["roles_id"]=="2"){
    include "view/modules/roles.php";
}
else if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok" && $_SESSION["roles_id"]!=NULL){
    include "view/modules/home.php";
}
else{
    include "view/modules/login.php";
}
?>