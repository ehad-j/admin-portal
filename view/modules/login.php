<style><?php include 'login.css'; ?></style>
<body>
  <div id="back"> </div>
  <div class="login-box_container">

    <div class="login-box">
      <!-- <div class="login-logo"><img src="view/img/template/cat.png" class="img-responsive" style="padding: 20px 100px 0px 100px"> </div>   -->
      <div class="login-box-body" style=''>
        <p class="login-box-msg">SYSTEM LOGIN</p>
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
      </div>
    </div>
  </div>
</body>
