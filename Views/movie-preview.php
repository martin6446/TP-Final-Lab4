<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>

<!--esto sirve para sacar el poster -->

<div class="container ml-0">
    <div class="row ">
        <div class="col col-4">
            <img src="<?php echo $movie->getMoviePoster()?>" class="figure-img img-fluid rounded" alt="...">
        </div>
        <div class="col col-6  px-5">
            <h1>Title: <?php echo $movie->getName() ?></h1>
            <div class="row">
                <h4>Movie Duration: <?php echo $movie->getDuration() ?> min</h4>
            </div>
            <div class="row">
                <h4>Raiting: <?php echo $movie->getRating() ?> points</h4>
            </div>
            <div class="row">
                <h3>Overview</h3>
                <p><?php echo $movie->getOverview() ?></p>
            </div>
            <div class="row">
                <h3>Trailer</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $movie->getTrailer() ?>" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>
</div>


<!--esto sirve para sacar el trailer -->
<!-- -->

<!-- hay que cambiar la clase movie y tambien la BDD para conseguir el overview para esta pagina -->