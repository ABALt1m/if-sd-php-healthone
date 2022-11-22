<?php
try {

    $db=new PDO("mysql:host=localhost;dbname=fietsenmaker","root", "");
    if (isset($_POST['submit'])){
        if (!empty($_POST['merk']) && !empty($_POST['type']) && !empty($_POST['prijs'])){
            $prijs = filter_input(INPUT_POST,'prijs',FILTER_VALIDATE_FLOAT );
            $merk = filter_input(INPUT_POST,'merk',FILTER_SANITIZE_ADD_SLASHES );
            $type = filter_input(INPUT_POST,'type',FILTER_SANITIZE_ADD_SLASHES );
            if ($prijs===false){
                $melding= "vul een geldige prijs in!";
            }
            else{
                $query=$db->prepare("INSERT INTO fietsen(merk,type,prijs) VALUES(:merk, :type, :prijs)");
                $query->bindParam("merk", $merk);
                $query->bindParam("type", $type);
                $query->bindParam("prijs", $prijs);
                if ($query->execute()){

                    header('Location: http://healthone.localhost/fietsen');
                }else{
                    $melding="er is een fout opgetreden";
                }
                echo "<br>";
            }
        }else{
            $melding="niet alle velden zijn ingevuld";
        }
    }
} catch (PDOException $e){
    die("ERROR!:".$e->getMessage());
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
<style>
    h2{
        margin-left: 40px;
    }
    input{
        height: 2rem;

    }
</style>
<body>
<h2>Toevoegen fietsen </h2>
<form method="post">
    <label for="merk">Merk:</label>
    <input type="text" id="merk" name="merk">
    <br><br>
    <label for="type">type:</label>
    <input type="text" id="type" name="type">
    <br><br>
    <label for="prijs">prijs:</label>
    <input type="text" id="prijs" name="prijs">
    <br>
    <br>
    <input type="submit" name="submit" value="submit">
</form>
<?php
if (isset($melding))echo $melding
?>
</body>
</html>
