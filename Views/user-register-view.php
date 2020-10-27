<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1>Lumiére</h1>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign In
                </a>
                <form action="<?php echo FRONT_ROOT ?>user/userLogin" class="dropdown-menu p-2 dropdown-menu-right">
                    <div class="form-group ">
                        <label for="exampleDropdownFormEmail2">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleDropdownFormEmail2" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleDropdownFormPassword2">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleDropdownFormPassword2" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </form>
    </div>
</nav>
<h1 class="text-center text-white bg-dark p-1">Registrate</h1>
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