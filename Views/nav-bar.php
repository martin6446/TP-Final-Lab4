<div class="wrapper row1">
  <header id="header" class="clear">
    <div id="logo" class="fl_left">
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <h2>Lumiére</h2>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>landing/loadData">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>movie/showListView">Movies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo FRONT_ROOT ?>cinema/showListView">Cinemas</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
            <?php
            if ($_SESSION["isAdmin"] === 1){
            ?>
              <a class="nav-link" href="<?php echo FRONT_ROOT ?>admin/showAdminView">Admin View</a>
            <?php
            }
            ?>
          </li>
          <li class="nav-item nav">
            <a href="<?php echo   FRONT_ROOT?>user/logout" class="nav-link">Log Out</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</div>