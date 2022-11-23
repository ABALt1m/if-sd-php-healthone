<?php
require '../Modules/categories.php';
require '../Modules/login.php';
require '../Modules/logout.php';
require '../Modules/database.php';
require '../Modules/common.php';
require '../Modules/fietsen.php';

session_start();
//var_dump($_SESSION);
//var_dump($_POST);
$message="";

$request = $_SERVER['REQUEST_URI'];

$params = explode("/", $request);
//print_r($request);
$title = "HealthOne";
$titleSuffix = "";

//$params[1] is de action
//$params[2] is een extra getal die de action nodig heeft om zijn taak uit te voeren
switch ($params[1]) {

    case 'categories':
        $titleSuffix = ' | Categories';
        $categories = getCategories();
        //var_dump($categories);die;
        include_once "../Templates/categories.php";
        break;

    case 'category':
        include_once "../Templates/home.php";
        break;

    case 'fietsen':
        $titleSuffix = ' | Fietsen';
        $fietsen = getFietsen();
        include_once "../Templates/fietsen.php";
        break;

    case 'product':
        break;

    case 'login':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;

    case 'logout':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;

    case 'register':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;

    case 'contact':
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
        break;

    case 'admin':
        include_once ('admin.php');
        break;

    case 'member':
        include_once ('member.php');
        break;
    case 'insert':
        $titleSuffix = ' | Insert';
        if (isset($_POST['submit'])) {
            if (!empty($_POST['merk']) && !empty($_POST['type']) && !empty($_POST['prijs'])) {
                $merk = filter_input(INPUT_POST, "merk", FILTER_SANITIZE_STRING);
                $type = filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
                $prijs = filter_input(INPUT_POST, "prijs", FILTER_VALIDATE_FLOAT);
                if ($prijs==false){
                    $msg = "Vul een getal in!";
                }else{
                    insertFietsen();
                    header('Location:  http://healthone.localhost/fietsen');
                }
            }else{
                $msg = "vul alles in";
            }
        }
        include_once "../Templates/insert.php";
        break;
    case 'details':
        include_once "../Templates/details.php";
        break;
    case 'update':

        if (isset($_POST['submit'])){
            if (!empty($_POST['merk'])&&!empty($_POST['type'])&&!empty($_POST['prijs'])){
                    $merk = filter_input(INPUT_POST, "merk", FILTER_SANITIZE_STRING);
                    $type= filter_input(INPUT_POST, "type", FILTER_SANITIZE_STRING);
                    $prijs= filter_input(INPUT_POST, "prijs", FILTER_VALIDATE_FLOAT);
                    $result = updateFietsen($params[2]);
                header('Location:  http://healthone.localhost/fietsen');
            }else{
                $msg = 'vul alles in!';
            }
        }else{
            $result = getFiets($params[2]);
        }
        $titleSuffix = ' | update';
        include_once "../Templates/update.php";
        break;

    default:
        $titleSuffix = ' | Home';
        include_once "../Templates/home.php";
}









