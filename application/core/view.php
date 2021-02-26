<?php

class View
{
	
	function generate($content_view, $template_view, $data = null)
	{
		// Здесь позже сделаю обработку данных, сейчас функция только подключает обший шаблон вида

		include 'application/views/' . $template_view;
	}
	
}