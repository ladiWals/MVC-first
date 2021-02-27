<?php

class View
{
	
	function generate($content_view, $template_view, $data = null)
	{
		global $server;

		// Здесь позже сделаю обработку данных, сейчас функция только подключает обший шаблон вида

		include $server. 'application/views/' . $template_view;
	}
	
}