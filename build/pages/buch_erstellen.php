<?php
include "../../db.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buch Erstellen</title>
</head>
<body>
<?php
if (isset($_POST["submit"])) {
    $isbn = $_POST['isbn'];
    $titel = $_POST['titel'];
    $kategorie = $_POST['kategorie'];
    $verlag = $_POST['verlag'];
    $beschreibung = $_POST['beschreibung'];
    $preis = $_POST['preis'];
    $author = $_POST['author'];

    $sql_check = "SELECT COUNT(*) AS count FROM buecher WHERE isbn = '$isbn'";
    $result_check = $conn->query($sql_check);
    if ($result_check->fetch_assoc()['count'] > 0) {
        echo "ISBN bereits vorhanden";
        $_SESSION['isbn'] = $isbn; // korrigierter Session-Name
        $_SESSION['titel'] = $titel; // korrigierter Session-Name
        $_SESSION['kategorie'] = $kategorie;
        $_SESSION['verlag'] = $verlag;
        $_SESSION['beschreibung'] = $beschreibung;
        $_SESSION['author'] = $author;
        header("Location: buch_erstellen_form.php?create=error_isbn");
    }else {
        $sql = "INSERT INTO buecher (isbn, titel, beschreibung, verlag, anschaffungspreis, kategorie, author) VALUES ('$isbn', '$titel', '$beschreibung', '$verlag', '$preis', '$kategorie', '$author')";
        if ($conn->query($sql)) {
            unset($_SESSION['isbn'], $_SESSION['titel'], $_SESSION['kategorie'], $_SESSION['verlag'], $_SESSION['beschreibung']);
            header("Location: bibliothekar.php?create=success");
            exit();
        } else {
            header("Location: buch_erstellen_form.php?create=error");
            exit();
        }      
    }
} else{
    header("Location: buch_erstellen_form.php");
    exit();
}

?>
</body>
</html>