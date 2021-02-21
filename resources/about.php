<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>O nama</title>

    <!-- Latest compiled Css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/bootstrap.min.css'?>">

    <!-- About css -->
    <link rel="stylesheet" href="<?php echo HOME_URL . '/public/css/about.css?version=1'?>">
</head>

<body>
    <div class="container-fluid">
 
    <?php require_once dirname( __DIR__ ) . '/resources/header.php';?>

    <div class="about-section">
            <h1>O nama</h1>
            <p>Neki podaci o tome tko smo i što radimo.</p>
            <p>Pretražite stranicu kako bi saznali podatke koji Vas zanimaju.</p>
        </div>

        <h2 style="text-align:center">Naš tim</h2>
        <div class="row">
            <div class="column">
                <div class="card">
                    <img src="<?php echo HOME_URL . '/images/team1.jpg'?>" alt="1" style="width:100%" />
                    <div class="container-fluid">
                        <h2>Željko Frketić</h2>
                        <p class="title">Direktor</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>piksa@mail.com</p>
                        <p><button class="button" style="border-radius: 5px;">Kontakt</button></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="<?php echo HOME_URL . '/images/team2.jpg'?>" alt="2" style="width:100%">
                    <div class="container-fluid">
                        <h2>Alen Svilić</h2>
                        <p class="title">Voditelj</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>fume@example.com</p>
                        <p><button class="button" style="border-radius: 5px;">Kontakt</button></p>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card">
                    <img src="<?php echo HOME_URL . '/images/team3.jpg'?>" alt="3" style="width:100%">
                    <div class="container-fluid">
                        <h2>Danijel Jurica</h2>
                        <p class="title">Designer</p>
                        <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                        <p>jura@example.com</p>
                        <p><button class="button" style="border-radius: 5px;">Kontakt</button></p>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <a href="<?php echo HOME_URL; ?>">Povratak</a>
    </div>

    <!-- jQuery library -->
    <script src="<?php echo HOME_URL . '/public/js/jquery.min.js'?>"></script>

    <!-- Popper JS -->
    <script src="<?php echo HOME_URL . '/public/js/popper.min.js'?>"></script>

    <!-- Latest compiled JavaScript -->
    <script src="<?php echo HOME_URL . '/public/js/bootstrap.min.js'?>"></script>
</body>

</html>