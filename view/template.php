<?php
session_start();
?>

<?php
if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok"){
    echo "<html>Logged in \r\n</html>";
    echo ' ';
    if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]=="2"){
        echo "<html>\r\n Super Admin</html>";
        echo '<a href=../userdata.php>View/Add/Edit Users</a>';
    }
}
else{
    include "modules/login.php";
}
