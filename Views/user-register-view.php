<nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-center">
  <h1 class="display-4 text-light">Lumiére</h1>
</nav>

<!-- <h1 class="text-center text-white bg-dark p-1">Registrate</h1> -->
<div class="container ">
    <div class="border border-secondary rounded p-1 text-center">
        <form method="POST" action="<?php echo FRONT_ROOT ?>user/userRegister">
            <div class="form-row">
                <div class="form-group mx-auto col-4">
                    <label for="inputCinemaName">Nombre</label>
                    <input type="text" name="name" class="form-control" id="inputCinemaName" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group mx-auto col-4">
                    <label for="inputCinemaName">Apellido</label>
                    <input type="text" name="lastname" class="form-control" id="inputCinemaName" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group mx-auto col-4">
                    <label for="inputAddress">Email</label>
                    <input type="text" name="email" class="form-control" id="inputAddress" placeholder="" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group mx-auto col-4">
                    <label for="inputCity">Password</label>
                    <input type="password" name="password" class="form-control" id="inputCity" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group mx-auto col-4">
                    <label for="inputCity">Confirm Password</label>
                    <input type="password" name="confirmpass" class="form-control" id="inputCity" required>
                </div>
            </div>
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-secondary m-2">Register</button>
        </form>
        <div class="alert alert-danger" role="alert">
            A simple danger alert—check it out!
        </div>
    </div>
</div>