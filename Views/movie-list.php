<?php require_once(VIEWS_PATH."nav-bar.php");?>
<form action="<?php echo FRONT_ROOT?>views/movieList" method="POST">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Movie Name</th>
      <th scope="col">Release Date</th>
      <th scope="col">Genre</th>
      <th scope="col">Select</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        foreach($movieList as $movie){

          echo "<tr>";
          echo "<td>" . $movie->getName()."</td>";
          echo "<td>". $movie->getReleaseDate() . "</td>";

          $strGenres = ""; 


          foreach($movie->getGenres() as $genre){
            $strGenres = $strGenres . ", " . $genre; 
          }
          echo "<td>". substr($strGenres, 1) . "</td>";
          echo "<td><button type='submit' class='btn btn-secondary'>Select</button></td>";
          echo "</tr>";
          }
          ?>
  </tbody>
</table>
</form>
