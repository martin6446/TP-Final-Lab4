<?php require_once("admin-panel.php") ?>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Movie Name </th>
            <th scope="col">Gross income</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <form action="<?php echo FRONT_ROOT ?>views/addCinemaFunctionView" method="GET">
                <?php
                foreach ($movieList as $movie) { ?>

                    <td><?php echo $movie["nombre"] ?></td>
                    <td>$<?php echo $movie["Recaudacion"] ?></td>
                    
        </tr>
    <?php } ?>
    </form>
    </tbody>
</table>

<a class="btn btn-secondary" href="<?php echo FRONT_ROOT ?>views/SelectDateView">Go Back</a>

</div>

</div>