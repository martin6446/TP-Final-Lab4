<?php require_once(VIEWS_PATH . "nav-bar.php") ?>
<div class="container border border-secondary rounded ">
    <form method="POST" action="<?php echo FRONT_ROOT?>admin/addCinema">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputCinemaName">Cinema Name</label>
                <input type="text" name="name" class="form-control" id="inputCinemaName" value="<?php echo $cinema->getName()?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputTicketValue">Ticket Price</label>
                <input type="number" name="ticketvalue" class="form-control" id="inputTicketValue" value="<?php echo $cinema->getTicketValue()?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCapacity">Capacity</label>
                <input type="number" name="capacity" class="form-control" id="inputCapacity" value="<?php echo $cinema->getCapacity()?>" required>
            </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" value="<?php echo $cinema->getAddress()?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputAddress2">Address 2</label>
            <input type="number" name="address2" class="form-control" id="inputAddress2" value="<?php echo $cinema->getAddress2()?>" required>
        </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" name="city" class="form-control" id="inputCity" value="<?php echo $cinema->getCity()?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" name="state" class="form-control" required>
                    <option disabled >Choose...</option>
                    <option selected ><?php echo "actual state: ". $cinema->getState()?></option>
                    <option>Buenos Aires</option>
                    <option>Corrientes</option>
                    <option>Salta</option>
                    <option>Tucumán</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="number" name="zip" class="form-control" id="inputZip" value="<?php echo $cinema->getZip()?>" required>
            </div>
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-secondary m-2">Register Cinema</button>
    </form>
</div>