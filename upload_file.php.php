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
$client_id = 'eee643c6-e7bb-4e38-a7c7-0f15647465f9';
$client_secret = '~xV8Q~iRbyXZSw37es2w3Uj5BqHpaK1.JriMnbMR';

// 创建 Azure Active Directory 应用程序授权令牌
$guzzle = new \GuzzleHttp\Client();
$url = 'https://login.microsoftonline.com/common/oauth2/v2.0/token';
$body = [
    'grant_type' => 'client_credentials',
    'client_id' => $client_id,
    'client_secret' => $client_secret,
    'scope' => 'https://graph.microsoft.com/.default'
];
$response = $guzzle->post($url, ['form_params' => $body]);
$token = json_decode($response->getBody()->getContents())->access_token;

// 使用授权令牌创建 Microsoft Graph API 实例
$graph = new Graph();
$graph->setAccessToken($token);

// 获取 OneDrive 根目录的 Drive 实例
$drive = $graph->createRequest('GET', '/me/drive')->setReturnType(Model\Drive::class)->execute();

// 要上传的文件名和内容
$filename = $_GET['name'];
$content = file_get_contents('/upload/$filename');

// 上传文件
$file = $drive->getRoot()->upload($filename, $content);

// 打印文件的 ID
echo 'File ID: ' . $file->getId();
//header("Location: cours.php");

?>