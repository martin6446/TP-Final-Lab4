<?php require_once("admin-panel.php") ?>

<form method="GET" action="<?php echo FRONT_ROOT ?>cinemaFunction/addFunction">

    <div class="container border border-dark rounded p-3">
        <h3 class="mb-3">Cinema Info</h3>
        <div class="row ">

            <div class="col-lg-4">
                <label for="">Cinema Name</label>
                <input type="text" name="cinemaname" class="form-control form-control-ml" id="cinemaname" value="<?php echo $cinema->getName() ?>" readonly>
            </div>
            <div class="col-lg-4">
                <label for="cinemaaddress">Cinema Address</label>
                <input type="text" name="" class="form-control form-control-ml" id="cinemaaddress" value="<?php echo $cinema->getAddress() ?>" readonly>
            </div>
            <div class="col-lg-4">
                <label for="cinemacity">Cinema City</label>
                <input type="text" name="cinemacity" class="form-control form-control-ml" id="cinemacity" value="<?php echo $cinema->getCity()->getName() ?>" readonly>
            </div>


        </div>
    </div>


    <div class="row ">
        <div class="col border border-dark rounded m-2 col-6 ">
            <div class="form-row p-4">
                <div class="col border border-dark rounded m-2 p-2">
                    <div>
                        <label for="STtime">
                            <h2>Start Time</h2>
                        </label>
                    </div>
                    <input type="time" id="STtime" name="starttime">
                </div>
            </div>
            <div class="form-row px-5">
                <div>
                    <label for="movie">
                        <h2>Select a Movie</h2>
                    </label>
                </div>
                <select class="form-control " id="movie" name="movieId" required>
                    <option selected disabled value="">Select a movie</option>
                    <?php foreach($movies as $movie){ ?>
                    <option value="<?php echo $movie->getIdMovie()?>"><?php echo $movie->getName()?></option>
                    <?php }?>                    
                </select>
            </div>
            <div class="form-row px-5">
                <div>
                    <label for="room">
                        <h2>Select a Room</h2>
                    </label>
                </div>
                <select class="form-control " id="room" name="roomId" required>
                    <option selected disabled value="">Select a room</option>
                    <?php foreach ($rooms as $room) { ?>
                        <option value="<?php echo $room->getId() ?>"><?php echo $room->getName() ?></option>
                    <?php } ?>

                </select>
            </div>
            <div class="form-row px-5">
                <div>
                    <label for="week">
                        <h2>Select an amount of Weeks</h2>
                    </label>
                </div>
                <select class="form-control " id="week" name="week" required>
                    <option selected disabled value="">Select amount of weeks</option>
                    <option value="1">1 week</option>
                    <option value="2">2 week</option>
                    <option value="3">3 week</option>
                    <option value="4">4 week</option>
                </select>
            </div>
            <div class="form-row pt-5 mt-4">
                <button type="submit" class="btn btn-success m-2">Save Function</button>
                <a type="button" class="btn btn-danger m-2">Cancel</a>
            </div>
        </div>
        <div class="col-2  border border-dark rounded m-2 col-3">
            <div>
                <h2>Select one or more days</h2>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput1" value="monday" name="weekday[]">
                            <label for="checkboxInput1">Monday</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput2" value="tuesday" name="weekday[]">
                            <label for="checkboxInput2">Tuesday</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput3" value="wednesday" name="weekday[]">
                            <label for="checkboxInput3">Wednesday</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput4" value="thursday" name="weekday[]">
                            <label for="checkboxInput4">Thursday</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput5" value="friday" name="weekday[]">
                            <label for="checkboxInput5">Friday</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput6" value="saturday" name="weekday[]">
                            <label for="checkboxInput6">Saturday</label>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="form-row ">
                        <div class="form-group m-2">
                            <input type="checkbox" id="checkboxInput7" value="sunday" name="weekday[]">
                            <label for="checkboxInput7">Sunday</label>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>


</form>


</div>

</div>