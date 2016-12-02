<?php
    $server_username = "root";
    $server_password = "";
    $server_host = "localhost";
    $database = 'menshop';
    
    $dbc = mysqli_connect($server_host,$server_username,$server_password,$database) or die ("không thể kết nối tới database");
    mysqli_query($dbc,"SET NAMES 'UTF8'");
?>


