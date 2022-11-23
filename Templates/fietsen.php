
<!doctype html>
<html lang="en">
<?php
include_once('defaults/head.php');
?>
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
    include_once('defaults/menu.php');
    include_once('defaults/pictures.php');
    ?>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Merk</th>
            <th scope="col">type</th>
            <th scope="col">prijs</th>
            <th scope="col">detail</th>
            <th scope="col">update</th>
            <th scope="col">delete</th>
        </tr>
        </thead>
        <tbody>

    <?php

    global $fietsen;
    $num = 1;
    foreach ($fietsen as $fiets){
        echo "<tr>";
        echo '<th scope="row">'.$num.'</th>';
        echo "<td>".$fiets['merk']."</td>";
        echo "<td>".$fiets['type']."</td>";
        echo "<td>".$fiets['prijs']."</td>";
        echo "<td><a href='details/".$fiets['id']."'>details</a></td>";
        echo "<td><a href='update/".$fiets['id']."'>update</a></td>";
        echo "<td><a href='detail/".$fiets['id']."'>delete</a></td>";
        echo "</tr>";
        $num++;
    }

    ?>
        </tbody>
    </table>

</div>
<div class="container"><a href="insert">Insert</a></div>

</body>
</html>
