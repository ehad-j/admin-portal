
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link rel='stylesheet' type='text/css' href='view/modules/vendor/fontawesome-free/css/all.min.css'>

<style><?php include 'login.css'; ?></style>
<style>
.reg-form form{
  width: 100%;
}
.reg-form .form-group{
  text-align: left;
}
  .reg-form .form-group>label{
    margin:0;
    padding: 0.5em 0;
    display: inline-block;
  }
  .reg-form .form-group>input{
    margin:0;
    padding: 0 10px;
    width: 75%;
    display: inline;
    float: right;
  }

</style>
<body>
  <div id="back"> </div>
  <div class="login-box_container">

    <div class="login-box">
      <!-- <div class="login-logo"><img src="view/img/template/cat.png" class="img-responsive" style="padding: 20px 100px 0px 100px"> </div>   -->
      <div class="login-box-body" style=''>
        <p class="login-box-msg">SYSTEM LOGIN</p>
          <?php
          if (isset($_SESSION["beginSession"])&&$_SESSION["beginSession"] == "ok"&&$_SESSION["roles_id"]==NULL){


          ?>
              <h5 style="color:red; text-align: center">Please wait for a Super Admin to assign you a role.</h5>
          <?php }?>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="User" onblur="this.placeholder='User'" onfocus="this.placeholder=''" name="aUser" required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" onblur="this.placeholder='Password'" onfocus="this.placeholder=''" name="aPassword" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log in</button>
            </div>
          </div>
          <?php
              $login = new UserController();
              $login -> ctrUserLogin();
              ?>
        </form>
          <div class="row">
              <div class="col-xs-4" align="center">
                  <button class="btn btn-primary btn-block btn-flat" data-toggle="modal" data-target="#addmodal">Register</button>
              </div>
          </div>

      </div>
    </div>
  </div>
</body>

<!-- ADD POP UP FORM (Bootstrap MODAL) -->
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
                        <input type="text" class="form-control" name="createUserID" id="UserID" placeholder="Email" required>
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
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <?php
                $register = new UserController();
                $register -> ctrCreateUser();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Script to make sure passwords are the same -->
<script>
    var password = document.getElementById("Password")
    , confirm_password = document.getElementById("confPassword");

    function validatePassword(){
        if(password.value != confirm_password.value){
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else{
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
