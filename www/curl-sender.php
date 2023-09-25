<?php
session_start();
require_once('../src/config.php');

$url = config['test-url'].'curl-receiver.php';

$ch = curl_init();
$post_data = [
    'path' => $_SESSION['setfolder'],
    'address' =>$_POST['address'],
    'field2'=>$_POST['field2'],
];
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$response = curl_exec($ch);
curl_close($ch);

$directory = $_SESSION['setfolder'] . 'tmp';
$entries = scandir($directory);
foreach ($entries as $entry) {
    if ($entry !== '.' && $entry !== '..') {
        $file_path = $directory . '/' . $entry;
        $ch = curl_init();
        $file = new CURLFile($file_path);
        $post_data = [
            'file' => $file,
            'path' => $_SESSION['setfolder'],
        ];
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        $response = curl_exec($ch);
        curl_close($ch);
    }
}
system("rm -rf ".escapeshellarg($_SESSION['setfolder'].'tmp/'));
session_destroy();
header("Location: /login.php");


