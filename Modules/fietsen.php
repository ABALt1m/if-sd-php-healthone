<?php
function getFietsen():array
{
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker","root","");
    $query = $db->prepare("SELECT * FROM fietsen");
    $query->execute();
    $fietsen = $query->fetchAll(PDO::FETCH_ASSOC);
    return $fietsen;
}
function getFiets($id):array

{
    $db=new PDO("mysql:host=localhost;dbname=fietsenmaker","root", "");
    $query=$db->prepare("SELECT * FROM fietsen WHERE id = :id");
    $query->bindParam("id", $id);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
return $result;
}

function updateFietsen($id)
{
    global $merk,$type,$prijs,$result;
        $db= new PDO("mysql:host=localhost;dbname=fietsenmaker","root","");
        $query = $db->prepare("UPDATE fietsen SET merk = :merk, type = :type, prijs= :prijs WHERE id = :id");
        $query-> bindParam("merk", $merk);
        $query-> bindParam("type", $type);
        $query-> bindParam("prijs", $prijs);
        $query-> bindParam("id", $id);
        $result = $query->execute();
return $result;
}
function insertFietsen()
{
    global $merk,$type,$prijs,$result;
    $db= new PDO("mysql:host=localhost;dbname=fietsenmaker","root", "");
    $query = $db->prepare("INSERT INTO fietsen(merk,type,prijs) VALUES(:merk, :type, :prijs)");
    $query-> bindParam("merk", $merk);
    $query-> bindParam("type", $type);
    $query-> bindParam("prijs", $prijs);
    $query->execute();
}