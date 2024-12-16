<?php
include "../../db.php";

if (isset($_POST['book_id']) && $_SESSION['name']){
    $id = $_POST['book_id'];
    $name = $_POST['name'];
    $bibliothekar_id = $_SESSION['id'];
    $start_time = date('Y-m-d');
    $end_time = date('Y-m-d', strtotime('+14 days'));
    $sql = "INSERT INTO lendings (buch_id, user_id, `name`, `start`, `end`) VALUES ($id, $bibliothekar_id, '$name', '$start_time', '$end_time')";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script>window.location.href = 'bibliothek.php?lent=success'</script>";
    } else {
        echo "<script>window.location.href = 'bibliothek.php?lent=error'</script>";
    }
}

?>