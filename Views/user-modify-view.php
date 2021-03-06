<?php require_once(VIEWS_PATH . "nav-bar.php") ?>
<div class="container border border-secondary rounded ">
    <form method="GET" action="<?php echo FRONT_ROOT ?>user/modifyUser">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputName">First Name</label>
                <input type="text" name="name" class="form-control" id="inputName" value="<?php echo $_SESSION["name"] ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputLastName">Last Name</label>
                <input type="text" name="lastname" class="form-control" id="inpuLastName" value="<?php echo $_SESSION["lastname"] ?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputEmail">Email</label>
                <input type="text" name="email" class="form-control" id="inputEmail" value="<?php echo $_SESSION["email"] ?>" required readonly>
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" class="form-control" id="inputPassword" value="<?php echo $_SESSION["password"] ?>" pattern=".{8,}" title="Eight or more characters" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">City</label>
                <select id="inputState" name="city" class="form-control" required>
                    <option selected value="<?php echo $cityUser->getId()?>"><?php echo $cityUser->getName() ?></option>
                    <?php foreach ($cities as $city) {
                        if ($city === $cityUser) {

                        } else { ?>
                            <option value="<?php echo $city->getId()?>"><?php echo $city->getName() ?></option>
                    <?php }
                    } ?>
                </select>
            </div>
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-success m-2">Save Changes</button>
        <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>views/homeView">Cancel</a>
    </form>
</div>