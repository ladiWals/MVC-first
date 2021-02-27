<?php 

class Route
{
	static function start()
	{
		// Использую глобальную переменную, хранящую путь к серверу
		global $server;

		// Контроллер и действие по умолчанию
		$controller_name = 'main';
		$action_name = 'index';
		
		//  Здесь содержится полный адрес, запрошенный пользователем
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// Получаю имя контроллера
		if ( !empty($routes[1]) ) {	
			$controller_name = $routes[1];
		}
		
		// Получаем имя экшена
		if ( !empty($routes[2]) ) {
			$action_name = $routes[2];
		}

		// Добавляю префиксы
		$model_name = 'model_' . $controller_name;
		$controller_name = 'controller_' . $controller_name;
		$action_name = 'action_' . $action_name; echo "model: $model_name<br>controller: $controller_name<br>action: $action_name<br>";

		// Подключаю файл с классом модели (если он существует)
		$model_file = strtolower($model_name) . '.php';
		$model_path = "application/models/" . $model_file;
		if (file_exists($model_path)) {
			include_once ($server . "application/models/" . $model_file);
		}

		// Подключаю файл с классом контроллера (если он существует)
		$controller_file = strtolower($controller_name) . '.php';
		$controller_path = "application/controllers/" . $controller_file;
		if (file_exists($controller_path)) {
			include ($server . "application/controllers/" . $controller_file);
		} else {
			Route::ErrorPage404();
		}
		
		// Создаю новый контроллер
		$controller = new $controller_name;
		$action = $action_name;
		
		if(method_exists($controller, $action)) {
			// Вызываю действие контроллера
			$controller->$action();
		} else {
			Route::ErrorPage404();
		}

	}
	
	static function ErrorPage404()
	{
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:' . $host . '404');
    }
}
