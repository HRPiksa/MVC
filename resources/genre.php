<?php
    $get_genre = $data['controller']->one_genre( $data['param'] );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Žanr</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h3><?php echo strtolower( $data['method'] ) == 'delete_genre' ? 'Brisanje žanra' : ( strtolower( $data['method'] ) == 'edit_genre' ? 'Uređivanje žanra' : 'Pregled žanra' ) ?></h3>
        <hr>

        <p>
        <form role="form" action="<?php echo HOME_URL . '/movies/' . strtolower( $data['method'] ) . '/' . $data['param']; ?>" method="post">
            <input type="hidden" name="action" value="genre">
            <div class="form-group row">
                <label for="genrecode" class="col-sm-2 col-form-label">Šifra žanra</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="genrecode" name="genrecode" value="<?php echo $get_genre['sifra_zanra'] ?> " readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Naziv</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $get_genre['naziv'] ?> "<?php echo strtolower( $data['method'] ) == 'edit_genre' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2">
                    <input type="submit" value="<?php echo strtolower( $data['method'] ) == 'delete_genre' ? 'Obriši' : ( strtolower( $data['method'] ) == 'edit_genre' ? 'Uredi' : 'Povratak' ) ?>" name="submit" class="btn btn-primary" />
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