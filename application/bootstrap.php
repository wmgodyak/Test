<?php

require_once 'Core/Model.php';
require_once 'Core/View.php';
require_once 'Core/PDO.php';
require_once 'Core/Recaptcha.php';
require_once 'Core/Controller.php';
require_once 'Core/Route.php';

if (!isset($_SESSION['countPage'])  && !isset($_SESSION['sortedVal'])) {
    session_name('countPage');
    session_name('sortedVal');
    session_name('sortedWay');
    session_start();
}

Route::start();

?>