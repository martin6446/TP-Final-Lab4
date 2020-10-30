<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Cinema Name</th>
            <th scope="col">Click Me!</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php if ($valor == 2) { ?>
                <form action="<?php echo FRONT_ROOT ?>admin/showAdminAddCinemaFunctionView" method="GET">
                <?php } else { ?>
                    <form action="<?php echo FRONT_ROOT ?>cinema/modifyCinema" method="GET">
                    <?php } ?>

                    <?php  
                        foreach ($cinemaList as $cinema) {
                    ?>
                            <td><?php echo $cinema->getName() ?></td>

                            <td><button type="submit" name="name" value="<?php echo $cinema->getName() ?>" class="btn btn-secondary">Click Me!</button></td>

        </tr>
<?php
                        }
?>
</form>
    </tbody>
</table>