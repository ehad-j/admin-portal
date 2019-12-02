
<table border="1" align="center" style="line-height:25px;">
    <tr>
        <td>Link ID</td>
        <td>Link URL</td>
        <td>Link Name</td>
        <td>Role ID</td>
        <td>Edit</td>
        <td>Delete</td>
    </tr>

        <?php
        $item = null;
        $value = null;
        $links = new LinksController();
        $links= LinksController::ctrShowLinks($item, $value);

        foreach($links as $key => $value){
            ?>
        <tr>
            <td><?php echo $value["link_id"]; ?></td>
            <td><?php echo $value["link_url"]; ?></td>
            <td><?php echo $value["link_name"]; ?></td>
            <td><?php echo $value["roles_id"]; ?></td>
            <td>
                <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#editmodal">
                    Edit
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#deletemodal">
                    Delete
                </button>
            </td>
            <?php

        }
        ?>

        </tr>

</table>

<!-- Edit Modal -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Roles</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="POST">
                <div class="form-group">
                    <label for="editLinkID">Link ID</label>
                    <input type="text" class="form-control" name="editLinkID" id="link_id" readonly required>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="editLinkURL">Link URL</label>
                        <input type="text" class="form-control" name="editLinkURL" id="link_url" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="editLinkName">Link Title</label>
                        <input type="text" class="form-control" name="editLinkName" id="link_name" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
                        <label for="editRolesID">Role ID</label>
                        <input type="number" class="form-control" name="editRolesID" id="roles_id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php
                $editLinks = new LinksController();
                $editLinks -> ctrEditLinks();
                ?>
            </form>
        </div>
    </div>
</div>




<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $('.editbtn').on('click',function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#link_id').val(data[0]);
            $('#link_url').val(data[1]);
            $('#link_name').val(data[2]);
            $('#roles_id').val(data[3]);
        });
    });
</script>
<script>
    $('.deletebtn').on('click',function() {
        $('#deletemodal').modal('show');
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        console.log(data);
        $('#link_id1').val(data[0]);
        $('#link_url1').val(data[1]);
        $('#link_name1').val(data[2]);
        $('#roles_id1').val(data[3]);
    });
</script>
