<<<<<<< HEAD
<?php require_once(VIEWS_PATH."nav-bar.php");?>
<form action="<?php echo FRONT_ROOT?>views/movieList" method="POST">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Movie Name</th>
      <th scope="col">Release Date</th>
      <th scope="col">Genre</th>
      <th scope="col">Duration</th>
      <!-- <th scope="col">Select</th> -->
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php
        foreach($movieList as $movie){
=======
<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>
<form action="<?php echo FRONT_ROOT ?>views/movieList" method="POST">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Movie Name</th>
        <th scope="col">Release Date</th>
        <th scope="col">Genre</th>
        <th scope="col">Duration</th>
        <!-- <th scope="col">Select</th> -->
      </tr>
    </thead>
    <tbody>
      <tr>
        <form action="<?php echo FRONT_ROOT ?>views/moviePreview" method="POST">
          <?php
          foreach ($movieList as $movie) {
>>>>>>> b62da620ad621fc6ad7c018853ff7d9621f69185

            echo "<tr>";
            echo "<td>" . $movie->getName() . "</td>";
            echo "<td>" . $movie->getReleaseDate() . "</td>";

<<<<<<< HEAD
          $strGenres = ""; 
          foreach($movie->getGenres() as $genre){
            $strGenres = $strGenres . ", " . $genre; 
          }
          echo "<td>". substr($strGenres, 1) . "</td>";
          echo "<td>". $movie->getDuration() ." - Min </td>";
          /* echo "<td><button type='submit' class='btn btn-secondary'>Select</button></td>"; */
          echo "</tr>";
=======
            $strGenres = "";
            foreach ($movie->getGenres() as $genre) {
              $strGenres = $strGenres . ", " . $genre;
            }
            echo "<td>" . substr($strGenres, 1) . "</td>";
            echo "<td>" . $movie->getDuration() . " - Min </td>";
           // echo "<td><button type='submit' name='button' class='btn btn-secondary'>Select</button></td>";
            echo "</tr>";
>>>>>>> b62da620ad621fc6ad7c018853ff7d9621f69185
          }
          ?>
        </form>
      <tr>
    </tbody>
  </table>
</form>