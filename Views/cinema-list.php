<?php require_once(VIEWS_PATH."nav-bar.php");?>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Cinema Name</th>
            <th scope="col">Schedule</th>
            <th scope="col">Click Me!</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php
            foreach ($cinemaList as $cinema) {
            ?>
                <td><?php echo $cinema->getName() ?></td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </td>
                <td><button type="submit" class="btn btn-secondary">Click Me!</button></td>
        </tr>
    <?php
            }
    ?>
    </tbody>
</table>