<?php
    $host = "localhost";
    $user = "admin";
    $pass = "admin";
    $dbase = "proyectos-luisvcardo";

    $dsn = "mysql:host=$host;dbname=$dbase;charset:utf8";
    $db = new PDO($dsn,$user,$pass);

?>