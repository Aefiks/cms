<?php
require_once("class/User.class.php");
session_start();
$u = $_SESSION['user'];

if(isset($_REQUEST['oldPassword']) && isset($_REQUEST['newPassword']) && isset($_REQUEST['newPasswordRepeat'])) {
    $oldPassword = $_REQUEST['oldPassword'];
    $newPassword = $_REQUEST['newPassword'];
    $newPasswordRepeat = $_REQUEST['newPasswordRepeat'];
    if($newPassword == $newPasswordRepeat) {
        //nowe hasła zgodne
        $success = $u->ChangePassword($oldPassword, $newPassword);
        if($success)
            $result = "Hasło zostało zmienione!";
        else 
            $result = "Nie udało się zmienić hasła!"; //praktycznie nie ma szans, żeby to wystąpiło
    }
    else {
        //nowe hasła niezgodne
        $result = "Hasła nie są zgodne. Hasło nie zostało zmienione!";
    }
}
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
                <form action="profile.php" method="post">
                    <label class="form-label mt-3" for="emailInput">Adres e-mail:</label>
                    <input class="form-control mb-1" type="email" id="emailInput" name="email" 
                        value="<?php echo $u->getEmail(); ?>" readonly disabled>
                    
                    <label class="form-label mt-3" for="oldPasswordInput">Stare hasło:</label>
                    <input class="form-control mb-1" type="password" id="oldPasswordInput" name="oldPassword" required>
                    
                    <label class="form-label mt-3" for="newPasswordInput">Nowe hasło:</label>
                    <input class="form-control mb-1" type="password" id="newPasswordInput" name="newPassword" required>

                    <label class="form-label mt-3" for="newPasswordInputRepeat">Powtórz nowe hasło:</label>
                    <input class="form-control mb-1" type="password" id="newPasswordInputRepeat" name="newPasswordRepeat" required>
                    
                    <button type="submit" class="btn btn-primary w-100 mt-3" name="submit">Zmień hasło</button>
                    <?php
                    if(isset($result)) {
                        echo $result;
                    }
                    ?>
                </form>
                <a href="logout.php">
                    <button class="btn btn-danger mt-5 w-100">Wyloguj się</button>
                </a>
            </div>
        </div>
    </div>



</body>

</html>