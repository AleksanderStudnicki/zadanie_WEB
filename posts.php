<?php


require_once 'db_login.php';

$connection = new mysqli($db_host, $db_username, $db_password, $db_database, $db_port);


if ($connection->connect_error) {
    die ("Connection failed: " . $connection->connect_error);
}

$sql="SELECT id_post FROM posts ORDER BY id_post DESC LIMIT 1";

$request=$connection->query($sql);
$howMuch=$request->fetch_assoc()['id_post'];

if($howMuch>0) {
    for ($i = $howMuch; $i > 0; $i--) {

        $sql = "SELECT * FROM posts WHERE id_post='$i'";
        $request = $connection->query($sql);
        $data = $request->fetch_assoc();
        if ($data['id_user'] != "") {
            $user_id = $data['id_user'];
            $post_id = $data['id_post'];
            $sql = "SELECT login FROM users WHERE id='$user_id'";
            $request = $connection->query($sql);
            $user = $request->fetch_assoc();
            echo '<div class="frame">';
            echo '<span class="user">' . $user['login'] . " pisze:" . '</span>';
            echo '<span class="date">' . $data['date'] . '</span>';
            echo "<br />";
            echo '<div style="clear: both;">' . '</div>';
            echo '<span class="data">' . $data['text'] . '</span>';
            echo "<br />";
            if ($_SESSION['id'] == $user_id) {
                echo '<span class="erase">' . '<a href="erase.php?link=' . $post_id . '">' . "Usuń" . '</a>' . '</span>';
            }

            echo "<br />";
            echo '</div>';
        }
    }
}
else{
    echo "<br />";
    echo '<div class="nopost" align="center">' . "Brak postów do wyświetlenia" . '</div>';
}

$connection->close();




?>