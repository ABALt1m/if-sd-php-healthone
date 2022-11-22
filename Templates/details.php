<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker","root", "");
    $query = $db->prepare("SELECT * FROM fietsen WHERE id = ".$_GET['id']);
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    $query->execute();
    foreach ($result as $data){
        echo "Artikelnummer :";
    }
}catch(PDOException $e){
    die("Error!: ".$e->getMessage());
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div class="container">
    <?php

    include_once('defaults/header.php');
    include_once('defaults/head.php');
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>
bruh
</div>
</body>
</html>