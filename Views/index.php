<?php
require_once('nav-bar.php');

?>

<main class="py-5">
     <div class="slideshow-container py-1">
          <form action="<?php echo FRONT_ROOT ?> " method="post" class="bg-light-alpha p-5">
               <?php
              // foreach ($movieList as $movie) {
                    ?>
                              <div class="container">
                                   
                                   <div class="mySlides">
                                        <div class="row">
                                             <div class="col text-center pb-4">
                                             <b class="display-4">En Cartelera</b>
                                             </div>
                                        </div>
                                        <div class="row">
                                             <div class="column">
                                                  <button type="sumbit" class="btn btn-outline-light" name="idMovie_Selected" value="" <?php // echo $movie->getIdMovie(); ?>"><?php echo "<" /* . POSTER_ROOT . $movie->getImage()*/ . " width='360' height='480'>" ?> </button>
                                             </div>
                                                  <div class="column" style="margin-left:50px">
                                                  <div class="row py-5">
                                                       <h3> <?php /*echo $movie->getMovieName()*/ ?></h3>
                                                  </div>
                                                  <div class="row py-5">
                                                       <h5>Duration: <?php /* echo $movie->getDuration() */ ?> min </h5>
                                                  </div>
                                                  <div class="row py-5">

                                                
                                                       <h5>Genres: <?php      /* $genreArray = $movie->getGenre();
                                                                               foreach ($genreArray as $genres) {
                                                                                echo $genres->getDescription();
                                                                                if (next($genreArray)) {
                                                                                     echo "/";
                                                                                } 
                                                                           } */ 
                                                                           ?></h5>
                                                                           
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
               <?php// } ?>
          </form>


          <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
          <a class="next" onclick="plusSlides(1)">&#10095;</a>

     </div>
     <br>
