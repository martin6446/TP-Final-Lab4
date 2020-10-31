<nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-center">
  <figure class="figure">
    <img src="<?php echo IMG_PATH ?>Lumiére3.png" class="figure-img img-fluid rounded" alt="...">
  </figure>
</nav>

<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
      <div class="card card-signin my-5">
        <div class="card-body">
          <h5 class="card-title text-center">Sign In</h5>
          <form action="<?php echo FRONT_ROOT ?>user/userLogin" method="POST">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
              <label for="inputEmail">Email address</label>
            </div>
            <?php
            if (isset($_SESSION["wrongUser"])) {
            ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["wrongUser"]; ?>
              </div>
            <?php unset($_SESSION["wrongUser"]);
            } ?>

            <div class="form-label-group">
              <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
              <label for="inputPassword">Password</label>
            </div>
            <?php
            if (isset($_SESSION["wrongPassword"])) {
            ?>
              <div class="alert alert-danger" role="alert">
                <?php echo $_SESSION["wrongPassword"]; ?>
              </div>
            <?php unset($_SESSION["wrongPassword"]);
            } ?>

            <button class="btn btn-md btn-secondary btn-block text-uppercase" name="button" type="submit">Sign in</button>

            <div class="form-label-group">
              <a href="<?php echo FRONT_ROOT ?>views/registerView" class="btn btn-link btn-sm btn-block">Not an User? Sign Up</a>
            </div>
            <hr class="my-4">
            <button class="btn btn-md btn-primary btn-block text-uppercase" type="submit">Sign in with Facebook</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>