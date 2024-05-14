<?php

include_once __DIR__ . '/../classes/SignupControls.php';

if(isset($_POST["submit"])) {
    // Prende i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwrepeat = $_POST["pwrepeat"];
    $email = $_POST["email"];

    // Istanziare la classe SignupControls
    $signup = new SignupControls($username, $password, $pwrepeat, $email);






}