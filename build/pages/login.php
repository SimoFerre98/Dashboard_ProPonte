<?php
include "../../db.php";

if(isset($_POST['mail']) && isset($_POST['password'])){
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);


    $sql = "SELECT * FROM users WHERE email = '$mail'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $gespeichertes_passwort_hash = $row['password'];
    password_verify($password, $gespeichertes_passwort_hash);


    if (password_verify($password, $gespeichertes_passwort_hash)) {
        $_SESSION['mail'] = $row['email'];
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        header("Location: dashboard.php");
    }else{
        header("Location: sing-in.php?error=1");
    }

}
?>