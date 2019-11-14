<?php
    session_start();
require_once "controller/users.controller.php";

require_once "model/users.model.php";
    ?>

<?php
if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok" && $_SESSION["roles_id"]=="2"){
    include "view/modules/users.php";
}
?>
