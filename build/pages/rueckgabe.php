<?php
include "../../db.php";

if (isset($_GET['buch_id']) && $_SESSION['name']){
    $id = $_GET['buch_id'];
    $sql = "DELETE FROM lendings WHERE buch_id = $id";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script>window.location.href = 'bibliothek.php?returned=success'</script>";
    } else {
        echo "<script>window.location.href = 'bibliothekar.php?returned=error'</script>";
    }

}

