<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>

    <?php
    if (isset($_GET["czas"])) {
        $czas = $_GET["czas"];
        setcookie("czas", $czas, time() + (86400 * 30), "/");
        echo "Dodano zmienną cookie";
    }
    ?><br>

    <a href="index.php">Wstecz</a>
</body>

</html>