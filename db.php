<?php
$host = 'db';  // название сервиса в docker-compose
$user = 'root';
$password = 'helloworld';
$database = 'web';
$port = 3306;

$mysqli = new mysqli($host, $user, $password, $database, $port);

if ($mysqli->connect_error) {
    die("Ошибка подключения к базе: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8");
?>
