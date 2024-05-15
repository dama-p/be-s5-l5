<?php


if(isset($_POST["submit"])) {
    // Prende i dati dal form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwrepeat = $_POST["pwrepeat"];
    $email = $_POST["email"];

    // Istanziare la classe SignupControls
    include __DIR__ . '/../classes/Database.php';
    include __DIR__ . '/../classes/SignupClass.php';
    include __DIR__ . '/../classes/SignupControls.php';
    $signup = new SignupControls($username, $password, $pwrepeat, $email);

    //Run dei controlli
    $signup->signupUser($username, $password, $pwrepeat, $email);

    //Ritorno all'homepage
    header('location: /');

}