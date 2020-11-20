<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>

<!-- <div style="background-image: url(<?php echo $movie->getBackdrop() ?>); height: 100%; width: 100%; position: fixed; background-repeat: no-repeat"></div> -->



<div class="container ">
    <div class="row align-items-end">
        <div class="col col-4">
            <img src="<?php echo $movie->getMoviePoster() ?>" class="figure-img img-fluid rounded" alt="...">
        </div>
        <div class="col col-7  px-5 py-2">
            <h1>Title: <?php echo $movie->getName() ?></h1>
            <div class="row">
                <h4>Movie Duration: <?php echo $movie->getDuration() ?> min</h4>
            </div>
            <div class="row">
                <h4>Rating: <?php echo $movie->getRating() ?> points</h4>
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
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Cinema Name</th>
                    <th scope="col">Cinema Room Name</th>
                    <th scope="col">Start Time</th>
                    <th scope="col">End Time</th>
                    <th scope="col">Buy Ticket</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="<?php echo FRONT_ROOT?>views/purchaseView" method="POST">
                        <?php
                        foreach ($functions as $function) {

                            echo "<tr>";
                            echo "<td>" . $function->getCinemaRoom()->getCinema()->getName() . "</td>";
                            echo "<td>" . $function->getCinemaRoom()->getName() . "</td>";
                            echo "<td>" . $function->getSimpleStartTime() . "</td>";
                            echo "<td>" . $function->getSimpleEndTime() . "</td>";
                            echo "<td><button type='submit' name='functionId' value=" . $function->getId() . " class='btn btn-primary'>Buy Ticket</button></td>";
                        }

                        echo "</tr>";

                        ?>
                    </form>
                <tr>
            </tbody>
        </table>
    </div>
</div>




<!--esto sirve para sacar el trailer -->
<!-- -->

<!-- hay que cambiar la clase movie y tambien la BDD para conseguir el overview para esta pagina -->