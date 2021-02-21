<?php
    $get_genres = $data['controller']->all_genres();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cjenici</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">

    <!-- App css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/style.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h2>Filmovi i žanrovi</h2>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <?php require_once dirname( __DIR__ ) . '/resources/header.php';?>

        <div class="row">
            <div class="table-responsive col-md-7">

                <h3>Popis svih filmova</h3>

                <div class="row">
                    <div class="mb-4">
                        <hr class="solid">
                    </div>
                </div>

                <table id="table_1" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Godina izdanja</th>
                        <th>Žanr</th>
                        <th>Pregled</th>
                        <th>Uređivanje</th>
                        <th>Brisanje</th>
                    </tr>

                    <?php if ( !empty( $data['controller']->all_movies() ) ): ?>
                        <?php foreach ( $data['controller']->all_movies() as $movie ): ?>
                            <tr>
                                <td><?php echo $movie['sifra_filma']; ?></td>
                                <td><?php echo $movie['naziv']; ?></td>
                                <td><?php echo $movie['godina_izdanja']; ?></td>
                                <td><?php echo $movie['naziv_zanra']; ?></td>
                                <td>
                                    <a href="<?php echo HOME_URL . '/movies/show_movie/' . $movie['sifra_filma']; ?>"> Show</a>
                                </td>
                                <td>
                                    <a href="<?php echo HOME_URL . '/movies/edit_movie/' . $movie['sifra_filma']; ?>"> Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo HOME_URL . '/movies/delete_movie/' . $movie['sifra_filma']; ?>"> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    <?php endif?>
                </table>
            </div>

            <div class="table-responsive col-md-5">

                <h3>Popis svih žanrova</h3>

                <div class="row">
                    <div class="mb-4">
                        <hr class="solid">
                    </div>
                </div>

                <table id="table_2" class="table table-striped table-bordered table-hover">
                    <tr>
                        <th>#</th>
                        <th>Naziv</th>
                        <th>Pregled</th>
                        <th>Uređivanje</th>
                        <th>Brisanje</th>
                    </tr>

                    <?php if ( !empty( $data['controller']->all_genres() ) ): ?>
                        <?php foreach ( $data['controller']->all_genres() as $genre ): ?>
                            <tr>
                                <td><?php echo $genre['sifra_zanra']; ?></td>
                                <td><?php echo $genre['naziv']; ?></td>
                                <td>
                                    <a href="<?php echo HOME_URL . '/movies/show_genre/' . $genre['sifra_zanra']; ?>"> Show</a>
                                </td>
                                <td>
                                    <a href="<?php echo HOME_URL . '/movies/edit_genre/' . $genre['sifra_zanra']; ?>"> Edit</a>
                                </td>
                                <td>
                                    <a href="<?php echo HOME_URL . '/movies/delete_genre/' . $genre['sifra_zanra']; ?>"> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach?>
                    <?php endif?>
                </table>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="table-responsive col-md-7">
                <h3>Unos novog filma</h3>

                <div class="row">
                    <div class="mb-4">
                        <hr class="solid">
                    </div>
                </div>

                <div>
                    <form id="form_1" role="form" action="<?php echo HOME_URL . '/movies/new_movie'; ?>" method="post">
                        <input type="hidden" name="action" value="movie">
                        <div class="form-group row">
                            <label for="moviecode" class="col-sm-2 col-form-label">Šifra filma</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="moviecode" name="moviecode" placeholder="Unesi šifru filma" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Naziv</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Unesi naziv" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label">Godina izdanja</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="year" name="year" placeholder="Unesi godinu izdanja" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="genre" class="col-sm-2 col-form-label">Žanr</label>
                            <div class="col-sm-10">
                                <!-- <input type="text" class="form-control" id="genre" name="genre" placeholder="Žanr" required> -->

                                <select name="genre" id="genre" class="form-control">
                                    <option value="">---</option>
                                    <?php foreach ( $get_genres as $genre ): ?>
                                        <option value="<?php echo $genre['sifra_zanra'] ?>" >
                                            <?php echo $genre['naziv'] ?>
                                        </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="submit" value="Spremi" name="submit_1" form="form_1" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="table-responsive col-md-5">
                <h3>Unos novog žanra</h3>

                <div class="row">
                    <div class="mb-4">
                        <hr class="solid">
                    </div>
                </div>

                <div>
                    <form id="form_2" role="form" action="<?php echo HOME_URL . '/movies/new_genre'; ?>" method="post">
                        <input type="hidden" name="action" value="genre">
                        <div class="form-group row">
                            <label for="genrecode" class="col-sm-2 col-form-label">Šifra žanra</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="genrecode" name="genrecode" placeholder="Unesi šifru žanra" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Naziv</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Unesi naziv" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input type="submit" value="Spremi" name="submit_2" form="form_2" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library -->
    <script src="<?php echo HOME_URL . '/public/js/jquery.min.js'?>"></script>

    <!-- Popper JS -->
    <script src="<?php echo HOME_URL . '/public/js/popper.min.js'?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js'?>"></script>
</body>

</html>