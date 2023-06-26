<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digi phone Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="<?= BASE_URL ?>/public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?= BASE_URL ?>/public/css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?= BASE_URL ?>/public/css/carousel.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?= BASE_URL ?>/public/css/comments.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?= BASE_URL ?>/public/css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= BASE_URL ?>/public/css/owl.carousel.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/css/owl.theme.default.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script src="<?= BASE_URL ?>/public/js/jquerymain.js"></script>
    <script src="<?= BASE_URL ?>/public/js/script.js" type="text/javascript"></script>
    <script src="<?= BASE_URL ?>/public/js/carousel.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
    </script>
</head>

<body>
    <?php require_once "./app/views/pages/" . $data["Header"] . ".php" ?>
    <?php
    if (isset($data["Slider"])) {
        require_once "./app/views/pages/" . $data["Slider"] . ".php";
    }
    ?>
    <?php require_once "./app/views/pages/" . $data["Page"] . ".php" ?>
    <?php require_once "./app/views/pages/" . $data["Footer"] . ".php" ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="<?= BASE_URL ?>/public/js/owl.carousel.js"></script>

</body>

</html>