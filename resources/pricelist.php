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
        <h2>Cjenici</h2>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <?php require_once dirname( __DIR__ ) . '/resources/header.php';?>

        <h3>Popis svih cijena</h3>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <div>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Kategorija</th>
                <th>Cijena</th>
                <th>Pregled</th>
                <th>Uređivanje</th>
                <th>Brisanje</th>
            </tr>

            <?php if (!empty($data['controller']->all_pricelist())) : ?>
                <?php foreach ($data['controller']->all_pricelist() as $price) : ?>
                    <tr>
                        <td><?php echo $price['sifra_cjenika']; ?></td>
                        <td><?php echo $price['kategorija']; ?></td>
                        <td><?php echo $price['cijena']; ?></td>
                        <td>
                            <a href="<?php echo HOME_URL . '/pricelist/show/' . $price['sifra_cjenika']; ?>"> Show</a>
                        </td>
                        <td>
                            <a href="<?php echo HOME_URL . '/pricelist/edit/' . $price['sifra_cjenika']; ?>"> Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo HOME_URL . '/pricelist/delete/' . $price['sifra_cjenika']; ?>"> Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
        </div>

        <br>
        <h3>Unos nove cijene</h3>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <div>
        <form role="form" action="<?php echo HOME_URL . '/pricelist/new'; ?>" method="post">
            <div class="form-group row">
                <label for="pricecode" class="col-sm-2 col-form-label">Šifra cjenika</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pricecode" name="pricecode" placeholder="Unesi šifru cjenika" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label">Kategorija</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Unesi kategoriju" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Cijena</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Unesi cijenu" required>
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
</body>

</html>