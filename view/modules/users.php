<!-- Button trigger modal -->




<table border="1" align="center" style="line-height:25px;">
<tr>
    <th>User ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Role ID</th>
    <th>Edit</th>
</tr>
    <?php
    $item = null;
    $value = null;
    $user = new UserController();
    $user = UserController::ctrShowUser($item,$value);

    foreach($user as $key => $value) {
        ?>
        <tr>
            <td><?php echo $value["user_id"]; ?></td>
            <td><?php echo $value["first_name"]; ?></td>
            <td><?php echo $value["last_name"]; ?></td>
            <td><?php echo $value["email"]; ?></td>
            <td><?php echo $value["roles_id"]; ?></td>
            <td>
                <button type="button" class="btn btn-primary editbtn" data-toggle="modal" data-target="#editmodal">
                    Edit
                </button>
            </td>
        </tr>
    <?php
    }
        ?>


</table>

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->
<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form role="form" method="POST">
            <div class="modal-body">
                    <div class="form-group">
                        <label for="editUserID">User ID</label>
                        <input type="text" class="form-control" name="editUserID" id="user_id" readonly>
                    </div>
                    <div class="form-group">
                        <label for="editFirstName">First Name</label>
                        <input type="text" class="form-control" name="editFirst" id="first_name" placeholder="Edit First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="editLastName">Last Name</label>
                        <input type="text" class="form-control" name="editLast" id="last_name" placeholder="Edit Last Name" required>
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" name="editEmail" id="email" placeholder="Edit Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="editRoleID">Role ID</label>
                        <input type="number" class="form-control" name="editRoles" id="roles_id" placeholder="Edit Role" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
                <?php
                $editUser = new UserController();
                $editUser -> ctrEditUser();
                ?>
            </form>
        </div>
    </div>
</div>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!-- Script to autofill information into the form when clicking the edit button -->
<script>
    $(document).ready(function () {
        $('.editbtn').on('click',function() {
            $('#editmodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
               return $(this).text();
            }).get();

            console.log(data);
            $('#user_id').val(data[0]);
            $('#first_name').val(data[1]);
            $('#last_name').val(data[2]);
            $('#email').val(data[3]);
            $('#roles_id').val(data[4]);
        });
    });
</script>