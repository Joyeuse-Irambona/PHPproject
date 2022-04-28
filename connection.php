<?php 
    $server_name = 'localhost';
    $user_name = 'root';
    $user_password = '';
    $db_name = 'demo';

    $connection = mysqli_connect($server_name, $user_name, $user_password, $db_name);

    if (!$connection) {
        die("Connection fail: " . mysqli_connect_error());
    }
?>