<?php require_once(VIEWS_PATH . "nav-bar.php");?>
<div class="container border border-secondary rounded ">
    <h1>Confirm Purchase</h1>
    <form method="GET" action="<?php echo FRONT_ROOT ?>ticket/purchaseTickets">
    <div class="form-row">
            <div class="form-group col-md-4">
                <h3>Cinema: <?php echo $function->getCinemaRoom()->getCinema()->getName() ?></h3>
                <h4>Movie : <?php echo $function->getMovie()->getName() ?> </h4>
                <h4>Duration : <?php echo $function->getMovie()->getDuration() ?> Min. </h4>
                <h4>Ticket Price : $<?php echo $function->getCinemaRoom()->getPrice() ?></h4>
                <label for="seats"><h4>Total Seats Selected: </h4></label>
                <input type="text" id="seats" name="seats" readonly value="<?php echo $seats ?>">
                <h4>Total Amount : $<?php echo $function->getCinemaRoom()->getPrice() * $_GET["seats"] ?></h4>
                <h4>Start time : <?php echo $function->getPrettyStartTime() ?> </h4>
                <h4>End time : <?php echo $function->getPrettyEndTime() ?> </h4>
            </div>

            <div class="form-group col-md-4">
                <label for="inputCredirCardName"><h4>Select Your Credit Card</h4></label>
                <select name="CCname" id="inputCredirCardName" class="form-control" required>
                    <option value="Visa">Visa</option>
                    <option value="Master">Master</option>
                </select>

                <label for="ccn"><h4>Credit Card Number</h4></label>
                <input id="ccn" type="tel" class="form-control" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx">

                <label for="inputCredirCardSecurityNumber"><h4>Your Security Number</h4></label>
                <input type="tel" class="form-control" name="SecurityNumber" id="inputCredirCardSecurityNumber" min=111 max=999 placeholder="xxx" required>
            </div>

        </div>
        <button type="submit" name="functionId" value="<?php echo $function->getId()?>" class="btn btn-success m-2">Confirm</button>
        <a class="btn btn-danger" href="<?php echo FRONT_ROOT ?>views/cinemaListingView">Cancel</a>
    </form>
</div>