<?php
    $get_member = $data['controller']->one_member( $data['param'] );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Član</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css'?>">
</head>

<body>
    <div class="container-fluid">
        <h3><?php echo strtolower( $data['method'] ) == 'delete' ? 'Brisanje člana' : ( strtolower( $data['method'] ) == 'edit' ? 'Uređivanje člana' : 'Pregled člana' ) ?></h3>
        <hr>

        <p>
        <form role="form" action="<?php echo HOME_URL . '/members/' . strtolower( $data['method'] ) . '/' . $data['param']; ?>" method="post">
            <div class="form-group row">
                <label for="membership" class="col-sm-2 col-form-label">Članski broj</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="membership" name="membership" value="<?php echo $get_member['clanski_broj'] ?> " readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">Ime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $get_member['ime'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Prezime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $get_member['prezime'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="date_membership" class="col-sm-2 col-form-label">Datum učlanjenja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="date_membership" name="date_membership" value="<?php echo date( 'Y-m-d', strtotime( $get_member['datum_uclanjenja'] ) ) ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
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
    <script src="<?php echo HOME_URL . '/public/js/jquery.min.js'?>"></script>

    <!-- Popper JS -->
    <script src="<?php echo HOME_URL . '/public/js/popper.min.js'?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js'?>"></script>
</body>

</html>