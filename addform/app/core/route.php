<?php



global $CFG;
$dir_of_site = $CFG['dir_of_site'];

class Route
{
    
    static function start()
    {

        global $dir_of_site;
        $controller_name = 'Main';
        $action_name     = 'index';
        
        $uri = str_replace($dir_of_site, '', $_SERVER['REQUEST_URI']);
        $routes = explode('/', $uri);
        foreach ($routes as $k => $v)
            if (strpos($v, '?') !== false)
                $routes[$k] = substr($v, 0, strpos($v, '?'));
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }
        
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }
        $nav['action']     = $action_name;
        $nav['controller'] = $controller_name;
        $model_name        = 'Model_' . $controller_name;
        $controller_name   = 'Controller_' . $controller_name;
        $action_name       = 'action_' . $action_name;
        $model_file        = strtolower($model_name) . '.php';
        $model_path        = 'app/models/' . $model_file;
        if (file_exists($model_path)) {
            include 'app/models/' . $model_file;
        }
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = 'app/controllers/' . $controller_file;
        if (file_exists($controller_path)) {
            include 'app/controllers/' . $controller_file;
        } else {
            Route::ErrorPage404();
        }
        $controller = new $controller_name;
        $action     = $action_name;
        
        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
        
    }

    static function ErrorPage404()
    {
        global $dir_of_site;
        $host = 'http://' . $_SERVER['HTTP_HOST'] . $dir_of_site . '/';
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');
        header('Location:' . $host . '404');
		die;
    }

    static function Location($url = '/'){
		global $dir_of_site;
        $host = 'http://' . $_SERVER['HTTP_HOST'] . $dir_of_site . $url;
        header('Location: ' . $host, true, 301);
		die;
	}
    
}
