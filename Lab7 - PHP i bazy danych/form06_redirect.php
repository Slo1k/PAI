<!-- form06_redirect.php -->
<?php
session_start();

$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
if (!$link) {
    $_SESSION['error_message'] = "Podczas połączeniem z bazą danych wystąpił błąd";
    header("Location: form06_post.php");
    exit();
}

if (isset($_POST['id_prac']) && is_numeric($_POST['id_prac']) && is_string($_POST['nazwisko'])) {
    $sql = "INSERT INTO pracownicy(id_prac, nazwisko) VALUES (?, ?)";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("is", $_POST['id_prac'], $_POST['nazwisko']);

    try {
        $result = $stmt->execute();

        if ($result) {
            $_SESSION['success_message'] = "Pracownik został dodany pomyślnie.";
            header("Location: form06_get.php");
        } else {
            $_SESSION['error_message'] = "Wystąpił błąd podczas dodawania pracownika.";
            header("Location: form06_get.php");
        }    
    } catch (Exception $e) {
        $_SESSION['error_message'] = "Wystąpił błąd podczas dodawania pracownika: " . $e->getMessage();
        header("Location: form06_get.php");
    }
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Przesłany formularz zawierał niepoprawnie wypełnione pola!";
    header("Location: form06_get.php");
}

$link->close();
?>