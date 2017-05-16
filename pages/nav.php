<nav>
  <div class="sidebar" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- NOTE: navbar-header -->
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li>
          <img class="img-responsive" src="">
        </li>
        <li class="sidebar-search">
          <form method="get" class="input-group custom-search-form" autocomplete="off">
            <input type="text" class="form-control" name="movieSearch" placeholder="Buscar pelicula..." required="">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="boton">
                <i class="fa fa-search"></i>
              </button>
            </span>
          </form>
          <!-- NOTE: input-group -->
        </li>
        <li>
          <a href="index.php"><i class="fa fa-film fa-fw"></i> Inicio</a>
        </li>
      </ul>
      <ul class="nav" id="side-menu">
        <li>
          <div class="material-switch">
            <input id="switch" name="switch" type="checkbox" />
            <label for="switch" class="label-default"></label>
          </div>
        </li>
        <li class="dropup">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>
            <i class="fa <fa-caret-up></fa-caret-up>"></i>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
          <!-- NOTE: dropdown-user -->
        </li>
        <!-- NOTE: dropdown -->
      </ul>
    </div>
    <!-- NOTE: sidebar-collapse -->
  </div>
  <!-- NOTE: navbar-static-side -->
</nav>
