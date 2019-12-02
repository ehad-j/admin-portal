<?php
echo "<h4>Logged in \r\n</h4>";
echo ' ';
?>
    <h4>Welcome <?php echo $_SESSION["first_name"]; echo ' '; echo $_SESSION["last_name"]; ?></h4>
<?php

if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]!= NULL){
    $item = "roles_id";
    $value = $_SESSION["roles_id"];
    $links = new LinksController();
    $links = LinksController::ctrShowLinks($item, $value);
    foreach($links as $key => $value){
        ?>
        <a href="<?php echo $value["link_url"]; ?>"><?php echo $value["link_name"]; ?></a><br>
        <?php
    }
}
if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]=="2"){
    ?>

    <a href=../userdata.php>View/Add/Edit Users</a><br>
    <a href=../roledata.php>View/Add/Edit Roles</a><br>
    <a href="../../linkdata.php">View/Add/Edit Links</a>
<?php
}
?>
