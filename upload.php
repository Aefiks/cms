<?php
if(!empty($_POST)) {
    $postTitle = $_POST['postTitle'];
    $postDescription = $_POST['postDescription'];
    $targetDirectory = "img/";
    $fileName = hash('sha256', $_FILES['file']['name'].microtime());
    $fileString = file_get_contents($_FILES['file']['tmp_name']);
    $gdImage = imagecreatefromstring($fileString);

    $finalUrl = "http://localhost/cms/img/".$fileName.".webp";

    $internalUrl = "img/".$fileName.".webp";

    imagewebp($gdImage, $internalUrl);

    $authorID = 1;


    $db = new mysqli('localhost', 'root', '', 'cms');
    $q = $db->prepare("INSERT INTO post (author, imgUrl, title) VALUES (?, ?, ?)");
    $q->bind_param("iss", $authorID, $finalUrl, $postTitle);
    $q->execute();
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
        <label for="fileInput">Obraz:</label>
        <input type="file" name="file" id="fileInput">
        <br>
        <input type="submit" value="Wyślij!">
    </form>
</body>
</html>