
<table border="1" align="center" style="line-height:25px;">
    <tr>
        <td>Link ID</td>
        <td>Link URL</td>
        <td>Link Name</td>
        <td>Role ID</td>
    </tr>

        <?php
        $item = null;
        $value = null;
        $links = new LinksController();
        $links= LinksController::ctrShowRoles($item, $value);

        foreach($links as $key => $value){
            ?>
        <tr>
            <td><?php echo $value["link_id"]; ?></td>
            <td><?php echo $value["link_url"]; ?></td>
            <td><?php echo $value["link_name"]; ?></td>
            <td><?php echo $value["role_id"]; ?></td>
            <?php
        }
        ?>

        </tr>

</table>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
