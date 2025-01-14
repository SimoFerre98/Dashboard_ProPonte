<?php
include "../../db.php";

if(isset($_POST['submit'])){
    $name = $_POST['vuname'];
    $email = $_POST['email'];
    $pas = $_POST['passwort'];


    $password_hash = password_hash($pas, PASSWORD_DEFAULT);

    $insert = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$name', '$email', '$password_hash')";

    if($conn->query($insert)){
        header("location: ./user_overview.php");
    }else{
        header("location: add_user.php?create=error");
    }


}