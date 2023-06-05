<?php session_start();
require "funkcje.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>

<body>
    <?php
    if ($_SESSION["zalogowany"] != 1) {
        header("Location: index.php");
    }

    if (isset($_POST["upload"])) {
        $currentDir = getcwd();
        $uploadDir = "/zdjeciaUzytkownikow/";
        $fileName = $_FILES['myfile']['name'];
        $fileSize = $_FILES['myfile']['size'];
        $fileTmpName = $_FILES['myfile']['tmp_name'];
        $fileType = $_FILES['myfile']['type'];
        if (
            $fileName != "" and
            ($fileType == 'image/png' or $fileType == 'image/jpeg'
                or $fileType == 'image/JPEG' or $fileType == 'image/PNG'
            )
        ) {
            $uploadPath = $currentDir . $uploadDir . $fileName;
            if (move_uploaded_file($fileTmpName, $uploadPath))
                echo "Zdjęcie zostalo zaladowane na serwer FTP <br>";
            echo "<img src=" . $_FILES['myfile']['name'] . " alt='Miejsce na zdjecie' width='200' height='200'>";
        } else {
            echo "Miejsce na zdjęcie";
        }
    }

    echo "Imię i Nazwisko: " . $_SESSION["zalogowanyImie"] . "<br><br>";
    ?>
    <form action="user.php" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Ustaw awatar</legend>
            <input name="myfile" type="file"><br>
            <input type="submit" value="Upload umage" name="upload">
        </fieldset>
    </form>
    <br>
    <form action="index.php" method="POST">
        <input type="submit" method="POST" value="wyloguj" name="wyloguj">
    </form>

    <a href="index.php"> Strona logowania </a><br>
</body>

</html>