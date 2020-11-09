<?php require_once(VIEWS_PATH."nav-bar.php");?>
<form action="<?php echo FRONT_ROOT?>views/moviePreview" method="POST">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Cinema Name</th>
      <th scope="col">Cinema Room Name</th>
      <th scope="col">Movie Name</th>
      <th scope="col">Start Time</th>
      <th scope="col">End Time</th>
      <th scope="col">Select</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        foreach($functions as $function){

            echo "<tr>";
            echo "<td>" . $function->getCinemaRoom()->getCinema()->getName() . "</td>";
            echo "<td>" . $function->getCinemaRoom()->getName() . "</td>";
            echo "<td>" . $function->getMovie()->getName() . "</td>";
            echo "<td>" . $function->getStartTime() . "</td>";
            echo "<td>" . $function->getEndTime() . "</td>";
            echo "<td><button type='submit' name='functionId' value=".$function->getId()." class='btn btn-secondary'>Select</button></td>"; 
          }
           
          echo "</tr>";
        
          ?>
        </form>
      <tr>
    </tbody>
  </table>
</form>