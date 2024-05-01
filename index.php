<?php
require_once("class/User.class.php");
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Nagłowek strony</h1>
    </header>
    <div id="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between px-3">
            <a class="navbar-brand">Nawigacja</a>
            <?php if(User::isLogged()) : ?>
                <a href="profile.php">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-user"></i> Profil
                    </button>
                </a>
            <?php else: ?>
                <a href="login.php">
                    <button class="btn btn-primary">
                        <i class="fa-solid fa-user"></i> Zaloguj się
                    </button>
                </a>
            <?php endif; ?>  
        </nav>
        <?php
        $db = new mysqli('localhost', 'root', '', 'cms');
        $q = $db->prepare("SELECT post.id, post.imgUrl, post.title, 
                                    post.timestamp, user.email 
                            FROM `post` 
                            INNER JOIN user ON post.author = user.ID
                            ORDER BY post.timestamp DESC;");
        $q->execute();
        $result = $q->get_result();
        while($row = $result->fetch_assoc()) {
            echo '<div class="post-block">';
            echo '<h2 class="post-title">'.$row['title'].'</h3>';
            echo '<h3 class="post-author">'.$row['email'].'</h6>';
            echo '<img src="'.$row['imgUrl'].'" alt="obrazek posta" class="post-image">';
            echo '<p class="post-description">TODO: Opis posta</p>';
            echo '<div class="post-footer">
                <span class="post-meta">'.$row['timestamp'].'</span>
                <span class="post-score">TODO: punkty</span>
                </div>';
            echo '</div>';
        }
        ?>

<div class="post-block">
            <h2 class="post-title">Tytuł posta</h3>
            <h3 class="post-author">Autor posta</h6>
            <img src="https://picsum.photos/800/600" alt="obrazek posta" class="post-image">
            <p class="post-description">Opis posta</p>
            <div class="post-footer">
                <span class="post-meta">Data i czas</span>
                <span class="post-score">+ i -</span>
            </div>
            
        </div>
    </div>
    <script src="https://kit.fontawesome.com/4f765d06bb.js" crossorigin="anonymous"></script>
</body>
</html>