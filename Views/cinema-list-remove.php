<?php require_once(VIEWS_PATH."nav-bar.php");?>
<form action="<?php echo FRONT_ROOT?>admin/removeCinema" method="POST">
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Cinema Name</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Capacity</th>
            <th scope="col">Remove Cinema</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($cinemaList as $cinema) {
            ?>
                <td><?php echo $cinema->getName() ?></td>
                <!-- <td><?php echo $cinema->getCity() ?></td> -->
                <td><?php echo $cinema->getState() ?></td>
                <td><?php echo $cinema->getCapacity() ?></td>
                <td><button type="submit" name="name" class="btn btn-secondary" value="<?php echo $cinema->getName()?>">Remove!</button></td>
        </tr>
    <?php
            }
    ?>
    </tbody>
</table>
</form>