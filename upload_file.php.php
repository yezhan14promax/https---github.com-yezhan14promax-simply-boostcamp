<?php


if ($_FILES["file"]["error"] > 0) {
    echo "error：: " . $_FILES["file"]["error"] . "<br>";
} else {
    echo "name: " . $_FILES["file"]["name"] . "<br>";
    echo "type: " . $_FILES["file"]["type"] . "<br>";
    echo "size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Où les fichiers sont stockés temporairement: " . $_FILES["file"]["tmp_name"] . "<br>";

    // Détermine si le fichier existe dans le répertoire de téléchargement sous le répertoire courant
// S'il n'y a pas de répertoire de téléchargement, vous devez le créer
    if (file_exists("upload/" . $_FILES["file"]["name"])) {
        echo $_FILES["file"]["name"] . " Le fichier existe déjà. ";
    } else {
        // Si le fichier n'existe pas dans le répertoire de téléchargement, téléchargez le fichier dans le répertoire de téléchargement
        move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
        echo "Les fichiers sont stockés dans : " . "upload/" . $_FILES["file"]["name"];
    }
}

?>