<?php require_once("admin-panel.php");

/* if(isset($_SESSION["add_cinema"])){
    var_dump($_SESSION["add_cinema"]);
}
die; */

?>
<div class="container border border-dark rounded p-3">
    <form method="GET" action="<?php echo FRONT_ROOT ?>views/addCinemaView">
        <div class="form-row">
            <div class="form-group col-md">
                <label for="inputCinemaName">Cinema Name</label>
                <input type="text" name="cinema[name]" class="form-control" id="inputCinemaName" placeholder=" Awesome Cinema Name" value="<?php if(isset($_SESSION["add_cinema"]["cinema"])){ echo $_SESSION["add_cinema"]["cinema"]["name"] ;}?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Address</label>
                <input type="text" name="cinema[address]" class="form-control" id="inputAddress" placeholder="Main St" value="<?php if(isset($_SESSION["add_cinema"]["cinema"])){ echo $_SESSION["add_cinema"]["cinema"]["address"] ;}?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress2">Address Number</label>
                <input type="number" name="cinema[addressNumber]" class="form-control" id="inputAddress2" placeholder="2045" min="1" max="99999" value="<?php if(isset($_SESSION["add_cinema"]["cinema"])){ echo $_SESSION["add_cinema"]["cinema"]["addressNumber"] ;}?>" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">City</label>
                <select id="inputState" name="cinema[city]" class="form-control" required>
                    <?php foreach ($cities as $city) { ?>
                        <option value="<?php echo $city->getId() ?>" <?php if(isset($_SESSION["add_cinema"]["cinema"]) && $_SESSION["add_cinema"]["cinema"]["city"] == $city->getId()){ echo "selected";}?>><?php echo $city->getName()  ?></option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div>
            <h3>Add Cinema Rooms</h3>
        </div>
        <?php for($x = 1; $x <= $_SESSION["roomNumber"]; $x++){?>
        <div class="form-row">
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="<?php echo "cinemaRoom".$x."[name]"?>" class="form-control" value="<?php if(isset($_SESSION["add_cinema"]["cinemaRoom".$x])){ echo $_SESSION["add_cinema"]["cinemaRoom".$x]["name"] ;}?>" required>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label for="">Capacity</label>
                    <input type="number" name="<?php echo "cinemaRoom".$x."[capacity]"?>" class="form-control" min="100" max="1000" value="<?php if(isset($_SESSION["add_cinema"]["cinemaRoom".$x])){ echo $_SESSION["add_cinema"]["cinemaRoom".$x]["capacity"] ;}?>" required>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="<?php echo "cinemaRoom".$x."[price]"?>" class="form-control" min="50" max="5000" value="<?php if(isset($_SESSION["add_cinema"]["cinemaRoom".$x])){ echo $_SESSION["add_cinema"]["cinemaRoom".$x]["price"] ;}?>" required>
                </div>
            </div>
        </div>
        <?php }?>
            <div class="row justify-content-end">
                <div class="col-2">
                <button type="submit" name="add" value="<?php echo $_SESSION["roomNumber"]?>" class="btn btn-success ml-auto d-block" <?php if($_SESSION["roomNumber"] >= 5){ echo "disabled";}?>>Add Room</button>
                </div>
                
                <div class="col-2">
                <button type="submit" name="remove" value="<?php echo $_SESSION["roomNumber"]?>" class="btn btn-danger ml-auto d-block" <?php if($_SESSION["roomNumber"] <= 1){ echo "disabled";}?> >Remove Room</button>
                </div>
            </div>
        <button type="submit" name="save" value="save" class="btn btn-secondary m-2">Register Cinema</button>
    </form>
    <?php unset($_SESSION["roomNumber"])?>
    <?php unset($_SESSION["add_cinema"])?>

</div>

</div>

</div>
