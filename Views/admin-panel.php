<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>

<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading p-3 border border-top-0">
      <h3> Menu</h3>
    </div>

    <div class="list-group list-group-flush">
      <a href="<?php echo FRONT_ROOT ?>views/addCinemaView" class="list-group-item list-group-item-action bg-light">Add Cinema</a>
      <a href="<?php echo FRONT_ROOT ?>views/cinemaList" class="list-group-item list-group-item-action bg-light">Add function</a>
      <a href="<?php echo FRONT_ROOT ?>views/cinemaListModify" class="list-group-item list-group-item-action bg-light">Manage Cinemas</a>
      <a href="<?php echo FRONT_ROOT ?>views/addMoviesView" class="list-group-item list-group-item-action bg-light">Add Movies</a>
      <a href="<?php echo FRONT_ROOT ?>views/movieList" class="list-group-item list-group-item-action bg-light">List Movies</a>



    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div class="container" id="page-content-wrapper">
    <div>
      <h1 class=" mt-4">Admin View</h1>