<?php require_once("admin-panel.php") ?>

<form method="POST" action="<?php echo FRONT_ROOT ?>admin/addCinema">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCinemaName">Cinema Name</label>
            <input type="text" name="name" class="form-control" id="inputCinemaName" placeholder=" Awesome Cinema Name" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputTicketValue">Ticket Price</label>
            <input type="number" name="ticketvalue" class="form-control" id="inputTicketValue" placeholder="Some Price" min="1" max="500" required>
        </div>
        <div class="form-group col-md-4">
            <label for="inputCapacity">Capacity</label>
            <input type="number" name="capacity" class="form-control" id="inputCapacity" placeholder="42069" min="100" max="1000" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Main St" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Address Number</label>
            <input type="number" name="adrress number" class="form-control" id="inputAddress2" placeholder="2045" min="1" max="99999" required>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" name="state" class="form-control" required>
                <option selected disabled value="">Choose a province...</option>
                <?php foreach ($this->cityController->getProvinces() as $province) { ?>
                    <option value="<?php echo $province->getId() ?>"><?php echo $province->getName() ?></option>
                <?php } ?>

            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="inputState">City</label>
            <select id="inputState" name="state" class="form-control" required>
                <option selected disabled value="">Choose a city...</option>
                <?php foreach ($this->cityController->getCities() as $city) { ?>
                    <option><?php echo $city->getName() ?></option>
                <?php } ?>

            </select>
        </div>
    </div>
    <div class="form-group">
    </div>
    <button type="submit" class="btn btn-secondary m-2">Register Cinema</button>
</form>

</div>

</div>

</div>