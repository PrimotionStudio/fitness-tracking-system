<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);
    $confirm_password = $_POST["confirm_password"];
    if ($_POST["password"] !== '' && $confirm_password !== '') {
        // then just update user info and password
        if ($_POST['password'] === $confirm_password) {
        }
    } else {
        // then just update user info 
    }

    exit;
}
