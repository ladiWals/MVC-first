<?php

// Файл начальной загрузки

// Подключаю файлы с базовыми классами 
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

// Подключаю файл с классом маршрутизации урлов
require_once 'core/route.php';
Route::start(); // запускаем маршрутизатор