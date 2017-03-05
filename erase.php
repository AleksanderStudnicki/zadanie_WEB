<?php

session_start();

require_once 'db_login.php';

$post_id = $_GET['link'];

$connection = new mysqli($db_host, $db_username, $db_password, $db_database, $db_port);
if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
}

$sql= "SELECT id_user FROM posts WHERE id_post='$post_id'";

$request = $connection->query($sql);

$user_id = $request->fetch_assoc()['id_user'];

if ($user_id==$_SESSION['id'])
{
    $sql="DELETE FROM posts WHERE id_post = '$post_id'";
    $request = $connection->query($sql);

    $connection->close();
    header("Location: panel.php");

}

else
{
    $connection->close();
    header("Location: panel.php");
}

?>
