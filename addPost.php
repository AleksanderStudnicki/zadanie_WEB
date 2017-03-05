<?php
session_start();
require_once 'db_login.php';
if (isset($_POST['text']) and $_POST['text'] != "") {

    $connection = new mysqli($db_host, $db_username, $db_password, $db_database, $db_port);
    if ($connection->connect_error) {
        die ("Connection failed: " . $connection->connect_error);
    }

    $activeUser = $_SESSION['id'];
    $text = $_POST['text'];
    $text = str_replace ("\n", '<br />', $text);
    $date = date("Y-m-d H:i:s");
    $request = $connection->query("INSERT INTO posts (id_user, text, date) VALUES ('$activeUser', '$text', '$date')");
    $connection->close();
    header("Location: panel.php");
}

else
{
    header("Location: panel.php");
}

?>