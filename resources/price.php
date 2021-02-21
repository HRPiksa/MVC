<?php
    $get_price = $data['controller']->one_price( $data['param'] );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cjena</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h3><?php echo strtolower( $data['method'] ) == 'delete' ? 'Brisanje cijene' : ( strtolower( $data['method'] ) == 'edit' ? 'Uređivanje cijene' : 'Pregled cijene' ) ?></h3>
        <hr>

        <p>
        <form role="form" action="<?php echo HOME_URL . '/pricelist/' . strtolower( $data['method'] ) . '/' . $data['param']; ?>" method="post">
            <div class="form-group row">
                <label for="pricecode" class="col-sm-2 col-form-label">Šifra cjenika</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pricecode" name="pricecode" value="<?php echo $get_price['sifra_cjenika'] ?> " readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="kategory" class="col-sm-2 col-form-label">Kategorija</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="kategory" name="kategory" value="<?php echo $get_price['kategorija'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Cijena</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $get_price['cijena'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2">
                    <input type="submit" value="<?php echo strtolower( $data['method'] ) == 'delete' ? 'Obriši' : ( strtolower( $data['method'] ) == 'edit' ? 'Uredi' : 'Povratak' ) ?>" name="submit" class="btn btn-primary" />
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