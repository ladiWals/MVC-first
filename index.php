<?php

// Индексный файл

$server = $_SERVER['DOCUMENT_ROOT'] . '/'; 

// Включаю показ ошибок
ini_set('display_errors', 1);

// Подключаю файл начальной загрузки
require_once ( $server . 'application/bootstrap.php');