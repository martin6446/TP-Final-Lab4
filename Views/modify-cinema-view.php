<?php require_once("admin-panel.php") ?>
<div class="container ">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-7 mx-auto border border-dark rounded">
            <form method="POST" action="<?php echo FRONT_ROOT ?>views/modifyCinemaView">
                <div>
                    <h4>Modify Cinema</h4>
                </div>
                <div class="form-row">
                    <div class="form-group  col-md-4">
                        <label for="inputCinemaName">Name</label>
                        <input type="text" name="name" class="form-control" id="inputCinemaName" value="<?php echo $cinema->getName() ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCinemaAddress">Address</label>
                        <input type="text" name="address" class="form-control" id="inputCinemaAddress" value="<?php echo $cinema->getAddress() ?>" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCinemaCity">City</label>
                        <input type="text" name="city" class="form-control" id="inputCinemaCity" value="<?php echo $cinema->getCity()->getName() ?>" required readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <button type="submit" name="updateCinema" value="<?php echo $cinema->getId() ?>" class="btn btn-success m-2">Update Cinema</button>
                    </div>
                </div>
                <div>
                    <h4>Modify Cinema Rooms</h4>
                </div>
                <?php 
                foreach ($rooms as $room) { ?>
                    <div class="form-row align-items-end">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="room[name]">Name</label>
                                <input type="text" name="room<?php echo $room->getId()?>[name]" value="<?php echo $room->getName() ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="room[capacity]">Capacity</label>
                                <input type="number" name="room<?php echo $room->getId()?>[capacity]" class="form-control" value="<?php echo $room->getCapacity() ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label for="room[price]">Price</label>
                                <input type="number" name="room<?php echo $room->getId()?>[price]" class="form-control" value="<?php echo $room->getPrice() ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-2 ">
                            <div class="form-group">
                                <button class="btn btn-success" name="updateRoom" value="<?php echo $room->getId()?>">Update</button>
                            </div>
                        </div>
                    </div>
                <?php  } ?>
                <div class="form-row align-items-center">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="addedRoom[name]">Name</label>
                            <input type="text" name="addedRoom[name]" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="addedRoom[capacity]">Capacity</label>
                            <input type="number" name="addedRoom[capacity]" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <label for="addedRoom[price]">Price</label>
                            <input type="number" name="addedRoom[price]" class="form-control">
                        </div>
                    </div>
                </div>


                <button type="submit" name="add" value="" class="btn btn-primary ml-auto d-block">Agregar</button>
            </form>
        </div>
    </div>
</div>