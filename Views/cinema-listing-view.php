<?php require_once(VIEWS_PATH . "nav-bar.php"); ?>
<div class="container">
    <form action="<?php echo FRONT_ROOT ?>views/moviePreview" method="GET">
        <table class="table table-striped text-center">
            <thead class="thead-dark ">
                <tr>
                    <th scope="col">Movie Poster</th>
                    <th scope="col">Movie Name</th>
                    <th scope="col">Release Date</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Select</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    foreach ($movieList as $movie) { ?>

                        <th scope="col " style="width:10%;"><img src="<?php echo $movie->getMoviePoster() ?>" class='figure-img img-fluid rounded' alt='...'></th>
                        <td class="align-middle"><?php echo $movie->getName() ?></td>
                        <td class="align-middle"><?php echo $movie->getReleaseDate() ?></td>

                        <?php $strGenres = "";
                        foreach ($movie->getGenres() as $genre) {
                            $strGenres = $strGenres . ", " . $genre;
                        } ?>

                        <td class="align-middle"><?php echo substr($strGenres, 1) ?></td>
                        <td class="align-middle"><?php echo $movie->getDuration() ?> Min</td>
                        <td class="align-middle"><button type='submit' name='movieId' value="<?php echo $movie->getIdMovie() ?>" class='btn btn-secondary'>Select</button></td>
                </tr>
            <?php }
            ?>

            <tr>
            </tbody>
        </table>
    </form>
</div>