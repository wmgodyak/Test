<?php

class Route
{
    public  static function start()
    {
        // Controller and action default
        $controller_name = 'Main';
        $action_name = 'index';
      

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // Get name controller
        if ( !empty($routes[1]) ) {
            $controller_name = $routes[1];
        }

        // Get name  actions
        if ( !empty($routes[2]) ) {
            $action_name = $routes[2];
        }

        // add prefix
        $model_name = 'Model'.ucfirst($controller_name);
        $controller_name = 'Controller'.ucfirst($controller_name);
        $action_name = 'action'.ucfirst($action_name);

        // Picks up a file with a class model (model file and can not be)

        $model_file = $model_name.'.php';
        $model_path = "application/Models/".$model_file;
        if(file_exists($model_path)) {
            include "application/Models/".$model_file;
        }

        // Picks up the file from the controller class
        $controller_file = $controller_name.'.php';
        $controller_path = "application/Controllers/".$controller_file;
        if(file_exists($controller_path)) {
            include "application/Controllers/".$controller_file;
        } else {
            Route::ErrorPage404();
        }

        // Create controller
        $controller = new $controller_name;
        $action = $action_name;

        if(method_exists($controller, $action)) {
            // get controller action
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }

    }

    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }
}

