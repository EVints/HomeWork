<?php
include_once "../pages/auth.php";

if ($_SERVER["REQUEST_URI"] == "/logout") {
    include_once "../pages/logout.php";

?>
    <script type="text/javascript">
        location = "/";
    </script>
<?php
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootstrap5.ru/css/docs.css">
</head>

<body>



    <?php
    include_once('../blocks/header.php');
    ?>


    <?php

    switch ($_SERVER["REQUEST_URI"]) {

        case "/":
            include_once("../pages/home.php");
            break;

        case "/movies":
            if ($_COOKIE) {
                include_once("../pages/movies_search.html");
            } else {
    ?>
                <script type="text/javascript">
                    location = "/";
                </script>
            <?php
            }
            break;


        case "/weather":
            if ($_COOKIE) {
                include_once("../pages/weather.html");
            } else {
            ?>
                <script type="text/javascript">
                    location = "/";
                </script>
            <?php
            }
            break;


        case "/login":
            if (!$_COOKIE) {
                include_once("../pages/login.php");
            } else {
            ?>
                <script type="text/javascript">
                    location = "/";
                </script>
            <?php
            }
            break;


        case "/registration":
            if (!$_COOKIE) {
                include_once("../pages/registration.php");
            } else {
            ?>
                <script type="text/javascript">
                    location = "/";
                </script>
    <?php
            }
            break;

        case "/reg_success":
            include_once("../pages/reg_successfull.php");
            break;

        default:
            include_once("../pages/404.html");
            break;
    }
    ?>




    <?php
    include_once('../blocks/footer.php');
    ?>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
</body>

</html>