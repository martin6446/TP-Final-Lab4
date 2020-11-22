<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>

<div class="container border border-secondary rounded ">
    <form method="GET" action="<?php echo FRONT_ROOT ?>views/confirmPurchaseView">
        <div class="form-row">
            <div class="form-group col-md-4">
                <h3>Cinema: <?php echo $function->getCinemaRoom()->getCinema()->getName() ?></h3>
                <h4>Movie : <?php echo $function->getMovie()->getName() ?> </h4>
                <h4>Duration : <?php echo $function->getMovie()->getDuration() ?> Min. </h4>
                <h4>Ticket Price : $<?php echo $function->getCinemaRoom()->getPrice() ?></h4>
                <h4>Start time : <?php echo $function->getPrettyStartTime() ?> </h4>
                <h4>End time : <?php echo $function->getPrettyEndTime() ?> </h4>
                <h4>Available Seats : <?php echo $function->getCinemaRoom()->getCapacity() ?></h4>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-">
                <h4>Number of Seats : </h4>
            </div>
            <div class="col-md-3">
                <input type="number" id="seats" name="seats" class="form-control" placeholder="Place the number of seats" min = 1 max = <?php ?>  required autofocus>
            </div>
        </div>


        <button type="submit" name="button" value="<?php echo $function->getId()?>" class="btn btn-success m-2">Purchase</button>
        <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>views/cinemaListingView">Cancel</a>
    </form>

</div>