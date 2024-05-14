<?php

require_once __DIR__ . '/classes/Database.php';

$db = new Database();
$conn = $db->connect();

if ($conn) {
    echo "Connessione stabilita con successo!";
} else {
    echo "Impossibile stabilire la connessione.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="includes/signup.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="password" placeholder="Password">
    <input type="text" name="pwrepeat" placeholder="Repeat your password">
    <input type="text" name="email" placeholder="E-mail">
    <button type="submit" name="submit">SIGN UP</button>
</form>

<form action="includes/login.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="text" name="password" placeholder="Password">
    <button type="submit" name="submit">SIGN UP</button>
</form>


    
</body>
</html>
