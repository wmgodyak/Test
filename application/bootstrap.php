<?php

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/PDO.php';
require_once 'core/recaptcha.php';
require_once 'core/controller.php';
require_once 'core/route.php';

if ( !isset($_SESSION['countPage'])  && !isset($_SESSION['sortedVal']))  {
    session_name('countPage');
    session_name('sortedVal');
    session_name('sortedWay');
    session_start();

}

Route::start();

?>