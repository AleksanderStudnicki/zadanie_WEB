<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>

    <link rel="stylesheet" href="panelStyle.css" />
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,600&amp;subset=latin-ext" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>

        $(document).ready(function() {
            $("#toogle").click(function () {
                $("#add").slideToggle("slow");
            });
        });

    </script>


    <title>projectDeveloper - WEB</title>
</head>
<body>

<div class="controlPanel">





    <div id="textbox">
        <div class="textL"><a href="panel.php">projectDeveloper - WEB</a></div>
        <div class="textR">

            <?php

                echo "Witaj, " . $_SESSION['name'] . " " . $_SESSION['surname'] . "! |  ";

            ?>
            <a href="logout.php">Wyloguj się</a>
            </div>
    </div>
    <div style="clear: both;"></div>


    <div id="toogle">Dodaj post</div>

    <div id="add">

        <form action="addPost.php" method="post">

            <textarea name="text" class="addPost"></textarea>

            <input type="image" src="plus.png" class="addButton">

        </form>

        <div style="clear: both;"></div>

    </div>


    <div class="posts">

        <?php
        require_once 'posts.php';
        ?>

    </div>



</div>






</body>
</html>