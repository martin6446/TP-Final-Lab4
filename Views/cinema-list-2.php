<?php require_once("admin-panel.php")?>
    <table class="table table-striped">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Cinema Name </th>
          <th scope="col">Cinema Address</th>
          <th scope="col">Cinema City</th>
          <th scope="col">Select Cinema</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <form action="<?php echo FRONT_ROOT ?>views/FunctionAvailability" method="GET">
            <?php
            foreach ($cinemaList as $cinema) {
            ?>
              <td><?php echo $cinema->getName() ?></td>
              <td><?php echo $cinema->getAddress() ?></td>
              <td><?php echo $cinema->getCity()->getName() ?></td>

              <td><button type="submit" name="id" value="<?php echo $cinema->getId() ?>" class="btn btn-secondary">Select</button></td>

        </tr>
      <?php
            }
      ?>
      </form>
      </tbody>
    </table>

  </div>

</div>