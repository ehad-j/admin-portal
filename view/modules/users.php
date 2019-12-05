<!-- Button trigger modal -->

<link rel='stylesheet' type='text/css' href='view/modules/vendor/4351/sb-admin.min.css'>
<link rel='stylesheet' type='text/css' href='view/modules/vendor/fontawesome-free/css/all.min.css'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<style>
@media (min-width: 576px){
  .modal-dialog {
    max-width: 610px;
  }
}
  .modal-content {
    padding: 0 25px;
  }
  .form-group{
    text-align: left;
  }
  .form-group>label {
    display: inline-block;
    margin: 0.5rem 0;
  }

  .form-group>input  {
    display: inline-block;
    float: right;
    width: 75%;
  }
</style>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="index.php">Admin Portal</a>

    <h2 style='color: white;' class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <?php echo $_SESSION["first_name"]; echo ' '; echo $_SESSION["last_name"]; ?>
    </h2>

    <!-- Navbar -->
    <div class="navbar-nav ml-auto ml-md-0">
      <img width=30 src="https://image.flaticon.com/icons/svg/172/172163.svg" alt="">
    </div>
      <div>
          <a href="../../logout.php"><i style="font-size: 2em; color:rgba(255,255,255,0.9);margin-left: 15px;" class="fas fa-sign-out-alt"></i></a>
      </div>
  </nav>
  <div id="wrapper">
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="../../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <?php
          if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]=="2")
          {
          ?>

      <li class="nav-item active">
        <a class="nav-link" href=../userdata.php> <i class="fas fa-fw fa-folder"></i>
          <span>Users</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href=../roledata.php> <i class="fas fa-fw fa-chart-area"></i>
          <span>Roles</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../../linkdata.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Links</span></a>
      </li>
      <?php
          }
          ?>

    </ul>
    <div id="content-wrapper">

      <div class="container-fluid" style='text-align: center; width: 80%;'>


        <table class='table table-striped table-sm' border="1" align="center" style="line-height:25px;">
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

                <i style='cursor: pointer; margin: 0 10px;' class='fas fa-edit editbtn' data-toggle="modal" data-target="#editmodal"></i>
                <i style='cursor: pointer; margin: 0 10px;' class='fas fa-trash deletebtn' data-toggle="modal" data-target="#deletemodal"></i>

            </td>
          </tr>
          <?php
    }
        ?>
          <div class="">
            <h2 style='float: left;'>User Details</h2>
              <button style='float: right;' type="button" class="btn btn-default addbttn" data-toggle="modal" data-target="#addmodal">
                  <i style='font-size: 2em;'class='fas fa-plus-square'></i>
              </button>
          </div>


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
                    <input type="number" class="form-control" name="editRoles" id="roles_id" placeholder="Edit Role">
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
          <!-- ADD BOOTSTRAP MODAL -->
          <div class="modal fade" id="addmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content  reg-form">
                      <div class="modal-header">
                          <h5 style='font-size: 1.2rem;' class="modal-title" id="exampleModalLabel">Register</h5>
                          <button style='width: 12%; margin: 0; padding: 0' type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <i class="fas fa-times"></i>
                          </button>
                      </div>
                      <form role="form" method="POST">
                          <div class="modal-body">
                              <div class="form-group">
                                  <label for="createUserID">Email</label>
                                  <input type="email" class="form-control" name="createUserID" id="UserID" placeholder="Email" required>
                              </div>
                              <div class="form-group">
                                  <label for="createFirst">First Name</label>
                                  <input type="text" class="form-control" name="createFirst" id="FirstName" placeholder="First Name" required>
                              </div>
                              <div class="form-group">
                                  <label for="createLast">Last Name</label>
                                  <input type="text" class="form-control" name="createLast" id="LastName" placeholder="Last Name" required>
                              </div>
                              <div class="form-group">
                                  <label for="createPass">Password</label>
                                  <input type="password" class="form-control" name="createPass" id="Password" placeholder="Password" required>
                              </div>
                              <div class="form-group">
                                  <label for="confPass">Password</label>
                                  <input type="password" class="form-control" name="confPass" id="confPassword" placeholder="Confirm Password" required>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Create User</button>
                          </div>
                          <?php
                          $register = new UserController();
                          $register -> ctrSuCreateUser();
                          ?>
                      </form>
                  </div>
              </div>
          </div>
          <!-- DELETE BOOTSRAP MODAL -->
          <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <form role="form" method="POST">
                          <div class="modal-body">
                              <div class="form-group">
                                  <label for="deleteUserID">User ID</label>
                                  <input type="text" class="form-control" name="deleteUserID" id="user_id1" readonly required>
                              </div>
                              <div class="form-group">
                                  <label for="deleteFirst">First Name</label>
                                  <input type="text" class="form-control" name="deleteFirst" id="first_name1" readonly required>
                              </div>
                              <div class="form-group">
                                  <label for="deleteLast">Last Name</label>
                                  <input type="text" class="form-control" name="deleteLast" id="last_name1" readonly required>
                              </div>
                              <div class="form-group">
                                  <label for="deleteEmail">Email</label>
                                  <input type="email" class="form-control" name="deleteEmail" id="email1" readonly required>
                              </div>
                              <div class="form-group">
                                  <label for="deleteRolesID">Role ID</label>
                                  <input type="number" class="form-control" name="deleteRoles" id="roles_id1" readonly>
                              </div>

                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </div>
                          <?php
                          $editUser = new UserController();
                          $editUser -> ctrDeleteUser();
                          ?>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


<!-- Script to autofill information into the form when clicking the edit button -->
<script>
  $(document).ready(function() {
    $('.editbtn').on('click', function() {
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
<script>
    $(document).ready(function() {
        $('.deletebtn').on('click', function() {
            $('#deletemodal').modal('show');
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);
            $('#user_id1').val(data[0]);
            $('#first_name1').val(data[1]);
            $('#last_name1').val(data[2]);
            $('#email1').val(data[3]);
            $('#roles_id1').val(data[4]);
        });
    });
</script>
