<?php require_once(VIEWS_PATH . "admin-panel.php"); ?>
<div class="container">
    <h2>Filter Cinemas By Date</h2>
    <form action="<?php echo FRONT_ROOT?>views/cinemaGrossIncome" method="GET">
        <div class="row">
            <div class="col-4">
                <label for="date">
                    <h4>From:</h4>
                </label>
                <input type="date" class="form-control" id="date" name="stDate" max="2022-1-1">
            </div>
            <div class="col-4">
                <label for="date">
                    <h4>To:</h4>
                </label>
                <input type="date" class="form-control" id="date" name="endDate" max="2022-1-1">
            </div>
        </div>
        <button type="submit" class="btn btn-success mt-4">Select</button>
    </form>

</div>