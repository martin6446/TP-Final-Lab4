<?php /* require_once(VIEWS_PATH . "nav-bar.php") */ ?>
<div class="container">
    <form method="POST" action="<?php echo FRONT_ROOT ?>admin/showAdminAddCinemaView">
        <div class="row ">
            <div class="col border border-dark rounded m-2 col-6 ">
                <div class="form-row p-4" >
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
                <div class="form-row p-5">
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
                <div class="form-row pt-5 mt-5">
                    <button type="submit" class="btn btn-success m-2">Save Function</button>
                    <a type="button" class="btn btn-danger m-2">Cancel</a>
                </div>
            </div>
            <div class="col-2  border border-dark rounded m-2 col-3">
                <div><h2>Select one or more days</h2></div>
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