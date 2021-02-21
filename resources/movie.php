<?php
    $get_movie = $data['controller']->one_movie( $data['param'] );

    $get_genres = $data['controller']->all_genres();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h3><?php echo strtolower( $data['method'] ) == 'delete_movie' ? 'Brisanje filma' : ( strtolower( $data['method'] ) == 'edit_movie' ? 'Uređivanje filma' : 'Pregled filma' ) ?></h3>
        <hr>

        <p>
        <form role="form" action="<?php echo HOME_URL . '/movies/' . strtolower( $data['method'] ) . '/' . $data['param']; ?>" method="post">
            <input type="hidden" name="action" value="movie">
            <div class="form-group row">
                <label for="moviecode" class="col-sm-2 col-form-label">Šifra filma</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="moviecode" name="moviecode" value="<?php echo $get_movie['sifra_filma'] ?> " readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Naziv</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $get_movie['naziv'] ?> "<?php echo strtolower( $data['method'] ) == 'edit_movie' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="year" class="col-sm-2 col-form-label">Godina izdanja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="year" name="year" value="<?php echo $get_movie['godina_izdanja'] ?> "<?php echo strtolower( $data['method'] ) == 'edit_movie' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Žanr</label>
                <div class="col-sm-10">
                    <?php if ( strtolower( $data['method'] ) == 'edit_movie' ): ?>
                        <!-- <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $get_movie['sifra_zanra'] ?> "<?php echo strtolower( $data['method'] ) == 'edit_movie' ? '' : 'readonly' ?>> -->

                        <select name="genre" id="genre" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_genres as $genre ): ?>
                                <option value="<?php echo $genre['sifra_zanra'] ?>" <?php echo $genre['sifra_zanra'] == $get_movie['sifra_zanra'] ? 'selected' : ''?>>
                                    <?php echo $genre['naziv'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <?php else: ?>
                        <input type="text" class="form-control" id="genre" name="genre" value="<?php echo $get_movie['naziv_zanra'] ?> "<?php echo strtolower( $data['method'] ) == 'edit_movie' ? '' : 'readonly' ?>>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2">
                    <input type="submit" value="<?php echo strtolower( $data['method'] ) == 'delete_movie' ? 'Obriši' : ( strtolower( $data['method'] ) == 'edit_movie' ? 'Uredi' : 'Povratak' ) ?>" name="submit" class="btn btn-primary" />
                </div>
            </div>
        </form>
        </p>

    </div>

    <!-- jQuery library -->
    <script src="<?php echo HOME_URL . '/public/js/jquery.min.js' ?>"></script>

    <!-- Popper JS -->
    <script src="<?php echo HOME_URL . '/public/js/popper.min.js' ?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js' ?>"></script>
</body>

</html>