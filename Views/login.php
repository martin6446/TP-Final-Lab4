<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <h1>Lumiére</h1>
  </nav>

  <form action="<?php echo FRONT_ROOT?>landing/loadData" method="POST" class="border-top border-primary p-3 mb-2 bg-dark text-white">
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
  <!-- ver como funciona -->
<!--   <div class="alert alert-danger" role="alert">
  A simple danger alert—check it out!
</div> -->