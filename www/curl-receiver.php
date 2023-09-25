<?php
require_once ('../src/config.php');

if (isset($_POST['address'])){
    $dic = array('address'=>$_POST['address'],'field2'=>$_POST['field2']);
    $json = json_encode($dic);
    file_put_contents($_POST['path']."data.json", $json);
}

if (!empty($_FILES)) {
    $temp = $_FILES['file']['tmp_name'];
    $finalFile =  $_POST['path'].( $_FILES['file']['name'] );
    move_uploaded_file( $temp, $finalFile );
}