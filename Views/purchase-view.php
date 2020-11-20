<?php require_once(VIEWS_PATH . "nav-bar.php");?>

<div class="container border border-secondary rounded ">
    <form method="GET" action="<?php echo FRONT_ROOT ?>user/modifyUser">
        <div class="form-row">
            <div class="form-group col-md-4">
                <h3>Cinema: <?php echo $function->getCinemaRoom()->getCinema()->getName() ?></h3>
                <h4>Movie : <?php echo $function->getMovie()->getName() ?> </h4>
                <h4>Duration : <?php echo $function->getMovie()->getDuration() ?> Min. </h4>
                <h4>Ticket Price : $<?php echo $function->getCinemaRoom()->getPrice() ?></h4>
                <h4>Start time : <?php echo $function->getPrettyStartTime() ?> </h4>
                <h4>End time : <?php echo $function->getPrettyEndTime() ?> </h4>
            </div>
            
        </div>
        
        <button type="submit" class="btn btn-success m-2">Save Changes</button>
        <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>landing/loadData">Cancel</a>
    </form>
</div>