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
$content = 'This is an example file.';

// 上传文件
$file = $drive->getRoot()->upload($filename, $content);

// 打印文件的 ID
echo 'File ID: ' . $file->getId();

?>