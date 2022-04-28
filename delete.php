<?php 
    $server_name = 'localhost';
    $user_name = 'root';
    $user_password = '';
    $db_name = 'demo';

    $connection = mysqli_connect($server_name, $user_name, $user_password, $db_name);

    if (!$connection) {
        die("Connection fail: " . mysqli_connect_error());
    }

    else {
        if(isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $query = 'SELECT * FROM Book WHERE id = ' . $id;
            $result = mysqli_query($connection, $query);
            $serialized_result = mysqli_fetch_assoc($result);

            if(!count($serialized_result)) {
                header('Location: index.php');
            }

            else {
                $query = 'DELETE FROM Book WHERE id = ' . $id;
                mysqli_query($connection, $query);
                header('Location: index.php');
            }
        } else {
            header('Location: index.php');
        }
    }
?>