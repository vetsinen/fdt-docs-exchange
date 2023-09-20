<?php
session_start();

if (isset($_FILES['img'])) uploadFile('img');
if (isset($_FILES['doc'])) uploadFile('doc');

function uploadFile(string $type)
{
    $imagesFolder = $_SESSION['setfolder'];

    if (!empty($_FILES)) {
        $temp = $_FILES[$type]['tmp_name'];
        $finalFile =  $imagesFolder . ( $_FILES[$type]['name'] );
        echo $temp."\n".$finalFile."\n";
        move_uploaded_file( $temp, $finalFile );
        setcookie('images', '1', time() + 86400, '/');
        echo '200ok' ;
    }
}
