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

    
    $sql2 = "SELECT * FROM statisic WHERE buch_id = $id";
    $result2 = $conn->query($sql2);
    if ($result2->num_rows == 0) {
        $sql3 = "INSERT INTO statisic (buch_id, anzahl) VALUES ($id, 1)";
        $result3 = $conn->query($sql3);
    } else {
        $sql3 = "UPDATE statisic SET anzahl = anzahl + 1 WHERE buch_id = $id";
        $result3 = $conn->query($sql3);
    }
    include "./webhook.php";

    
    if ($result) {
        echo "<script>window.location.href = 'bibliothek.php?lent=success'</script>";
    } else {
        echo "<script>window.location.href = 'bibliothek.php?lent=error'</script>";
    }
}

?>