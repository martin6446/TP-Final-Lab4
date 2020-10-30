<?php require_once(VIEWS_PATH."nav-bar.php");?>




  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Main Menu </div>
      <div class="list-group list-group-flush">
        <a href="<?php echo FRONT_ROOT?>admin/showAdminAddCinemaView"  class="list-group-item list-group-item-action bg-light">Add Cinema</a>
        <a href="<?php echo FRONT_ROOT?>admin/showAdminAddCinemaFunctionView" class="list-group-item list-group-item-action bg-light">Add function</a>
        <a href="<?php echo FRONT_ROOT?>admin/showAdminRemoveCinemaView" class="list-group-item list-group-item-action bg-light">Manage Cinemas</a>
        <a href="" class="list-group-item list-group-item-action bg-light">Manage functions</a>
        
        
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div class="container" id="page-content-wrapper">
      <div>
        <h1 class=" mt-4">Admin View</h1>
      </div>


      <?php 
/*       var_dump($this->cinemaController);
      die; */
      if(isset($valor)){
        switch($valor){
          case 1:
            require_once(VIEWS_PATH."add-cinema-view.php");
          break;
          case 2:
            $this->cinemaController->showListView($valor);
          break;
          case 3:
            $this->cinemaController->showListView($valor);
          break;
          default:

        break;
        }
      }
        ?>
        


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