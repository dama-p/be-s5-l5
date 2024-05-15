<?php


if(isset($_POST["submit"])) {
    // Prende i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwrepeat = $_POST["pwrepeat"];
    $email = $_POST["email"];

    // Istanziare la classe SignupControls
    include '../classes/Database.php';
    include '../classes/SignupClass.php';
    include '../classes/SignupControls.php';
    $signup = new SignupControls($username, $password, $pwrepeat, $email);

    //Run dei controlli
    $signup->signupUser($username, $password, $pwrepeat, $email);

    //Ritorno all'homepage
    header('location: ../index.php?error=none');

}