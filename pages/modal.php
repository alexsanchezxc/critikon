
<?php
$getMovie = $tmdb->getMovie($idMovie);
echo '<br>';
echo '<div class="container-fluid thumbnail">';
echo '<div id="backdrop">';
echo '<div class="row">';
echo '<div class="col-md-4">';
echo '<img class="img-responsive poster" src="../assets/poster.png" alt="'.$getMovie->getTitle().'">';
echo '</div>';
echo '<div class="col-md-8">';
echo '<h2 class="page-header" data-toggle="tooltip" data-placement="bottom" title="'.$getMovie->getTitle().'">'.$getMovie->getTitle().'</h2>';
echo '<p class="flex">';
echo '<span><strong>&nbsp<i class="fa fa-calendar fa-fw"></i>'.$getMovie->get('release_date').'</strong></span>';
echo '<span><strong><i class="fa fa-star fa-fw"></i>'.$getMovie->getVoteAverage().'&nbsp</strong></span>';
echo '</p>';
echo '<p>'.$getMovie->get('overview').'</p>';
echo '<ul class="list-inline">';
foreach ($getMovie->getGenres() as $Genre) {
  echo '<li>'.$Genre->getName().'</li>';
}
echo '</ul>';
echo '</div>';
echo '</div>';
echo '</div>';
?>
  <div class="panel-body">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Home</a>
      </li>
      <li><a href="#profile" data-toggle="tab">Profile</a>
      </li>
      <li><a href="#messages" data-toggle="tab">Messages</a>
      </li>
      <li><a href="#settings" data-toggle="tab">Settings</a>
      </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane fade in active" id="home">
        <h4>Home Tab</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="tab-pane fade" id="profile">
        <h4>Profile Tab</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="tab-pane fade" id="messages">
        <h4>Messages Tab</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
      <div class="tab-pane fade" id="settings">
        <h4>Settings Tab</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </div>
    </div>
  </div>
  <?php
echo '</div>';
echo '<br>';
?>
<style media="screen">
#backdrop:before {
  background-image: url('<?php echo $img.$getMovie->get('backdrop_path') ?>');
}
.poster {
  background-image: url('<?php echo $img.$getMovie->getPoster() ?>');
}
</style>
