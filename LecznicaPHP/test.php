<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <form id="Form-Main" action="Login.php" method="get" >
    <div id="Okno-Main">
        <div>
            Zaloguj Się:
        </div>
        <div>
            HOST: <input class="Logowanie" type="text" name="hostN">
        </div>
        <div>
            Login: <input class="Logowanie" type="text" name="login">
        </div>
        <div>
            Haslo: <input class="Logowanie" type="password" name="haslo">
        </div>
        <div>
            <?php
                if(isset($_SESSION['LogErr']))echo $_SESSION['LogErr'];
            ?>
        </div>
        <div>
            <input class="Logowanie-Log-But" type="submit" value="Login">
        </div>
        
    </div>
    </form>
</body>
</html>