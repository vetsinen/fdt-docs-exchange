<?php
require_once ('../src/config.php');
session_start();

if (isset($_FILES['img'])) uploadFile('img');
if (isset($_FILES['doc'])) uploadFile('doc');

function uploadFile(string $type)
{
    if ($_SESSION[$type]>=config['max'.$type]) return;
    $imagesFolder = $_SESSION['setfolder'];

    if (!empty($_FILES)) {
        $temp = $_FILES[$type]['tmp_name'];
        $finalFile =  $imagesFolder . ( $_FILES[$type]['name'] );
        move_uploaded_file( $temp, $finalFile );
        setcookie($type, strval(++$_SESSION[$type]), time() + 86400, '/');
        echo '200ok' ;
    }
}
