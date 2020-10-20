<form action="<?php echo FRONT_ROOT?>cinema/showListView" method="POST">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Movie Name</th>
      <th scope="col">date</th>
      <th scope="col">Category</th>
      <th scope="col">Select</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
        var_dump($movieList);
        foreach($movieList as $movie){

          ?>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td><button type="submit" class="btn btn-secondary" value="<?php ?>">Clik Me!</button></td>
        </tr>
        <?php
        }
    ?>
    <tr>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><button type="submit" class="btn btn-secondary">Clik Me!</button></td>
    </tr>
    <tr>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td><button type="submit" class="btn btn-secondary">Clik Me!</button></td>
    </tr>
  </tbody>
</table>
</form>
