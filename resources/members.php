<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Članovi</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css'?>">

    <!-- App css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/style.css'?>">
</head>

<body>
    <div class="container-fluid">
        <h2>Članovi</h2>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <?php require_once dirname(__DIR__) . '/resources/header.php'; ?>

        <h3>Popis svih članova</h3>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <div>
        <table class="table table-striped table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Ime i prezime</th>
                <th>Datum učlanjenja</th>
                <th>Pregled</th>
                <th>Uređivanje</th>
                <th>Brisanje</th>
            </tr>

            <?php if (!empty($data['controller']->all_members())) : ?>
                <?php foreach ($data['controller']->all_members() as $member) : ?>
                    <tr>
                        <td><?php echo $member['clanski_broj']; ?></td>
                        <td><?php echo $member['ime'] . ' ' . $member['prezime']; ?></td>
                        <td><?php echo date('d.m.y', strtotime($member['datum_uclanjenja'])); ?></td>
                        <td>
                            <a href="<?php echo HOME_URL . '/members/show/' . $member['clanski_broj']; ?>"> Show</a>
                        </td>
                        <td>
                            <a href="<?php echo HOME_URL . '/members/edit/' . $member['clanski_broj']; ?>"> Edit</a>
                        </td>
                        <td>
                            <a href="<?php echo HOME_URL . '/members/delete/' . $member['clanski_broj']; ?>"> Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            <?php endif ?>
        </table>
        </div>

        <br>
        <h3>Unos novog člana</h3>

        <div class="row">
            <div class="mb-4">
                <hr class="solid">
            </div>
        </div>

        <div>
        <form role="form" action="<?php echo HOME_URL . '/members/new'; ?>" method="post">
            <div class="form-group row">
                <label for="membership" class="col-sm-2 col-form-label">Članski broj</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="membership" name="membership" placeholder="Unesi članski broj" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">Ime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Unesi ime" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Prezime</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Unesi prezime" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="date_membership" class="col-sm-2 col-form-label">Datum učlanjenja</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="date_membership" name="date_membership" placeholder="Datum učlanjenja" required>
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
    <script src="<?php echo HOME_URL . '/public/js/jquery.min.js'?>"></script>

    <!-- Popper JS -->
    <script src="<?php echo HOME_URL . '/public/js/popper.min.js'?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js'?>"></script>
</body>

</html>