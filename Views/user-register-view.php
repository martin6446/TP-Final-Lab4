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
                        <label for="inputState">Province</label>
                        <select id="inputState" name="province" class="form-control" required>
                            <option selected disabled value="" >Choose a province...</option>
                            <?php foreach ($provinces as $province) { ?>
                                <option value="<?php echo $province->getId()?>" ><?php echo $province->getName() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">City</label>
                        <select id="inputState" name="city" class="form-control" required>
                            <option selected disabled value="" >Choose a city...</option>
                            <?php foreach ($cities as $city) { ?>
                                <option value="<?php echo $city->getId()?>" ><?php echo $city->getName() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-secondary m-2">Register</button>
                <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>">Return</a>
            </form>
        </div>
    </div>
</div>