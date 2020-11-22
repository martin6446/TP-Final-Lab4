<?php require_once("admin-panel.php") ?>
<?php
if (empty($functionList)) { ?>
    <h3 class="text-center">There are no Functions in this Cinema</h3>
<?php } else { ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Cinema Function Name </th>
                <th scope="col">Available Seats</th>
                <th scope="col">Taken Seats</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <form action="<?php echo FRONT_ROOT ?>views/addCinemaFunctionView" method="GET">
                    <?php
                    foreach ($functionList as $function) { ?>

                        <td><?php echo $function[0]->getMovie()->getName() ?></td>
                        <td><?php echo $function[0]->getAvailableSeats() ?></td>
                        <td><?php echo $function[1] ?></td>
            </tr>
    <?php }
                } ?>
    </form>
        </tbody>
    </table>

    <a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>views/cinemaList2">Go Back</a>

    </div>

    </div>