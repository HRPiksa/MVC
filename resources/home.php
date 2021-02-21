<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Početna stranica</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css' ?>">
</head>

<body>
    <div class="container-fluid">
        <h2>Naša mala stranica</h2>
        <hr>

        <!--
    <ul>
        <li>
            <a href="<?php echo HOME_URL . '/about'; ?>">O nama</a>
        </li>
    </ul>
    -->

        <?php require_once dirname( __DIR__ ) . '/resources/header.php';?>

        <header class="py-5 text-center">
            <h1 class="display-4">VIDEOTEKA</h1>
            <p class="lead mb-0">Najbolja videoteka u gradu. </p>
        </header>

        <p>
            <?php echo $data['controller']->say_welcome() ?>
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