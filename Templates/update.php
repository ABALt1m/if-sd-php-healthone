<!doctype html>
<html lang="en">
<?php

include_once ('defaults/head.php')

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    h2{
        margin-left: 40px;
    }
    input{
        height: 2rem;

    }
</style>
<body>
<div class="container">
<?php

include_once('defaults/header.php');
include_once('defaults/menu.php');
include_once('defaults/pictures.php');
?>

<h2>Toevoegen fietsen </h2>
<form method="post">
    <label for="merk">Merk:</label>
    <input type="text" id="merk" name="merk" value="<?php echo $result['merk'];?>">
    <br><br>
    <label for="type">type:</label>
    <input type="text" id="type" name="type" value="<?php echo $result['type'];?>">
    <br><br>
    <label for="prijs">prijs:</label>
    <input type="text" id="prijs" name="prijs" value="<?php echo $result['prijs'];?>">
    <br>
    <br>
    <input type="submit" name="submit" value="submit">
</form>
<?php
if (isset($msg))echo $msg;
?>
</div>
</body>
</html>
