<?php

session_start();
require_once 'db_login.php';

    if ((isset($_POST['login']))or(isset($_POST['password'])))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];

        $connection = new mysqli($db_host, $db_username, $db_password, $db_database, $db_port);


        if ($connection->connect_error) {
            die ("Connection failed: " . $connection->connect_error);
        }

        $request = $connection->query("SELECT * FROM users WHERE login = '$login' AND password = '$password'");

        if($request->num_rows > 0)
        {
            $activeUser = $request->fetch_assoc();

            $_SESSION['id']=$activeUser['id'];
            $_SESSION['email']=$activeUser['email'];
            $_SESSION['login']=$activeUser['login'];
            $_SESSION['name']=$activeUser['name'];
            $_SESSION['surname']=$activeUser['surname'];


            $request->free_result();
            $connection->close();

            header ("Location: panel.php");

        }

        else
        {
            $_SESSION['error']="Nieprawidłowy login lub hasło!";


            header("Location: index.php");



        }

    }

    else
    {
        header("Location: index.php");
    }

?>