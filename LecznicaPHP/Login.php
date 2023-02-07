<link rel="stylesheet" href="style.css">

<?php

session_start();

echo "Przekazano :" . $_GET['login'] . " " .$_GET['haslo'] . " " . $_GET['hostN'] ;
$con =@new mysqli($_GET['hostN'],$_GET['login'],$_GET['haslo']);

if($con->connect_errno!=0)
{
    echo "test";
    $_SESSION['LogErr'] = "<spam style='color:red'><b>Nie Udało Się Zalogować</b></spam>";
    header('location: index.php');
    
}

$con -> close();
?>