<nav class="navbar navbar-expand-lg navbar-light bg-dark justify-content-center">
    <h1 class="display-4 text-light">Lumiére</h1>
</nav>

<h1 class="text-center text-black  p-1">Sign Up</h1>
<div class="container ">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto border border-dark rounded">
            <form method="POST" action="<?php echo FRONT_ROOT ?>user/userRegister">
                <div class="form-row">
                    <div class="form-group  col-md-4">
                        <label for="inputCinemaName">Nombre</label>
                        <input type="text" name="name" class="form-control" id="inputCinemaName" placeholder="Your Name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCinemaName">Apellido</label>
                        <input type="text" name="lastname" class="form-control" id="inputCinemaName" placeholder="Your Last Name" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group mx-auto col-4">
                        <label for="inputAddress">Email</label>
                        <input type="text" name="email" class="form-control" id="inputAddress" placeholder="Your Email Address" required>
                    </div>
                    <div class="form-group mx-auto col-4">
                        <label for="inputCity">Password</label>
                        <input type="password" name="password" class="form-control" id="inputCity" placeholder="**************" required>
                    </div>
                    <div class="form-group mx-auto col-4">
                        <label for="inputCity">Confirm Password</label>
                        <input type="password" name="confirmpass" class="form-control" id="inputCity" placeholder="**************" required>
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="inputState">City</label>
                        <select id="inputState" name="city" class="form-control" required>
                            <option selected disabled value="">Choose a city...</option>
                            <?php foreach ($cities as $city) { ?>
                                <option value="<?php echo $city->getId() ?>"><?php echo $city->getName() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary m-2">Register</button>
                <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>">Return</a>
                <?php if (isset($_SESSION["register"])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (isset($_SESSION["register"]["email_error"])) {
                            echo $_SESSION["register"]["email_error"];
                        } else if ($_SESSION["register"]["passwords_dont_match"]) {
                            echo $_SESSION["register"]["passwords_dont_match"];
                        } ?>
                    </div>
                <?php }
                unset($_SESSION["register"]) ?>
            </form>
        </div>
    </div>
</div>