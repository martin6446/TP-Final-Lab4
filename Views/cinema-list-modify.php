<?php require_once("admin-panel.php")?>

    <form action="<?php echo FRONT_ROOT?>views/modifyCinemaView" method="GET">
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Cinema Name</th>
            <th scope="col">Cinema Address</th>
            <th scope="col">Cinema City</th>
            <th scope="col">Modify</th>
            <th scope="col">Delete</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($cinemaList as $cinema) {
            ?>
                <td><?php echo $cinema->getName() ?></td>
                <td><?php echo $cinema->getAddress() ?></td>
                <td><?php echo $cinema->getCity()->getName() ?></td>
                <td><button type="submit" name="id" class="btn btn-alert" value="<?php echo $cinema->getId()?>">Modify!</button></td>
                <td><button type="submit" name="id" class="btn btn-danger" value="<?php echo $cinema->getId()?>" <?php if($controller->hasFunctions($cinema->getId())) echo "disabled";?>>Delete</button></td>

        </tr>
    <?php
            }
    ?>
    </tbody>
</table>
</form>
  



  </div>

</div>


