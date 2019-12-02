<?php
echo "<h4>Logged in \r\n</h4>";
echo ' ';
?>
    <h4>Welcome <?php echo $_SESSION["first_name"]; echo ' '; echo $_SESSION["last_name"]; ?></h4>
<?php
if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]=="2"){
    ?>

    <a href=../userdata.php>View/Add/Edit Users</a><br>
    <a href=../roledata.php>View/Add/Edit Roles</a>
<?php
}
?>
