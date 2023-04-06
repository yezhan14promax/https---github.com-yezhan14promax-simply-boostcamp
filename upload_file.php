<?php


if ($_FILES["file"]["error"] > 0) {
    echo "error：: " . $_FILES["file"]["error"] . "<br>";
    header("Location: cours.php");
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
        //identifier le nom de base de données
        $database = "boostcamp";
        //connectez-vous dans votre BDD 
//Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
        $db_handle = mysqli_connect('localhost:3308', 'root', '');
        $db_found = mysqli_select_db($db_handle, $database);
        $name = $_FILES["file"]["name"];
        if (isset($_GET['id_prof'])) {
            $id_prof = $_GET['id_prof'];
            $sql = "INSERT INTO fiche(id_prof,fiche_name) VALUES('$id_prof', '$name')";
            $retval = mysqli_query($db_handle, $sql);
            echo "Add to cart successfully";
        }
    }
}

?>
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;

// Azure Active Directory 应用程序的客户端 ID 和客户端密码
/*$client_id = 'acca51be-105e-43f5-bf5e-c8eabf305c29';
$client_secret = 'Ikn8Q~peWhbeH7S6VKVSPtG8cRJx1kmggrl3VaVW';

// 创建 Azure Active Directory 应用程序授权令牌
$guzzle = new \GuzzleHttp\Client();
$url = 'https://login.live.com/oauth20_token.srf
Content-Type: application/x-www-form-urlencoded
';
$body = [
    'grant_type' => 'authorization_code',
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'code' => 'M.R3_BL2.2.f559bbf4-acd6-d9dd-ffe0-8b217c43a10b',
    'redirect_uri' => 'http://localhost/test/upload_file.php',
];
$response = $guzzle->post($url, ['form_params' => $body]);*/
$token = 'EwCIA8l6BAAUAOyDv0l6PcCVu89kmzvqZmkWABkAAc5AFKYOp7Bl3Zy0yRZdZcasODyDgr7xWaQagxAjISUmhmry8uoIDI1XpiVeNc/Nj9zoKG1EDq+fq2+INDYNRZSEaHCskr3TptppBZsSbWeF9Y3PmEkMrynUHpC/7d5/1/UVdUVsD6SkVO76IJ5PiMUTghc4+2WhOTIpDySl08Kk628YPVJcsGQyLSJ5xEXXWAS5WUDmOrrLIZhpZ9S7ShiAXOJO8M+CIl74tap3Upa18H4eq3v8+2bcEnV8NKy695j6l0FtVI8NZkUx/Kr5ryuYo/avU1iC2x9gw+UuQfNMwu4lIWFMTD0G3MunD+JYrT9V0L0KZ3mIyZtU1Kqgls0DZgAACJstpHPugkqcWAK21SpkVXOcUlsHxuHCa1pq4wDbdAzK+xA+OyRnUvlaOZZEABgGPruq/yj174ca16CR7kZATBah7jmd0bShpw624AGvYetgqEBLSDmrXpWY84ObVRUdNxx3j60ZvjapvFXVdlLti1sCGYf2cahCqTbszv2kQtu6xfajj/JQ0mr9lezEVAW/6cip53/F/zFoN/pfuwAASij8p7qFgh12Rjqcsh2UVPZwdIDc2yZg3b6lv7LM4dTgLzgqE9eXzbnBZDRLiKNzY6qr+RIqymSfOSMdRCbdlvk+sIGhKVBntILNHn9i/hgj14Szb9VlwuTP3UqUEiRzfJL+Kwnldm+UmXaYM8Ga31heQ6H4YOyre75Gzuyx95DHJNPa4t8cQxRH7+plZ0naaFO1JjZoH8FLAtb0IiaakTuk6SsA+kK69k+PZjkNpbwgczm8dNRSjTEgmpM7AO7ZLXqpYFqDl8Zobvj1z9POQu3WQm9fLd1CmcV3crtpEL+wEsAgS/0WbYyuN511EEUcByvkvHaKBWlTKqGe1Em3+PARwPIg252DVYFHlLbFgQ8rkTOMs7pOdUk9tDpmbLclUIzW74vNm17r28kki0nPhIQAlt2TR0NIQaU6t8xhEv0x2NdEfF4F05GJDnelg1facChJ0vkLtbEoJ6Ay2igsVVyR2mjjGVKsZZ24lftp5lLHP11+HNRFw9eUYEXNPxB8SWVkg0Kug9Yr1XwrrmFFN+V5gRPNwhbMFsA7IYYo/Y4XfYVzA8ZBHwuQfADCqw6/mMkcv8raLWdA7IwAWjKJlXcdZaN4Ag==';

// 使用授权令牌创建 Microsoft Graph API 实例
$graph = new Graph();
$graph->setAccessToken($token);

// 获取 OneDrive 根目录的 Drive 实例
$drive = $graph->createRequest('GET', '/me/drive')->setReturnType(Model\Drive::class)->execute();

// 要上传的文件名和内容
$filename = $_GET['name'];
$content = file_get_contents('/upload/' . $filename);

// 上传文件
$file = $drive->getRoot()->upload($filename, $content);

// 打印文件的 ID
echo 'File ID: ' . $file->getId();
//header("Location: cours.php");

?>