<?php

session_start(); 
// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'class/pagination.php';

function checkAuth()
{
	$cheker = false;
	$status = $_SESSION['login_status'] ?? '';
	if($status == 'access_granted')
		$cheker = true;

	return $cheker;
}

require_once 'core/route.php';

Route::start(); // запускаем маршрутизатор
