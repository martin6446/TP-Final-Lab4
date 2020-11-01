<?php require_once("admin-panel.php")?>

    <form action="<?php echo FRONT_ROOT?>admin/removeCinema" method="POST">
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Cinema Name</th>
            <th scope="col">Cinema Address</th>
            <th scope="col">Cinema City</th>
            <th scope="col">Remove Cinema</th>
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
                <td><button type="submit" name="name" class="btn btn-secondary" value="<?php echo $cinema->getName()?>">Remove!</button></td>
        </tr>
    <?php
            }
    ?>
    </tbody>
</table>
</form>
  



  </div>

</div>


