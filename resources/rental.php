<?php
    $get_rental = $data['controller']->one_rental( $data['param'] );

    $get_members = $data['controller']->all_members();

    $get_movies = $data['controller']->all_movies();

    $get_prices = $data['controller']->all_pricelist();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posudba</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h3><?php echo strtolower( $data['method'] ) == 'delete' ? 'Brisanje posudbe' : ( strtolower( $data['method'] ) == 'edit' ? 'Uređivanje posudbe' : 'Pregled posudbe' ) ?></h3>
        <hr>

        <p>
        <form role="form" action="<?php echo HOME_URL . '/rentals/' . strtolower( $data['method'] ) . '/' . $data['param']; ?>" method="post">
            <div class="form-group row">
                <label for="rentalcode" class="col-sm-2 col-form-label">Šifra posudbe</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="rentalcode" name="rentalcode" value="<?php echo $get_rental['sifra_posudbe'] ?> " readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="membership" class="col-sm-2 col-form-label">Član</label>
                <div class="col-sm-10">
                    <?php if ( strtolower( $data['method'] ) == 'edit' ): ?>
                        <select name="membership" id="membership" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_members as $member ): ?>
                                <option value="<?php echo $member['clanski_broj'] ?>"<?php echo $member['clanski_broj'] == $get_rental['clanski_broj'] ? 'selected' : '' ?>>
                                    <?php echo $member['ime'] . ' ' . $member['prezime'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <?php else: ?>
                        <input type="text" class="form-control" id="membership" name="membership" value="<?php echo $get_rental['naziv_clana'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group row">
                <label for="moviecode" class="col-sm-2 col-form-label">Film</label>
                <div class="col-sm-10">
                    <?php if ( strtolower( $data['method'] ) == 'edit' ): ?>
                        <select name="moviecode" id="moviecode" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_movies as $movie ): ?>
                                <option value="<?php echo $movie['sifra_filma'] ?>"<?php echo $movie['sifra_filma'] == $get_rental['sifra_filma'] ? 'selected' : '' ?>>
                                    <?php echo $movie['naziv'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <?php else: ?>
                        <input type="text" class="form-control" id="moviecode" name="moviecode" value="<?php echo $get_rental['naziv_filma'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group row">
                <label for="pricecode" class="col-sm-2 col-form-label">Cjenik</label>
                <div class="col-sm-10">
                    <?php if ( strtolower( $data['method'] ) == 'edit' ): ?>
                        <select name="pricecode" id="pricecode" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_prices as $price ): ?>
                                <option value="<?php echo $price['sifra_cjenika'] ?>"<?php echo $price['sifra_cjenika'] == $get_rental['sifra_cjenika'] ? 'selected' : '' ?>>
                                    <?php echo $price['kategorija'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    <?php else: ?>
                        <input type="text" class="form-control" id="pricecode" name="pricecode" value="<?php echo $get_rental['kategorija_cijene'] ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                    <?php endif?>
                </div>
            </div>
            <div class="form-group row">
                <label for="date_rental" class="col-sm-2 col-form-label">Datum posudbe</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="date_rental" name="date_rental" value="<?php echo date( 'Y-m-d', strtotime( $get_rental['datum_posudbe'] ) ) ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <label for="date_return" class="col-sm-2 col-form-label">Datum vraćanja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="date_return" name="date_return" value="<?php echo is_null( $get_rental['datum_povratka'] ) ? '' : date( 'Y-m-d', strtotime( $get_rental['datum_povratka'] ) ) ?> "<?php echo strtolower( $data['method'] ) == 'edit' ? '' : 'readonly' ?>>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-10 col-sm-offset-2">
                    <input type="submit" value="<?php echo strtolower( $data['method'] ) == 'delete' ? 'Obriši' : ( strtolower( $data['method'] ) == 'edit' ? 'Uredi' : 'Povratak' )?>" name="submit" class="btn btn-primary" />
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
    <!-- <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js' ?>"></script> -->
</body>

</html>