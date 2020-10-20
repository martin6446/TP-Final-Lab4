<?php require_once(VIEWS_PATH . "nav-bar.php") ?>
<div class="container border border-secondary rounded ">
    <form method="POST" action="<?php echo FRONT_ROOT?>admin/addCinema">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCinemaName">Cinema Name</label>
                <input type="text" name="name" class="form-control" id="inputCinemaName">
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Address 2</label>
            <input type="text" name="address2" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" name="city" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" name="state" class="form-control">
                    <option selected>Choose...</option>
                    <option>Buenos Aires</option>
                    <option>Corrientes</option>
                    <option>Salta</option>
                    <option>Tucumán</option>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="inputZip">Zip</label>
                <input type="text" name="zip" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="form-group">
        </div>
        <button type="submit" class="btn btn-secondary m-2">Register Cinema</button>
    </form>
</div>