<!-- form06_get.php -->
<?php
session_start();
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
<?php
if (isset($_SESSION['success_message'])) {
    echo "<p style='color: green;'>{$_SESSION['success_message']}</p>";
    unset($_SESSION['success_message']);
} elseif (isset($_SESSION['error_message'])) {
    echo "<p style='color: red;'>{$_SESSION['error_message']}</p>";
    unset($_SESSION['error_message']);
}
?>

<a href="form06_post.php">Dodaj nowego pracownika</a>
<br>

<?php
$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$sql = "SELECT * FROM pracownicy";
$result = $link->query($sql);

foreach ($result as $v) {
    echo $v["ID_PRAC"] . " " . $v["NAZWISKO"] . "<br/>";
}

$result->free();
$link->close();
?>
</body>
</html>