<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
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
        
        foreach($movieList as $movie){
          
         // echo "<tr>". "<td>" . $movie->getName()."<tr>"."</td>";
        
          //echo "<td> <img src=". $dire .$movie[0]["backdrop_path"] ."></td>";
          
          //echo "<td>". $movie[""] ."</td>";
          }
          ?>
       <!--  <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td><button type="submit" class="btn btn-secondary" value="<?php ?>">Clik Me!</button></td>
        </tr>
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
    </tr> -->
  </tbody>
</table>
</form>
</body>
</html>