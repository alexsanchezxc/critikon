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
      <ul id="options">
        <li class="material-switch">
          <input id="switch" name="switch" type="checkbox" />
          <label for="switch" class="label-default"></label>
        </li>
        <li id="drop" class="dropup">
          <?php
          if (isset($_SESSION["usuario"])) {
            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">';
            echo '<i class="fa fa-user fa-fw"></i>';
            echo '<i id="dropcaret" class="fa fa-caret-up"></i>';
            echo '</a>';
            echo '<ul class="dropdown-menu dropdown-user">';
            echo '<li>';
            echo '<a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>';
            echo '</li>';
            echo '<li class="divider"></li>';
            echo '<li>';
            echo '<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>';
            echo '</li>';
            echo '</ul>';
          } else {
            echo '<a class="dropdown-toggle" data-toggle="dropdown" href="#">';
            echo '<i class="fa fa-user fa-fw"></i>';
            echo '<i id="dropcaret" class="fa fa-caret-up"></i>';
            echo '</a>';
            echo '<ul class="dropdown-menu dropdown-user">';
            echo '<li>';
            echo '<a href="login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a>';
            echo '</li>';
            echo '<li>';
            echo '<a href="registro.php"><i class="fa fa-external-link fa-fw"></i> Registrarse</a>';
            echo '</li>';
            echo '</ul>';
          }
          ?>
          <!-- NOTE: dropdown-user -->
        </li>

        <!-- NOTE: dropdown -->
      </ul>
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
          <a href="index.php"><i class="fa fa-home fa-fw"></i> Inicio</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-film fa-fw"></i> Películas<span class="fa arrow"></span></a>
          <ul class="nav nav-second-level">
            <li>
              <a href="upcomingMovies.php"><i class="fa fa-calendar fa-fw"></i> Próximamente</a>
            </li>
            <li>
              <a href="topratedMovies.php"><i class="fa fa-star fa-fw"></i> Mejor Valoradas</a>
            </li>
            <li>
              <a href="popularMovies.php"><i class="glyphicon glyphicon-fire"></i> Popular</a>
            </li>
            <li>
              <a href="playingMovies.php"><i class="fa fa-play fa-fw"></i> En Cartelera Hoy</a>
            </li>
          </ul>
          <!-- /.nav-second-level -->
        </li>
      </ul>
    </div>
    <!-- NOTE: sidebar-collapse -->
  </div>
  <!-- NOTE: navbar-static-side -->
</nav>
