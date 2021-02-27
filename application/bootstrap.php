<?php

// Файл начальной загрузки

// Подключаю файлы с базовыми классами 
require_once ($server . 'application/core/model.php'); 
require_once ($server . 'application/core/view.php');
require_once ($server . 'application/core/controller.php');

// Подключаю файл с классом маршрутизации урлов
require_once ($server . 'application/core/route.php');

// Запускаем маршрутизатор
Route::start();