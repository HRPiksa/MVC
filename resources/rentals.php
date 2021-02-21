<?php
    $get_members = $data['controller']->all_members();

    $get_movies = $data['controller']->all_movies();

    $get_prices = $data['controller']->all_pricelist();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posudbe</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">

    <!-- App css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/style.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h2>Posudbe filmova</h2>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <?php require_once dirname( __DIR__ ) . '/resources/header.php';?>

        <h3>Popis svih posudbi</h3>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <div>
            <table class="table table-striped table-bordered table-hover">
                <tr>
                    <th>#</th>
                    <th>Ime člana</th>
                    <th>Naziv filma</th>
                    <th>Cjenik</th>
                    <th>Datum posudbe</th>
                    <th>Datum vraćanja</th>
                    <th>Pregled</th>
                    <th>Uređivanje</th>
                    <th>Brisanje</th>
                </tr>

                <?php if ( !empty( $data['controller']->all_rentals() ) ): ?>
                    <?php foreach ( $data['controller']->all_rentals() as $rental ): ?>
                        <tr>
                            <td><?php echo $rental['sifra_posudbe']; ?></td>
                            <td><?php echo $rental['naziv_clana']; ?></td>
                            <td><?php echo $rental['naziv_filma']; ?></td>
                            <td><?php echo $rental['kategorija_cijene']; ?></td>
                            <td><?php echo date( 'd.m.y', strtotime( $rental['datum_posudbe'] ) ); ?></td>
                            <td><?php echo is_null( $rental['datum_povratka'] ) ? '' : date( 'd.m.y', strtotime( $rental['datum_povratka'] ) ); ?></td>
                            <td>
                                <a href="<?php echo HOME_URL . '/rentals/show/' . $rental['sifra_posudbe']; ?>"> Show</a>
                            </td>
                            <td>
                                <a href="<?php echo HOME_URL . '/rentals/edit/' . $rental['sifra_posudbe']; ?>"> Edit</a>
                            </td>
                            <td>
                                <a href="<?php echo HOME_URL . '/rentals/delete/' . $rental['sifra_posudbe']; ?>"> Delete</a>
                            </td>
                        </tr>
                    <?php endforeach?>
                <?php endif?>
            </table>
        </div>

        <br>
        <h3>Unos nove posudbe</h3>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <div>
            <form role="form" action="<?php echo HOME_URL . '/rentals/new'; ?>" method="post">
                <div class="form-group row">
                    <label for="membership" class="col-sm-2 col-form-label">Član</label>
                    <div class="col-sm-10">
                        <select name="membership" id="membership" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_members as $member ): ?>
                                <option value="<?php echo $member['clanski_broj'] ?>">
                                    <?php echo $member['ime'] . ' ' . $member['prezime'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="moviecode" class="col-sm-2 col-form-label">Film</label>
                    <div class="col-sm-10">
                        <select name="moviecode" id="moviecode" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_movies as $movie ): ?>
                                <option value="<?php echo $movie['sifra_filma'] ?>">
                                    <?php echo $movie['naziv'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pricecode" class="col-sm-2 col-form-label">Cjenik</label>
                    <div class="col-sm-10">
                        <select name="pricecode" id="pricecode" class="form-control">
                            <option value="">---</option>
                            <?php foreach ( $get_prices as $price ): ?>
                                <option value="<?php echo $price['sifra_cjenika'] ?>">
                                    <?php echo $price['kategorija'] ?>
                                </option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="date_rental" class="col-sm-2 col-form-label">Datum posudbe</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="date_rental" name="date_rental" placeholder="Datum posudbe" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10 col-sm-offset-2">
                        <input type="submit" value="Spremi" name="submit" class="btn btn-primary" />
                    </div>
                </div>
            </form>
        </div>

    </div>

    <!-- jQuery library -->
    <script src="<?php echo HOME_URL . '/public/js/jquery.min.js' ?>"></script>

    <!-- Popper JS -->
    <script src="<?php echo HOME_URL . '/public/js/popper.min.js' ?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js' ?>"></script>
</body>

</html>