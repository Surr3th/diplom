<?php
$host = 'localhost';
$dbname = 'postgres';
$user = 'postgres';
$pass = '8621';
$port = 1225;
$dsn = "pgsql:host=".$host.";port=".$port.";dbname=".$dbname;
$options = array(
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);
$pdo = new PDO($dsn, $user, $pass, $options);


