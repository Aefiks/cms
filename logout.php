<?php
require_once("class/User.class.php");
session_start();
$_SESSION['user']->Logout();
?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil użytkownika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="container">
        <div class="row mt-5">
            <div class="col-6 offset-3">
                <h1 class="text-center">
                   Wylogowano pomyślnie
                </h1>
                <div class="text-center">
                    <a href="index.php">Powrót do strony</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>