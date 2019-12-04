

<link rel='stylesheet' type='text/css' href='view/modules/vendor/4351/sb-admin.min.css'>
<link rel='stylesheet' type='text/css' href='view/modules/vendor/fontawesome-free/css/all.min.css'>


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
          <li class="nav-item active">
            <a class="nav-link"   >
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <?php
          if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]=="2")
          {
          ?>

          <li class="nav-item">
            <a class="nav-link" href=../userdata.php>
              <i class="fas fa-fw fa-folder"></i>
              <span>Users</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=../roledata.php>
              <i class="fas fa-fw fa-chart-area"></i>
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

          <div class="container-fluid" style='text-align: center;'>
                              <?php
            if (isset($_SESSION["roles_id"]) && $_SESSION["roles_id"]!= NULL)
            {
                $item = "roles_id";
                $value = $_SESSION["roles_id"];
                $links = new LinksController();
                $links = LinksController::ctrShowLinks($item, $value);
                foreach($links as $key => $value)
                    {
                      ?>

                      <button style='width:40%; margin: 10px;' type='button' class='btn btn-outline-info'>
                        <a href="<?php echo $value["link_url"]; ?>"><?php echo $value["link_name"]; ?></a>
                      </button>

                      <?php
                    }
              }
              ?>


          </div>
        </div>
  </div>
</body>
