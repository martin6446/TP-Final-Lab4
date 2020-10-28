<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
  <figure class="figure">
    <img src="<?php echo IMG_PATH ?>Lumiére3.png" class="figure-img img-fluid rounded" alt="...">
  </figure>
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 ">
      <form action="<?php echo FRONT_ROOT ?>user/userLogin" method="POST" class="border-top border-primary p-3 bg-dark text-white">
        <div class="form-group">
          <label for="InputEmail">Email address</label>
          <input type="email" name="useremail" class="form-control-sm" id="InputEmail" aria-describedby="emailHelp" required>
          <small id="emailHelp" class="form-text text-muted">Never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="InputPassword">Password</label>
          <input type="password" name="password" class="form-control-sm" id="InputPassword" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</div>
<!-- ver como funciona -->
<!--   <div class="alert alert-danger" role="alert">
  A simple danger alert—check it out!
</div> -->