<?php
require_once ('config.php');
function getRandomSid(int $n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
}

function getFolderForUserFiles(string $username) {
    do {
        $folderForSet =  config['upload-folder'].$username . '-' . getRandomSid(15).'/';
    }
    while (file_exists($folderForSet));
    try {
        mkdir($folderForSet);
        mkdir($folderForSet.'tmp/');

    }
    catch (Exception $exception){}
    return $folderForSet;
}

