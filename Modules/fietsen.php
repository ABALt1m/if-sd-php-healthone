<?php
function getFietsen():array
{
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker","root","");
    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $fietsen = $query->fetchAll(PDO::FETCH_ASSOC);
    return $fietsen;
}
?>