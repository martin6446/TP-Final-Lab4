<?php
if (!isset($_SESSION["loggedUser"])) {
  header("location:" . FRONT_ROOT);
} else {
?>
  <div class="wrapper row1 sticky-top">
    <header id="header" class="clear">
      <div id="logo" class="fl_left">
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <h2>Lumiére</h2>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ">
            <li class="nav-item active">
              <a class="nav-link" href="<?php echo FRONT_ROOT ?>views/homeView">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo FRONT_ROOT ?>views/cinemaListingView">Cinema Listing</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>views/cinemaList">Cinemas</a>
          </li> -->
          </ul>
          <ul class="navbar-nav ml-auto">

            <?php
            if ($_SESSION["isAdmin"] == 1) {
            ?>
              <li class="nav-item ">
                <a class="nav-link" href="<?php echo FRONT_ROOT ?>views/adminView">Admin View</a>
              </li>
              
            <?php
            }
            ?>

            <li class="nav-item nav">
              <a class="nav-link" href="<?php echo FRONT_ROOT ?>views/modifyUser">My Profile</a>
            </li>
            <li class="nav-item nav">
              <a href="<?php echo FRONT_ROOT ?>user/logout" class="nav-link">Log Out</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
  </div>
<?php
}
?>