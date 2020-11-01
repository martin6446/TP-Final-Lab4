<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>

<div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Main Menu </div>
    <div class="list-group list-group-flush">
      <a href="<?php echo FRONT_ROOT ?>views/addCinemaView" class="list-group-item list-group-item-action bg-light">Add Cinema</a>
      <a href="<?php echo FRONT_ROOT ?>views/cinemaList" class="list-group-item list-group-item-action bg-light">Add function</a>
      <a href="<?php echo FRONT_ROOT ?>views/cinemaListRemove" class="list-group-item list-group-item-action bg-light">Manage Cinemas</a>
      <a href="" class="list-group-item list-group-item-action bg-light">Manage functions</a>


    </div>
  </div>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div class="container" id="page-content-wrapper">
    <div>
      <h1 class=" mt-4">Admin View</h1>
    </div>

    <table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Cinema Name</th>
            <th scope="col">Cinema Address</th>
            <th scope="col">Cinema City</th>
            <th scope="col">Select Cinema</th>
        </tr>
    </thead>
    <tbody>
        <tr>
                <form action="<?php echo FRONT_ROOT ?>views/addCinemaFunctionView" method="GET">
                    <?php
                    foreach ($cinemaList as $cinema) {
                    ?>
                        <td><?php echo $cinema->getName() ?></td>
                        <td><?php echo $cinema->getAddress() ?></td>
                        <td><?php echo $cinema->getCity()->getName() ?></td>

                        <td><button type="submit" name="id" value="<?php echo $cinema->getId() ?>" class="btn btn-secondary">Select</button></td>

        </tr>
    <?php
                    }
    ?>
    </form>
    </tbody>
</table>

  </div>

</div>

