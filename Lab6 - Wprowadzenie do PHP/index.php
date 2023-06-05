<?php session_start();
require "funkcje.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    echo '<h1> Nasz system </h1>';
    // echo 'Przesłany login: ' . $_POST["login"] . "<br>";
    // echo 'Przeslane haslo: ' . $_POST["haslo"] . "<br>";

    if (isset($_POST["wyloguj"])) {
        $_SESSION["zalogowany"] = 0;
    }

    if (isset($_COOKIE["czas"])) {
        echo "Zapisane cookie: " . $_COOKIE["czas"];
    }
    ?>

    <form action="logowanie.php" method="POST">
        <fieldset>
            <legend>Dane użytkownika</legend>
            Login: <input type="text" name="login"><br>
            Haslo: <input type="password" name="haslo"><br>
            <input type="submit" method="POST" value="Zaloguj" name="zaloguj">
        </fieldset>
    </form>

    <form action="cookie.php" method="GET">
        <fieldset>
            <legend>Formularz Cookie</legend>
            <input type="number" name="czas">
            <input type="submit" name="utworzCookie">
        </fieldset>
    </form>

    <a href="user.php">Strona użytkownika</a>

</body>

</html>