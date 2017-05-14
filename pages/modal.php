<?php
$getMovie = $tmdb->getMovie($idMovie);
?>
<div class="row">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header"><?php echo $getMovie->getTitle() ?></h1>
    </div>
  </div>
  <div class="row">
  </div>
</div>
