<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="style.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,600&amp;subset=latin-ext" rel="stylesheet">

    <?php

    if(isset($_SESSION['login']))
    {
        header("Location: panel.php");
    }

    ?>


    <title>projectDeveloper - WEB</title>
</head>
<body>

<h1>projectDeveloper - WEB</h1>

<div class="main">
<form action="login.php" method="post">
<br>
Login: <br>
<input type="text" name="login" class="input"><br>
Hasło: <br>
<input type="password" name="password" class="input"><br><br>
<input type="submit" value="Zaloguj się" class="button" onclick=header("Location: login.php")><br><br>
</form>

<?php

if(isset($_SESSION['error']))
{
    echo $_SESSION['error'];
}

    $_SESSION['error']=NULL;
?>
</div>




</body>
</html>
