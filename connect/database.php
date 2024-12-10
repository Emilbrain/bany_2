<?php

try {
    $host = "localhost";
    $dbname = "bany";
    $user = "root";
    $password = "";
    $conn = new PDO("mysql:host=$host;charset=utf8;dbname=$dbname", $user, $password);
} catch (PDOException $e) {
    echo "Ошибка подключения Базы данных провертье данные" . $e;
}
