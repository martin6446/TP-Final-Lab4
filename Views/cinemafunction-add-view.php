<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Main Menu </div>
        <div class="list-group list-group-flush">
            <a href="<?php echo FRONT_ROOT ?>views/addCinemaView" class="list-group-item list-group-item-action bg-light">Add Cinema</a>
            <a href="<?php echo FRONT_ROOT ?>views/cinemaList" class="list-group-item list-group-item-action bg-light">Add function</a>
            <a href="<?php echo FRONT_ROOT ?>views/cinemaListRemove" class="list-group-item list-group-item-action bg-light">Manage Cinemas</a>
            <a href="" class="list-group-item list-group-item-action bg-light">Manage functions</a>


        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->


    <div class="container" id="page-content-wrapper">
        <div>
            <h1 class=" mt-4">Admin View</h1>
        </div>

        <div class="container border border-dark rounded p-3">
            <h3 class="mb-3">Cinema Info</h3>
            <div class="row ">

                <div class="col-lg-4">
                    <label for="">Cinema Name</label>
                    <input type="text" name="cinemaname" class="form-control form-control-ml" id="cinemaname" value="<?php echo $cinema->getName() ?>" disabled>
                </div>
                <div class="col-lg-4">
                    <label for="cinemaaddress">Cinema Address</label>
                    <input type="text" name="" class="form-control form-control-ml" id="cinemaaddress" value="<?php echo $cinema->getAddress() ?>" disabled>
                </div>
                <div class="col-lg-4">
                    <label for="cinemacity">Cinema City</label>
                    <input type="text" name="" class="form-control form-control-ml" id="cinemacity" value="<?php echo $cinema->getCity()->getName() ?>" disabled>
                </div>
                

            </div>
        </div>


        <form method="POST" action="<?php echo FRONT_ROOT ?>admin/showAdminAddCinemaView">
            <div class="row ">
                <div class="col border border-dark rounded m-2 col-6 ">
                    <div class="form-row p-4">
                        <div class="col border border-dark rounded m-2 p-2">
                            <div>
                                <label for="STtime">
                                    <h2>Starting Time</h2>
                                </label>
                            </div>
                            <input type="time" id="STtime" name="starttime">
                        </div>
                        <div class="col border border-dark rounded m-2 p-2">
                            <div>
                                <label for="Ftime">
                                    <h2>Ending Time</h2>
                                </label>
                            </div>
                            <input type="time" id="Ftime" name="finishtime">
                        </div>
                    </div>
                    <div class="form-row px-5">
                        <div>
                            <label for="movie">
                                <h2>Select a Movie</h2>
                            </label>
                        </div>
                        <select class="form-control " id="movie" name="movie" required>
                            <option selected disabled value="">Select a movie</option>
                            <option value="">asdf</option>
                            <option value="">asdf</option>
                            <option value="">asdf</option>
                            <option value="">asdf</option>
                            <option value="">asdf</option>
                        </select>
                    </div>
                    <div class="form-row px-5">
                    <div>
                        <label for="movie">
                            <h2>Select a Room</h2>
                        </label>
                    </div>
                    <select class="form-control " id="movie" name="movie" required>
                        <option selected disabled value="">Select a room</option>
                        <option value="">asdf</option>
                        <option value="">asdf</option>
                        <option value="">asdf</option>
                        <option value="">asdf</option>
                        <option value="">asdf</option>
                    </select>
                </div>
                    <div class="form-row px-5">
                        <div>
                            <label for="week">
                                <h2>Select amount of Weeks</h2>
                            </label>
                        </div>
                        <select class="form-control " id="week" name="movie" required>
                            <option selected disabled value="">Select amount of weeks</option>
                            <option value="1">1 week</option>
                            <option value="2">2 week</option>
                            <option value="3">3 week</option>
                            <option value="4">4 week</option>
                            <option value="5">5 week</option>
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
                                    <input type="checkbox" id="checkboxInput2" name="weekday[]">
                                    <label for="checkboxInput2">Monday</label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-row ">
                                <div class="form-group m-2">
                                    <input type="checkbox" id="checkboxInput3" name="weekday[]">
                                    <label for="checkboxInput3">Tuesday</label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-row ">
                                <div class="form-group m-2">
                                    <input type="checkbox" id="checkboxInput4" name="weekday[]">
                                    <label for="checkboxInput4">Wednesday</label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-row ">
                                <div class="form-group m-2">
                                    <input type="checkbox" id="checkboxInput5" name="weekday[]">
                                    <label for="checkboxInput5">Thursday</label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-row ">
                                <div class="form-group m-2">
                                    <input type="checkbox" id="checkboxInput6" name="weekday[]">
                                    <label for="checkboxInput6">Friday</label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-row ">
                                <div class="form-group m-2">
                                    <input type="checkbox" id="checkboxInput7" name="weekday[]">
                                    <label for="checkboxInput7">Saturday</label>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="form-row ">
                                <div class="form-group m-2">
                                    <input type="checkbox" id="checkboxInput7" name="weekday[]">
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