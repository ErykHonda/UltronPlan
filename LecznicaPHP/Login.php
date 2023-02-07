<link rel="stylesheet" href="style.css">

<?php
//dodaj sprawdzanie hosta pomiędzy urzytkownikiem a hasłem
session_start();
$con =new mysqli('localhost','root','','mysql');

$haslo = htmlentities($_GET['haslo'],ENT_QUOTES,"UTF-8");
$login = htmlentities($_GET['login'],ENT_QUOTES,"UTF-8");

if($rezultat = @$con->query(sprintf("SELECT * FROM user WHERE user='%s'",mysqli_real_escape_string($con,$login))))
{
    $ile_user =  $rezultat->num_rows;
    if($ile_user>0)
    {
        $wiersz = $rezultat->fetch_assoc();
        $hashedPassword = @$con->query(sprintf("SELECT PASSWORD('%s') AS Haselko",$haslo));
        $findPassword = $hashedPassword->fetch_assoc();
        if($wiersz['Password']===$findPassword['Haselko'])
        {
            echo "work";
            unset($_SESSION['LogErr']);
        }else
        {
            header('location: index.php');
            $_SESSION['LogErr'] = "<span style='color: red;'><b>Podano Nieprawidłowe Hasło Lub Login</b></span>";
        }
    }else
    {
        header('location: index.php');
        $_SESSION['LogErr'] = "<span style='color: red;'><b>Podano Nieprawidłowe Hasło Lub Login</b></span>";
    }
}else
{
    header('location: index.php');
    $_SESSION['LogErr'] = "<span style='color: red;'><b>Podano Nieprawidłowe Hasło Lub Login</b></span>";
}
$con ->close();
?>