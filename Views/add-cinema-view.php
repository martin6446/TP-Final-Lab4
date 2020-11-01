<?php require_once("admin-panel.php") ?>
<div class="container border border-dark rounded p-3">
    <form method="GET" action="<?php echo FRONT_ROOT ?>views/addCinemaView">
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCinemaName">Cinema Name</label>
                <input type="text" name="cinema[name]" class="form-control" id="inputCinemaName" placeholder=" Awesome Cinema Name" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" name="cinema[address]" class="form-control" id="inputAddress" placeholder="Main St" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Number</label>
                <input type="number" name="cinema[addressNumber]" class="form-control" id="inputAddress2" placeholder="2045" min="1" max="99999" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">Province</label>
                <select id="inputState" name="cinema[state]" class="form-control" required>
                    <option selected disabled value="">Choose a province...</option>
                    <option value="<?php echo $provinces[0]->getId()?>"><?php echo $provinces[0]->getName() ?></option>
                    <!-- <?php foreach ($this->cityController->getProvinces() as $province) { ?>
                        <option value="<?php echo $province->getId() ?>"><?php echo $province->getName() ?></option>
                    <?php } ?> -->

                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">City</label>
                <select id="inputState" name="cinema[city]" class="form-control" required>
                    <option selected disabled value="">Choose a city...</option>
                    <?php foreach ($cities as $city) { ?>
                        <option value="<?php echo $city->getId() ?>"><?php echo $city->getName() ?></option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div>
            <h3>Add cinema Rooms</h3>
        </div>
        <?php for($x = 0; $x < $_SESSION["roomNumber"]; $x++){?>
        <div class="form-row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="<?php echo "cinemaRoom".$x."[name]"?>" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Capacity</label>
                    <input type="number" name="<?php echo "cinemaRoom".$x."[capacity]"?>" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="<?php echo "cinemaRoom".$x."[price]"?>" class="form-control" required>
                </div>
            </div>
        </div>
        <?php }?>

        <button type="submit" name="button" value="<?php echo $_SESSION["roomNumber"]?>" class="btn btn-secondary ml-auto d-block">Agregar</button>
        <button type="submit" name="button" value="save" class="btn btn-secondary m-2">Register Cinema</button>
    </form>
    <?php unset($_SESSION["roomNumber"])?>

</div>

</div>

</div>
