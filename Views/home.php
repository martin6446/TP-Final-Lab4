<?php
require_once(VIEWS_PATH . "nav-bar.php");

//var_dump($featuredMovies);
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<style>
    .carousel-item {
        height: 65vh;
        min-height: 350px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
</style>

<header>
<input type="time" step="900">
    <div id="carouselPelis" class="carousel slide" data-ride="carousel">
    <div id="carouselEx" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselEx" data-slide-to="0" class="active"></li>
            <li data-target="#carouselEx" data-slide-to="1"></li>
            <li data-target="#carouselEx" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="background-image: url(<?php echo $featuredMovies[0]->getBackdrop(); ?>)">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4"><?php echo $featuredMovies[0]->getName(); ?></h3>
                    <p class="lead">Featured movie</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(<?php echo $featuredMovies[1]->getBackdrop(); ?>)">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4"><?php echo $featuredMovies[1]->getName(); ?></h3>
                    <p class="lead">Featured movie</p>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url(<?php echo $featuredMovies[2]->getBackdrop(); ?>)">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4"><?php echo $featuredMovies[2]->getName(); ?></h3>
                    <p class="lead">Featured movie</p>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <h1 class="font-weight-light text-center">Welcome to Lumiere cinemas</h1>
        <form action="<?php echo FRONT_ROOT ?>views/movieList" method="POST">
            <div class="row">
                <div class="col-6">
                    <select class="form-control" id="genre" name="genre">
                        <?php 
                            echo "<option value='All'>All genres</option>";
                            foreach($genres as $genre){
                                echo "<option value='".$genre['name']."'>".$genre['name']."</option>";
                            }                    
                        ?>
                    </select>
                </div>
                <div class="col-2">
                    <button type="submit" class="btn btn-success px-10">Find Movies</button>
                </div>
            </div>
        </form>
    </div>
</section>