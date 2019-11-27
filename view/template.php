<?php
session_start();
?>

<?php
if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok"&&$_SESSION["roles_id"]!=NULL){
    echo "<h4>Logged in \r\n</h4>";
    echo ' ';
    if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]=="2"){
        echo "<h4>\r\n Super Admin</h4><br>";
        echo '<a href=../userdata.php>View/Add/Edit Users</a><br>';
        echo '<a href=../roledata.php>View/Add/Edit Roles</a>';
    }
}
else{
    include "modules/login.php";
}
