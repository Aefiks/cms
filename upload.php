<?php
require_once('class/Post.class.php');
require_once('class/User.class.php');
session_start();
if(!empty($_POST) && isset($_SESSION['user'])) {
    Post::CreatePost($_POST['postTitle'], $_POST['postDescription']);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowy post</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="postTitleInput">Tytuł posta:</label>
        <input type="text" name="postTitle" id="postTitleInput">
        <br>
        <label for="postDescriptionInput">Opis posta:</label>
        <input type="text" name="postDescription" id="postDescriptionInput">
        <br>
        <label for="fileInput">Obrazek:</label>
        <input type="file" name="file" id="fileInput">
        <br>
        <input type="submit" value="Wyślij!">
    </form>
</body>
</html>