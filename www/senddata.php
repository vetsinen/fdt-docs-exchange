<?php
require '../vendor/autoload.php';

$curl = new anlutro\cURL\cURL; //$response = $curl->get('http://www.google.com'); var_dump($response);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello <?= $_POST['address'] ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">
            Hello <?= $_POST['address'] ?>
        </h1>
        <p class="subtitle">
            My first website with <strong>Bulma</strong>!
        </p>
    </div>
</section>
</body>
</html>


