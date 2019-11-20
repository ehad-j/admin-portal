
<style type='text/css' media="screen">
    body{background-image:url(pic/H-city.jpg);background-repeat:no-repeat;background-attachment:fixed;background-size:cover}input{width:80%;height:30px;margin:5px}button{margin:10px;font-family:Arial,Helvetica Neue,Helvetica,sans-serif;font-size:1em;text-transform:uppercase}form{margin:0 auto;text-align:center}.login-box_container{width:35%;margin:7em auto 0 auto;padding:30px;position:relative;z-index:1;overflow:hidden;box-shadow:0 .3em 1em rgba(0,0,0,.8);border-radius:5px}.login-box_container::before{content:'';position:absolute;z-index:-1;top:0;right:0;left:0;bottom:0;background:inherit;box-shadow:inset 0 0 3000px rgba(255,255,255,.5);filter:blur(2px);margin:-20px}.login-box-msg{text-align:center;margin-top:0;text-transform:uppercase;font-family:Arial Black,Arial Bold,Gadget,sans-serif;letter-spacing:10px;font-size:1.5em;color:azure}
</style>


<body>
<div id="back"> </div>
<div class="login-box_container">

  <div class="login-box">
     <!-- <div class="login-logo">

           <img src="view/img/template/cat.png" class="img-responsive" style="padding: 20px 100px 0px 100px">

     </div>
      -->
     <div class="login-box-body" style=''>
        <p class="login-box-msg"  >SYSTEM LOGIN</p>
        <form method="post">
           <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="User" name="aUser" required>
              <span class="glyphicon glyphicon-user form-control-feedback"></span>
           </div>
           <div class="form-group has-feedback">
              <input type="password" class="form-control" placeholder="Password" name="aPassword" required>
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
