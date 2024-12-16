<?php
include "../../db.php";

if(isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];
    $sql = "DELETE FROM buecher WHERE isbn = '$isbn'";
    if($conn->query($sql)){
        header("Location: bibliothekar.php?delete=success");
        exit();
    }else{
        header("Location: bibliothekar.php?delete=error");  
        exit();
    }
}else{
    header("Location: bibliothekar.php");
    exit();
}
?>