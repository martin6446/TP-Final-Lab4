<?php require_once(VIEWS_PATH."nav-bar.php");?>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Main Menu </div>
      <div class="list-group list-group-flush">
        <a href="<?php echo FRONT_ROOT?>admin/showAdminAddCinemaView"  class="list-group-item list-group-item-action bg-light">Add Cinema</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Add Movie</a>
        <a href="<?php echo FRONT_ROOT?>admin/showAdminRemoveCinemaView" class="list-group-item list-group-item-action bg-light">Remove Cinema</a>
        <a href="#" class="list-group-item list-group-item-action bg-light">Remove Movie</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom py-3">
      </nav>

      <div class="container-fluid">
        <h1 class="mt-4">Admin View</h1>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>